@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			       
						<h1>Lists ({{ $lists->count() }})</h1>
						{!! $lists->render() !!}
						@foreach($lists as $list)
							<h3>{{ $list->name }}</h3> <a href="{{ route('lists.edit',$list->id) }}" class="btn btn-info pull-left margin-right" role="button">Edit </a>
							<a href="{{ route('lists.show',$list->id) }}" class="btn btn-info pull-left margin-right" role="button">Show list </a>
							@if(!$list->arhiva)
							{!! Form::open(array('method'=>'PUT', 'route' => array('lists.archive',$list->id),'class' => 'form-horizontal pull-left margin-right')) !!}
									{!!  Form::submit('Archive',['class'=>'btn btn-warning']); !!}
							{!! Form::close() !!}
							@else
							{!! Form::open(array('method'=>'PUT', 'route' => array('lists.archive',$list->id),'class' => 'form-horizontal pull-left margin-right')) !!}
									{!!  Form::submit('Unarchive',['class'=>'btn btn-warning']); !!}
							{!! Form::close() !!}
							{!! Form::open(array('method'=>'DELETE', 'route' => array('lists.destroy',$list->id),'class' => 'form-horizontal')) !!}
									{!!  Form::submit('Delete',['class'=>'btn btn-danger']); !!}
							{!! Form::close() !!}
							@endif
							<div class="clearfix"></div>
						@endforeach
							
							<a href="{{ route('lists.create') }}" class="btn btn-success pull-left margin-top" role="button">Create new list </a>
						
					
					
					
		</div>
	</div>
</div>
@endsection
