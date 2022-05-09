<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;


Class Post_model extends Eloquent {
   
    protected $table="posts";
    protected $guarded=[];
    
    public function user(){
        return $this->belongsTo(new Users());
    }
}

?>
