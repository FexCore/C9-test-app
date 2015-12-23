<?php namespace ToDoApp\Http\Requests;



   class EditItemRequest extends Request {

    public function authorize(){
        
	    return true;
	    
	}
	public function rules(){
	    return array('content'=>'required');
	}
	


}
