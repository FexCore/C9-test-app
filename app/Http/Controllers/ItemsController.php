<?php namespace ToDoApp\Http\Controllers;

use ToDoApp\Http\Requests\CreateItemRequest;
use ToDoApp\Http\Requests\EditItemRequest;
use Redirect;
use ToDoApp\Item;

class ItemsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$items=Item::paginate(5);
		return view('items.index',compact('items'));
	}
	
	public function show()
	{
		return view('home');
	}
	
	public function create($list_id)
	{
		return view('items.create',compact('list_id'));
	}
	
	public function store(CreateItemRequest $request)
	{
		$todolist_id=$request->input('todolist_id');
		Item::create($request->all());
		return Redirect::route('lists.show',$todolist_id);
	}
	
	public function edit($id)
	{
		$item=Item::findOrFail($id);
		return view('items.edit',compact('item'));
	}
	
	public function update(EditItemRequest $request,$id)
	{

		$item=Item::findOrFail($id);
		$item->update($request->all());
		return Redirect::route('lists.show',$item->todolist_id);
	}
	
	public function destroy($id)
	{
		$item=Item::findOrFail($id);
		$item->delete();
		return Redirect::route('lists.show',$item->todolist_id);
	}
	
	
	public function done($id)
	{
		$done=0;
		$item=Item::findOrFail($id);
		if(!$item->done)
			$done=1;
		$item->done=$done;
		$item->save();
		return Redirect::route('lists.show',$item->todolist_id);
	}


}
