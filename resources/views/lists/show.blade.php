@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
						<h1>{{ $list->name }}</h1>
						
						@if($list->items)
							@foreach($list->items as $item)
							@if($item->done)
							<h3><s>{{ $item->content }}</s></h3>
							{!! Form::open(array('method'=>'PUT', 'route' => array('items.done',$item->id),'class' => 'form-horizontal pull-left margin-right')) !!}
									{!!  Form::submit('Undone',['class'=>'btn btn-warning']); !!}
							{!! Form::close() !!}
							@else
							<h3>{{ $item->content }}</h3>
							{!! Form::open(array('method'=>'PUT', 'route' => array('items.done',$item->id),'class' => 'form-horizontal pull-left margin-right')) !!}
									{!!  Form::submit('Done',['class'=>'btn btn-warning']); !!}
							{!! Form::close() !!}
							@endif
							
							<a href="{{ route('items.edit',$item->id) }}" class="btn btn-info pull-left margin-right" role="button">Edit </a>
						
						
							{!! Form::open(array('method'=>'DELETE', 'route' => array('items.destroy',$item->id),'class' => 'form-horizontal pull-left margin-right')) !!}
									{!!  Form::submit('Delete',['class'=>'btn btn-danger']); !!}
							{!! Form::close() !!}
							<div class="clearfix"></div>								
							@endforeach
						@endif
					
						<a href="{{ route('items.create',$list->id) }}" class="btn btn-success margin-top" role="button">Create item</a>
		</div>
	</div>
</div>
@endsection
