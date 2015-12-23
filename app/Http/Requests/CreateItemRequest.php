<?php namespace ToDoApp\Http\Requests;



   class CreateItemRequest extends Request {

    public function authorize(){
        
	    return true;
	    
	}
	public function rules(){
	    return array('content'=>'required');
	}
	


}
