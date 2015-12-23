@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{ $list->name }}</h1>
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			{!! Form::model($list, array('method'=>'PUT','route' => array('lists.update',$list->id),'class' => 'form-horizontal')) !!}
				{!! Form::hidden('user_id') !!}
			    <div class="form-group">
					{!! Form::label('name', trans_choice('todo.name',2),['class'=>'col-md-2 control-label']); !!}
					<div class="col-md-6">
						{!!  Form::text('name',null,['class'=>'form-control']); !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('', '',['class'=>'col-md-2 control-label']); !!}
					<div class="col-md-6">
						{!!  Form::submit('Save',['class'=>'btn btn-primary']); !!}
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
