<?php
class Users extends CI_Controller{
    public function register(){
        $data['title']= "Sign Up";

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
        $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('password2','Confirm Password','required|matches[password]');

        if($this->form_validation->run()===FALSE){
            $this->load->view('includes/header');
            $this->load->view('users/register',$data);
            $this->load->view('includes/footer');
        }else{
            //encrypt pass
            $enc_pass = md5($this->input->post('password'));

            $this->user_model->register($enc_pass);//mvc rules, anything that doesnt involve the database is nin


            //set message
            $this->session->set_flashdata('user_registered', 'You are in man, iiiin');

            redirect('posts');
        }

    }

    //check if user exists
    function check_username_exists($username){
        $this->form_validation->set_message('check_username_exists','that username is taken, please choose a different one');

        if($this->user_model->check_username_exists($username)){
            return true;
        }else{
            return false;

        }
    }
    //check if email exists
    function check_email_exists($email){
        $this->form_validation->set_message('check_email_exists','that email  is taken, please choose a different one');

        if($this->user_model->check_email_exists($email)){
            return true;
        }else{
            return false;

        }
    }
}