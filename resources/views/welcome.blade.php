@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
						<h1>Welcome!</h1>
						<p>To use this app you must <a href="{{ url('/auth/login') }}">login</a>!</p>
		</div>
	</div>
</div>
@endsection
