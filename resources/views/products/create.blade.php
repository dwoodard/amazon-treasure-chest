@extends('app')

@section('content')

	<h1>New Product</h1>
	<hr/>

	@include('errors/list')
	{!! Form::open(['url' => 'products']) !!}
	@include('products/form', ['submitButtonText' => 'Add Product'])
	{!! Form::close() !!}

@stop














