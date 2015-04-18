@extends('app')

@section('content')

<div class="container">
	<h2>{{$product->title}}</h2>
	<div class="col-xs-12 col-sm-4">
		<a href="http://www.amazon.com/gp/product/{{$product->asin}}/ref=olp_product_details">{{$product->asin}}</a>
	</div>
	<div class="col-xs-12 col-sm-4">
		
	</div>
	<div class="col-xs-12 col-sm-4">
		Added: {{$product->created_at}}
	</div>
	
	<div class="col-xs-12">
	</div>

	{{var_dump($product->toArray())}}





</div>

@endsection

@section('scripts')
<script>

$(document).ready(function() {


})

</script>

@endsection
