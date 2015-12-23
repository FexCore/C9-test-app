<?php namespace ToDoApp\Http\Requests;



   class CreateTodolistRequest extends Request {

    public function authorize(){
        
	    return true;
	    
	}
	public function rules(){
	    return array('name'=>'required');
	}
	


}
