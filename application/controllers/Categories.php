<?php
class Categories extends CI_Controller{
    public function create(){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('/posts/');
        }
        $data['title']= 'Create Category';

        $this->form_validation->set_rules('name','Name', 'required');
        if($this->form_validation->run() === FALSE) {

           $this->load->view('includes/header');
           $this->load->view('categories/create',$data);
           $this->load->view('includes/footer');

           $this->categories_model->create();
       }else{
            $this->categories_model->create();
            redirect('categories/categories');
       }
    }
    public function edit_categories(){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('/posts/');
        }
        $data['categories'] = $this->categories_model->get_categories();
        $data['title']= 'Edit Category';

        $this->load->view('includes/header');
        $this->load->view('categories/edit_categories', $data);
        $this->load->view('includes/footer');

        $this->category_model->edit_category();
    }
    public function get_categories(){
        $data['title']= 'Categories';
        $data['categories'] = $this->categories_model->get_categories();

        $this->load->view('includes/header');
        $this->load->view('categories/get_categories', $data);
        $this->load->view('includes/footer');

    }
    public function posts($id){
        $data['title']= $this->categories_model->get_category($id)->name;

        $data['posts']= $this->post_model->get_posts_by_category($id);

        $this->load->view('includes/header');
        $this->load->view('posts/index', $data);
        $this->load->view('includes/footer');
    }

}