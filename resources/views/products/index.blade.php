@extends('app')

@section('content')

<div class="container">
	<h2>Products</h2>


	<table id="products" class="table table-striped ">
		<thead>
			<tr>
				<th><input type="checkbox"></th>
				<th>ASIN/Title</th>
				<th>Rank #</th>
				<th>Category</th>
				<th>FBA #</th>
				<th>Price</th>
			</tr>
		</thead>
		<tbody>

			@foreach ($products as $product)
			<tr data-product-id="{{$product->id}}">
				<td><input type="checkbox"></td>
				<td>
				<a href="http://www.amazon.com/gp/product/{{$product->asin}}/ref=olp_product_details">{{$product->asin}}</a> <br>
				{{$product->title}}
				</td>
				<td>{{$product->category_rank}}  </td>
				<td>{{$product->category}} </td>
				<td>{{$product->fba_sellers_total}}</td>
				<td>{{$product->price}}</td>
			</tr>
			@endforeach


	
		</tbody>
	</table>


</div>

@endsection

@section('scripts')
<script>

$(document).ready(function() {
	var dynatable = $('#products').dynatable({
    readers: {
      'price': function(el, record) {return Number($(el).text().replace('$','')); },
      'rank-#': function(el, record) {return Number($(el).text().replace(/[#,]/ig,"")); } 

    }
  });
	dynatable.paginationPerPage.set(50);
})

</script>

@endsection
