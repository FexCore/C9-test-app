@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
						<h1>Items</h1>
						{!! $items->render() !!}
						@foreach($items as $item)
							@if(!$item->done)
							<h3>{{ $item->content }}</h3>
							@else
							<h3><span style="text-decoration:uderline;">{{ $item->content }}</span></h3>
							@endif
								{{ $item->name }} <a href="{{ route('items.edit',$item->id) }}" class="btn btn-info" role="button">Edit </a>
								{!! Form::open(array('method'=>'DELETE', 'route' => array('items.destroy',$item->id),'class' => 'form-horizontal')) !!}
									{!!  Form::submit('Delete',['class'=>'btn btn-info']); !!}
							{!! Form::close() !!}
							<br>
						@endforeach
						<a href="{{ route('items.create') }}" class="btn btn-info" role="button">Create item</a>
		</div>
	</div>
</div>
@endsection
