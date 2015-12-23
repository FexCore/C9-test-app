@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create item</h1>
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			{!! Form::open(array('route' => 'items.store','class' => 'form-horizontal')) !!}
				{!! Form::hidden('todolist_id',$list_id) !!}
			    <div class="form-group">
					{!! Form::label('Item content',null,['class'=>'col-md-2 control-label']); !!}
					<div class="col-md-6">
						{!!  Form::text('content',null,['class'=>'form-control']); !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('', '',['class'=>'col-md-2 control-label']); !!}
					<div class="col-md-6">
						{!!  Form::submit('Create!',['class'=>'btn btn-primary']); !!}
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
