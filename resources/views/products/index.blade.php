@extends('app')

@section('content')

	<div class="row">
		<div class="col-xs-6">
			<h2>All Products</h2>
		</div>
		<div class="col-xs-1 col-xs-offset-3">
			<a href="/products/create" class="btn btn-primary"><i class="fa fa-plus"> Add Product</i></a>
		</div>
	</div>


	<table id="all-products" class="table table-hover table-condensed">
		<thead>
		<tr>
			<th width="1%"></th>
			<th>asin</th>
			<th>FBA</th>
			<th>price</th>
			<th>category</th>
			<th>manufacturer</th>
			<th>status</th>
			<th>category_rank</th>
			<th>weight</th>
			<th>stars</th>
			<th>dimensions</th>
			<th>subcategory</th>
			<th>created_at</th>
			<th>title</th>
			<th>customer_reviews_total</th>
		</tr>
		</thead>
		<tbody></tbody>
	</table>
@endsection

@section('scripts')
	<script>
		function format(data) {
			var modelNumber = data.item_model_number || data.manufacturer_part_number;

			return '<div role="tabpanel">' +

					'   <ul class="nav nav-tabs" role="tablist">' +
					'       <li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>' +
					'       <li role="presentation"><a href="#manufacturer" aria-controls="manufacturer" role="tab" data-toggle="tab">Manufacturer</a></li>' +
					'       <li role="presentation"><a href="#tracker" aria-controls="tracker" role="tab" data-toggle="tab">Tracker</a></li>' +
					'   </ul>' +

					'   <div class="tab-content">' +

					'       <div role="tabpanel" class="tab-pane active" id="details">' +
					'           <div class="container-fluid" style="margin-top: 30px">' +
					'               <div class="row">'+
					'                   <div class="col-xs-12" style="margin-bottom:10px ">' +
					'                       <a href="' + data.url + '" target="_blank">' + data.title + '</a>' +
					'                   </div>'+
					'               </div> <!-- row -->' +

					'               <div class="row">'+
					'                   <div class="col-xs-5">' +
					'                      <label>Rank: </label> ' + '<span>' + data.category_rank + '</span> <br/>' +
					'                      <label>Category: </label> ' + '<span>' + data.category + '</span>' + ' <span>' + null + '</span> <br/>' +
					'                      <label>Weight: </label> ' + '<span>' + data.weight + ' oz</span> <br/>' +
					'                      <label>Dimensions: </label> ' + '<span>' + data.dimensions + ' oz</span> <br/><br/>' +
					'                  </div>'+

					'                   <div class="col-xs-5">' +
					'                      <label>Manufacturer: </label> ' + '<a href="' + data.made_by_link + '">' + data.manufacturer + '</a>' + '<br/>' +
					'                      <span style="font-size: 11px">' + data.sold_by + '</span> <br/><br/>' +
					'                      <label>Model Number:</label>' +
					'                      <span>' + modelNumber + '</span>' +
					'                   </div>' +

					'                   <div class="col-xs-2">' +
					'                       <label>Stars: </label> ' + '<span>' + data.stars + '</span> <br/>' +
					'                       <label>Reviews: </label> ' + '<span>' + data.customer_reviews_total + '</span> <br/>' +
					'                   </div>' +
					'               </div> <!-- row -->' +

					'               <div class="row">'+
					'                   <div class="col-xs-12">' +
					'                       <span style="font-size: 11px">' + data.subcategory + '</span>' +
					'                   </div>' +
					'              </div> <!-- row -->' +

					'         </div> <!-- container-fluid -->' +
					'   </div>  <!-- tabpanel #details -->' +

					'   <div role="tabpanel" class="tab-pane" id="manufacturer">' +
					'       <h2>Manufacturer</h2>' +
					'   </div><!-- tabpanel #manufacturer -->' +

					'   <div role="tabpanel" class="tab-pane" id="tracker">' +
					'       <h2>Tracker</h2>' +
					'   </div><!-- tabpanel #tracker -->' +

					'</div><!-- tab-content -->' +

					'</div><!-- tabpanel -->';


		}

		var editor;
		$(document).ready(function () {

			editor = new $.fn.dataTable.Editor({
				ajax: "/products/data",
				table: "#example",
				fields: [{
					label: "First name:",
					name: "first_name"
				}, {
					label: "Last name:",
					name: "last_name"
				}, {
					label: "Position:",
					name: "position"
				}, {
					label: "Office:",
					name: "office"
				}, {
					label: "Extension:",
					name: "extn"
				}, {
					label: "Start date:",
					name: "start_date",
					type: "date"
				}, {
					label: "Salary:",
					name: "salary"
				}
				]
			});

			var table = $('#all-products').DataTable({
				dom: 'C<"clear">lfrtip',
				"oColVis": {
					"exclude": [0,7],
					"showAll": "Show all",
					"showNone": "Show none"

				},
				"processing": true,
//				"serverSide": true,
				"ajax": "/products/data",
				"columns": [
					{
						"className": 'details-control',
						"orderable": false,
						"data": null,
						"defaultContent": ''
					},
					{data: 'asin', name: 'asin'},
					{data: 'fba_sellers_total', name: 'fba_sellers_total'},
					{data: 'price', name: 'price'},
					{data: 'category', name: 'category'},
					{data: 'manufacturer', name: 'manufacturer'},
					{data: 'status', name: 'status'},
					{data: 'category_rank', name: 'category_rank'},
					{data: 'weight', name: 'weight'},
					{data: 'stars', name: 'stars'},
					{data: 'dimensions', name: 'dimensions'},
					{data: 'subcategory', name: 'subcategory'},
					{data: 'created_at', name: 'created_at'},
					{data: 'title', name: 'title'},
					{data: 'customer_reviews_total', name: 'customer_reviews_total'}
				]
			});

			for ( var i=7 ; i<=14 ; i++ ) {
				table.column( i ).visible( false, false );
			}

			// Add event listener for opening and closing details
			$('#all-products tbody').on('click', 'td.details-control', function () {
				var tr = $(this).closest('tr');
				var row = table.row(tr);
				if (row.child.isShown()) {
					// This row is already open - close it
					row.child.hide();
					tr.removeClass('shown');
				} else {
					// Open this row
					row.child(format(row.data())).show();
					tr.addClass('shown');
				}
			});
		});

	</script>

@endsection

@section('css')
	<style>
		td.details-control {
			background: url('/css/img/details_open.png') no-repeat center center;
			cursor: pointer;
		}

		tr.shown td.details-control {
			background: url('/css/img/details_close.png') no-repeat center center;
		}
	</style>
@endsection
