<?php namespace ToDoApp\Http\Controllers;

use ToDoApp\Http\Requests\CreateTodolistRequest;
use ToDoApp\Http\Requests\EditTodolistRequest;
use Redirect;
use Auth;
use ToDoApp\Todolist;

class TodolistsController extends Controller {

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
		
		$lists=Todolist::where('arhiva',0)->where('user_id',Auth::user()->id)->paginate(5);
		return view('lists.index',compact('lists'));
	}
	
	public function show($id)
	{
		$list=Todolist::findOrFail($id);
		
		return view('lists.show',compact('list'));
	}
	
	public function create()
	{
		return view('lists.create');
	}
	
	public function store(CreateTodolistRequest $request)
	{

		Todolist::create($request->all());
		return Redirect::route('lists.index');
	}
	
	public function edit($id)
	{
		$list=Todolist::findOrFail($id);
		return view('lists.edit',compact('list'));
	}
	
	public function update(EditTodolistRequest $request,$id)
	{
		$list=Todolist::findOrFail($id);
		$list->update($request->all());
		return Redirect::route('lists.index');
	}
	
	public function destroy($id)
	{
		$list=Todolist::findOrFail($id);
		$list->delete();
		return Redirect::route('lists.index');
	}
	
	public function archive($id)
	{
		$arhiva=0;
		$list=Todolist::findOrFail($id);
		if(!$list->arhiva)
			$arhiva=1;
		$list->arhiva=$arhiva;
		$list->save();
		return Redirect::route('lists.index');
	}
	
	public function listArhiva()
	{
		
		$lists=Todolist::where('arhiva',1)->where('user_id',Auth::user()->id)->paginate(5);
		return view('lists.index',compact('lists'));
	}

}
