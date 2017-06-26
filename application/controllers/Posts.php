<?php
class Posts extends CI_Controller{
    public function index($page = 'index'){

        $data['title']= 'Latest Posts';

        $data['posts']= $this->post_model->get_posts();

      //  print_r($data);

        $this->load->view('includes/header');
        $this->load->view('posts/index', $data);
        $this->load->view('includes/footer');
    }

    public function view($slug= NULL){
        $data['post'] = $this->post_model->get_posts($slug);

        if(empty($data['post'])){
            show_404();
        }
        $data['title'] = $data['post']['title'];

        $this->load->view('includes/header');
        $this->load->view('posts/view', $data);
        $this->load->view('includes/footer');

    }
    public function create(){
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
            redirect('posts');
        }
    }

    public function delete($id){
        $this->post_model->delete_post($id);
        redirect('posts');

    }
    public function edit($slug){
        $data['post'] = $this->post_model->get_posts($slug);
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
        $this->post_model->update_post();
        redirect('posts');
    }

    public function edit_categories(){
        $data['categories'] = $this->post_model->get_categories();
        $data['title']= 'Add Category';


        $this->load->view('includes/header');
        $this->load->view('posts/edit_categories', $data);
        $this->load->view('includes/footer');

        $this->post_model->edit_category();
    }

}