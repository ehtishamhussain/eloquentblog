<?php 

class Post_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function get_posts($slug= FALSE){
        if($slug === False){
            $query=$this->db->get('posts');
            return $query->result_array();
        }
        $query=$this->db->get_where('posts',array('slug' => $slug));
        return $query->row_array();
    }
    public function create_post($post_image){
        $slug=url_title($this->input->post('title'));
        $data=array(
            'post_image' => $post_image,
            'slug'=>$slug,
            'title'=>$this->input->post('title'),
        'body'=>$this->input->post('body')
        );
        return $this->db->insert('posts', $data);
    
    }
    public function update($id){
        
        $this->db->where('id', $id);
        $slug =url_title($this->input->post('title'));
        $data=array(
            'slug'=>$slug,
            'title'=>$this->input->post('title'),
            'body'=>$this->input->post('body')
        );
        $this->db->update('posts',$data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return true;
    }
}

?>