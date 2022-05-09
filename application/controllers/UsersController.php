<?php
defined('BASEPATH') OR exit('No direct script access allowed');


Class UsersController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Users');
        $this->load->helper('cookie');
        
    }
    public function register(){

        $data['title'] = 'Register';
        $this->form_validation->set_rules('name', 'Name', 'required');
       
        $this->form_validation->set_rules('email', 'Email', 'required|callback_email_taken');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confrim Password', 'matches[password]');

        if($this->form_validation->run()==False) {
            $this->load->view('auth/register',$data);
        }
        else{
            $enc_password=md5($this->input->post('password'));
          

            
            $user=Users::create([
                'name'=>$this->input->post('name'),
                'username'=>$this->input->post('username'),
                'password'=>$enc_password,
                'email'=>$this->input->post('email')
            ]);
            $this->session->set_flashdata('user_registered', 'You are now registered');

            redirect('users/register');
        }

        
    }
    public function check_username_exists($username){
       
        
        $this->form_validation->set_message('check_username_exists','This username is taken ');
        $user=Users::where('username',$username)->get();
        if(isset($user[0])){
            return false;
        }
        else{
            return true;
        }      
    }
    public function email_taken($email){
          
        $this->form_validation->set_message('email_taken','This email is already registered');
        $user=Users::where('email',$email)->get();
        if(isset($user[0])){
            return false;
        }
        else{
            return true;
        }  
    }
    public function login(){
        if($this->session->userdata('logged_in')){
            return redirect($_SERVER['HTTP_REFERER']);
        }
        $data['title']="Sign In";
        $this->form_validation->set_rules('username', 'Username','required');
        $this->form_validation->set_rules('password', 'Password','required');
       
        

        if($this->form_validation->run() == false){
            $this->load->view('auth/login',$data);
        }
        else{
            $username=$this->input->post('username');
        $password=md5($this->input->post('password'));
        
        $user=Users::where(['username'=>$username, 'password'=>$password])->first();

        
        
        if($user){
        set_cookie('userdata',$user,'10000');
            
            $id=$user->id;
            $name=$user->name;
            $username=$user->username;
            $user=array(
                'id'=>$id,
                'name'=>$name,
                'username'=>$username,
                'logged_in'=>true
            );
            
            $this->session->set_userdata($user);
            $this->session->set_flashdata('Login_success','You are now logged in');
            redirect('posts');
             }else{
            $this->session->set_flashdata('login_failed','Invalid Credentials');
           redirect('users/login');
        }
        }
    }
    public function logout(){
        delete_cookie('userdata');
        // $this->session->unset_userdata('id');
        // $this->session->unset_userdata('name');
        // $this->session->unset_userdata('username');
        // $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        
        $this->session->set_flashdata('logged_out','You are now logged out');
        redirect('users/login');

    }

}

?>