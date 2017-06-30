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
    //Login to the blog
    public function login(){
        $data['title']= 'Login';

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run()===FALSE){
            $this->load->view('includes/header');
            $this->load->view('users/login',$data);
            $this->load->view('includes/footer');
        }else{
            $password = md5($this->input->post('password'));
            $username = $this->input->post('name');

            $user_id= $this->user_model->login($password, $username);

            if($user_id){
                $user_data= array(
                    'user_id'=> $user_id,
                    'username' => $username,
                    'logged_in' => true

                );
                $this->session->set_userdata($user_data);


                $this->session->set_flashdata('login_success','you are successfully logged in');
                redirect('/posts/');
            }else{

                $this->session->set_flashdata('failed_login','please try again');
                redirect('users/login');
            }


        }

    }
    public function logout(){
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('logout_success','Successfully logged out');
        redirect('/users/login');
    }

}