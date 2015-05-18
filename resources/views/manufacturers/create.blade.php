@extends('app')

@section('content')

	<h1>New Manufacturer</h1>
	<hr/>

	@include('errors/list')
	{!! Form::open(['url' => 'products']) !!}
	@include('products/form', ['submitButtonText' => 'Add Product'])
	{!! Form::close() !!}

@stop














