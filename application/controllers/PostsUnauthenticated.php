<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class PostsUnauthenticated extends CI_Controller{
    public function __construct(){
        Parent::__construct();
        $this->load->model('Post_model');
    }
    public function index(){
        
        $data['title']='Latest Posts';
        $posts=Post_model::all();

        $data['posts']=$posts;
        
        
        $this->load->view('posts/index',$data);
      
      
    }
}