<?php namespace ToDoApp;

use Illuminate\Database\Eloquent\Model;


class Todolist extends Model {

 protected $guarded=array('id');
 
    public function items(){
        
        return $this->hasMany('ToDoApp\Item');
    }
 
}
