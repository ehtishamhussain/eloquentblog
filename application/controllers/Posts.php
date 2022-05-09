<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
    public function __construct(){
        Parent::__construct();
        $this->load->model('Post_model');
        $this->load->model('Users');
        if(!$this->session->userdata('logged_in')){
            return redirect('users/login');
        }
       
    }
    public function index(){
        
        $data['title']='Latest Posts';
        $posts=Post_model::where('user_id',$this->session->userdata('id'))->get();
       
       
        

        $data['posts']=$posts;
      
                
        $this->load->view('posts/index',$data);
      
      
    }
    public function view($slug = ''){
        //checking whether its slug 
        $input=preg_match('/^([a-z0-9]+-)*[a-z0-9]+$/i',$slug);
        if($input == true){
           
            $post=Post_model::where('slug',$slug)->get();
          
            if(isset($post[0])){
               
                $data['post']=$post[0];
            }
            else{
                show_404();
            }
          
            
            $this->load->view('posts/view',$data);
       
        }else{
            $message="Not a valid slug";
            echo $message;
            return ;
        }
       
       
        
      
      
        


    }
    public function create(){

        $this->form_validation->set_rules('title', 'Title','required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run()==false){
           
            $this->load->view('posts/create');
            
        }
        else {
            //upload image code 
            $config['upload_path'] ='./assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']='2048';

           $test=$this->load->library('upload', $config);
           

            if(!$this->upload->do_upload()){
               
                $errors=array('error'=>$this->upload->display_errors());
               
                $post_image='noimage.jpg';
            }
            else{
                $data=array('upload_data'=>$this->upload->data());
                $post_image=$_FILES['userfile']['name'];

            }
            $slug=url_title($this->input->post('title'));
            $new_post=Post_model::create([
                'post_image' => $post_image,
                'slug'=>$slug,
                'title'=>$this->input->post('title'),
            'body'=>$this->input->post('body')
            ]);
            // $this->Post_model->create_post($post_image);
            redirect('posts');
        }
       
    }
    public function delete($id) {
        
        $post=Post_model::find($id);
        if(isset($post->id)){
            $post->delete();
        redirect('posts');

        } else{
        redirect('posts');

        }       
       
     
        
    }
    public function edit($slug) {

        $input=preg_match('/^([a-z0-9]+-)*[a-z0-9]+$/i',$slug);
        if($input == true){
           
            $post=Post_model::where('slug',$slug)->get();
          
            if(isset($post[0])){
               
                $data['post']=$post[0];
            $this->load->view('posts/edit',$data);

            }
            else{
                show_404();
            }
     
       
    }else{
        $message="Not a valid slug";
        echo $message;
        return ;
    }

        
            
    }
    public function update($id){
        
       
        $post=Post_model::find($id);
        if(isset($post->id)){
            $slug =url_title($this->input->post('title'));
            $data=array(
                'slug'=>$slug,
                'title'=>$this->input->post('title'),
                'body'=>$this->input->post('body')
            );
            $post=Post_model::where('id',$id)->update($data);
            
            
            // $post->delete();
        redirect('posts');

        } else{
        redirect('posts');

        }       
        

    }
}
