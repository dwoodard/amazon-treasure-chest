@extends('app')

@section('content')

	<h1>Edit: {{$product->title}}</h1>
	<h2>{{$product->asin}}</h2>
	<hr/>

	@include('errors/list')
	{!! Form::model($product,['method'=>'PATCH', 'route' => ['products.update', $product->id]])!!}
	@include('products/form', ['submitButtonText' => 'Update Product'])
	{!! Form::close() !!}

@stop