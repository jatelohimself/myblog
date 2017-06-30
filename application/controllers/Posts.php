<?php
class Posts extends CI_Controller{
    public function index($page = 'index'){

        //pagination config
        $config['base_url'] = base_url($offset= 0). '/posts/index';
        $config['total_rows']= $this->db->count_all('posts');//number of all posts in our db for pagination
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;//segmentation in the url host/x/y/3
        $config['attributes'] = array('class' => 'pagination-links');

        $data['title']= 'Latest Posts';

        $data['posts']= $this->post_model->get_posts(FALSE, $config['per_page'] = 3, $offset);

      //  print_r($data);

        $this->load->view('includes/header');
        $this->load->view('posts/index', $data);
        $this->load->view('includes/footer');
    }

    public function view($slug= NULL){
        $data['post'] = $this->post_model->get_posts($slug);
        $post_id =$data['post']['id'];
        $data['comments'] = $this->comments_model->get_comments($post_id);

        if(empty($data['post'])){
            show_404();
        }
        $data['title'] = $data['post']['title'];

        $this->load->view('includes/header');
        $this->load->view('posts/view', $data);
        $this->load->view('includes/footer');

    }
    public function create(){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('/posts/');
        }
        $data['title'] = 'Create Post';
        $data['categories'] = $this->post_model->get_categories();

        $this->form_validation->set_rules('title','Title', 'required');
        $this->form_validation->set_rules('body','Body', 'required');

        if($this->form_validation->run() === FALSE){

            $this->load->view('includes/header');
            $this->load->view('posts/create', $data);
            $this->load->view('includes/footer');
         }else{
            //upload images
            chmod($config['upload_path'] = './assets/images/posts',777);
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '2048';
            $config['max_width'] = '5000';
            $config['max_height'] = '2000';

            $this->load->library('upload',$config);

            if(!$this->upload->do_upload()){
                $errors = array('error' =>$this->upload->display_errors());
                print_r($errors);
                $post_image = 'noimage.jpg';

            } else{
                $data= array('upload_data'=> $this->upload->data());
                $post_image =$_FILES['userfile']['name'];
                chmod($post_image,0777);
            }

            $this->post_model->create_post($post_image);
            //set message
            $this->session->set_flashdata('post_created', 'Youve created the post awesome');
            redirect('posts');
        }
    }

    public function delete($id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('/posts/');
        }
        $this->post_model->delete_post($id);
        redirect('posts');

    }
    public function edit($slug){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('/posts/');
        }

        $data['post'] = $this->post_model->get_posts($slug);

        //check if its the users post,if false it redirects to post
        if($this->session->userdata('user_id')!= $this->post_model->get_posts($slug)){
            redirect('posts');
        }

        $data['categories'] = $this->post_model->get_categories();

        if(empty($data['post'])){
            show_404();
        }
        $data['title'] = 'Edit Post';

        $this->load->view('includes/header');
        $this->load->view('posts/edit', $data);
        $this->load->view('includes/footer');

    }
    public function update(){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('/posts/');
        }
        $this->post_model->update_post();
        redirect('posts');
    }



}