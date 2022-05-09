<?php 

use \Illuminate\Database\Eloquent\Model as Eloquent;



Class Users extends Eloquent{
    protected $table='users';
    protected $guarded=[];
    public function posts(){
        return $this->hasMany(new Post_model());
    }
}

?>