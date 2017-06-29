<?php
class Comments extends CI_Controller{
    public function create($post_id){
        $slug = $this->input->post('slug');
        $data['post']= $this->post_model->get_posts($slug);

        $this->form_validation->set_rules('name','Name', 'required');
        $this->form_validation->set_rules('email','Email', 'required');
        $this->form_validation->set_rules('email','Email', 'valid_email');
        $this->form_validation->set_rules('body','body', 'required');

        if($this->form_validation->run()=== FALSE){//checks if the form validation fails and runs the first part of the satement
            $this->load->view('includes/header');
            $this->load->view('posts/view', $data);
            $this->load->view('includes/footer');
        }else{
            $this->comments_model->create_comment($post_id);
            redirect('posts/'. $slug);


        }
    }
}