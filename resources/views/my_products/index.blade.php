@extends('app')

@section('content')

	<div class="row">
		<div class="col-xs-6">
			<h2>My Products</h2>
		</div>
		<div class="col-xs-1 col-xs-offset-3">
			<a href="/my-products/create" class="btn btn-primary"><i class="fa fa-plus"> Add Product</i></a>
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

			<th></th>
		</tr>
		</thead>
		<tbody>

		@foreach ($products as $my)
			<tr data-product-id="{{$my->product['id']}}">
				<td><input type="checkbox"></td>
				<td>
					<a href="http://www.amazon.com/gp/product/{{$my->product['asin']}}/ref=olp_product_details">{{$my->product['asin']}}</a>
					<br>
					<a href="my-products/{{$my->product['id']}}"><abbr
								title="{{$my->product['title']}}">{{ Str::words($my->product['title'], 3) }}</abbr></a>
				</td>
				<td>{{$my->product['weight']}}  </td>
				<td>{{$my->product['stars']}}  </td>
				<td>{{$my->product['category_rank']}}  </td>
				<td>{{$my->product['category']}} </td>
				<td>{{$my->product['fba_sellers_total']}}</td>
				<td>{{$my->product['price']}}</td>
				<td>
					<a href="{{route('products.edit',$my->product['id'])}}"><i class="glyphicon glyphicon-pencil"></i></a><br>

					{!! Form::open(['method' => 'delete', 'route' => ['products.destroy', $my->product['id']]]) !!}
					<!-- Delete Form Input  -->
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
