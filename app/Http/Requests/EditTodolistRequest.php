<?php namespace ToDoApp\Http\Requests;



   class EditTodolistRequest extends Request {

    public function authorize(){
        
	    return true;
	    
	}
	public function rules(){
	    return array('name'=>'required');
	}
	


}
