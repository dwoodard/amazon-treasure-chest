@extends('app')

@section('content')

	<div class="row">
		<div class="col-xs-6">
			<h2>Products</h2>
		</div>
		<div class="col-xs-1 col-xs-offset-3">
			<a href="/products/create" class="btn btn-primary"><i class="fa fa-plus"> Add Product</i></a>
		</div>


	</div>

	<table id="products" class="table table-striped ">
		<thead>
		<tr>
			<th><input type="checkbox"></th>
			<th>ASIN/Title</th>
			<th>weight (oz)</th>
			<th>Stars</th>
			<th>Rank #</th>
			<th>Category</th>
			<th>FBA #</th>
			<th>Price</th>
			<th>Added</th>
			<th></th>
		</tr>
		</thead>
		<tbody>

		@foreach ($products as $product)
			<tr data-product-id="{{$product->id}}">
				<td><input type="checkbox"></td>
				<td>
					<a href="http://www.amazon.com/gp/product/{{$product->asin}}/ref=olp_product_details">{{$product->asin}}</a>
					<br>
					<a href="products/{{$product->id}}"><abbr
								title="{{$product->title}}">{{ Str::words($product->title, 3) }}</abbr></a>
				</td>
				<td>{{$product->weight}} </td>
				<td>{{$product->stars}} </td>
				<td>{{$product->category_rank}} </td>
				<td>{{$product->category}} </td>
				<td>{{$product->fba_sellers_total}}</td>
				<td>{{$product->price}}</td>
				<td>{{$product->created_at->format('m/d H:i')}}</td>
				<td>
					<a href="{{route('products.edit',$product->id)}}"><i class="glyphicon glyphicon-pencil"></i></a><br>
					{!! Form::open(['method' => 'delete', 'route' => ['products.destroy', $product->id]]) !!}
					<!-- Delete Form Input -->
					<button type="submit" style="border:none;background:none;color:#337ab7;font-size: 17px;">
						<i class="fa fa-trash-o"></i>
					</button>

					{!! Form::close() !!}


				</td>
			</tr>
		@endforeach


		</tbody>
	</table>


@endsection

@section('scripts')
	<script>
		$(document).ready(function () {
			var dynatable = $('#products').dynatable({
				readers: {
					'weight-(oz)': function (el, record) {
						return Number($(el).text());
					},
					'price': function (el, record) {
						return Number($(el).text().replace('$', ''));
					},
					'rank-#': function (el, record) {
						return Number($(el).text().replace(/[#,]/ig, ""));
					}
				}
			});
		})
	</script>
@endsection
