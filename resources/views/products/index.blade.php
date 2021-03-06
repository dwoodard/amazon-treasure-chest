@extends('app')

@section('content')

	<div class="row">
		<div class="col-xs-6">
			<h2>All Products</h2>
		</div>
		<div class="col-xs-1 col-xs-offset-3">

		</div>
	</div>


	<table id="all-products" class="table table-hover table-condensed" cellspacing="0" width="100%">
		<thead>
		<tr>
			<th width="1%"></th>
			<th>img</th>
			<th>Score</th>
			<th>asin</th>
			<th>FBA</th>
			<th>price</th>
			<th>category</th>
			<th>status</th>
			<th>manufacturer</th>
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

	@include('products/product_dropdown')


@endsection

@section('scripts')

	<script>
		function format(data) {
			var modelNumber = data.item_model_number || data.manufacturer_part_number;
			data.modelNumber = modelNumber;
			var template = $('#product_dropdown').html();
			Mustache.Formatters = {
				"multiply": function (value, multiplier) {
					return value * multiplier;
				},
				"divide": function (value, dividend) {
					return value / dividend;
				},
				"divideNumerator": function (value, dividend) {
					return Math.round(dividend / value);
				},

				"categoryRank": function (value) {
					if (value == null || value == 0) {
						return 200;
					} else {
						return value * 10;
					}
				},
				"soldBy": function (value) {
					if (!!/sold by amazon/i.exec(value)) {
						return 300;
					} else {
						return 0;
					}
				},
				"reviewsTotal": function (value) {
					if (value < 20) {
						return 50;
					} else {
						return 0;
					}
				}
			};
			Mustache.parse(template);

			return Mustache.render(template, data);
		}

		var editor;
		$(document).ready(function () {

			var dataUrl;

			switch(location.pathname){
				case '/products/my-products':
					dataUrl = "/my-products/data";
					break;
				case '/products/deleted':
					dataUrl = "/delete-products/data";
					break;
				default:
					dataUrl = "/products/data";
					break;
			}

			$.fn.editable.defaults.mode = 'inline';

			var table = $('#all-products').DataTable({
				"ajax": dataUrl,
				deferRender: true,
				dom: 'f<"#columns" C>rtiS',
				scrollY: $(window).height() < 630 ? 380 : 640,
				"oScroller": {
					"displayBuffer": 50
				},
				scrollCollapse: false,
				"oColVis": {
					"exclude": [0, 1],
					"showAll": "Show all",
					"showNone": "Show none"

				},
				"bPaginate": true,
				"processing": true,
				"serverSide": true,
				"bStateSave": true,
				"iDisplayLength": 50,
				"oLanguage": {
					"sInfo": "Showing _START_ to _END_ of _TOTAL_ items",
					"sInfoEmpty": "Showing 0 to 0 of 0 items",
					"sInfoFiltered": " - filtering from _MAX_ items",
					"sEmptyTable": "No Rules available"
				},
				"order": [[2, "desc"]],
				"columns": [
					{
						"className": 'details-control',
						"orderable": false,
						"data": null,
						"defaultContent": ''
					},
					{
						"orderable": true,
						"sortable": true,
						"mRender": function (data, type, row) {
							if (row.img) {
								img_str = '<img src="' + row.img + '"/>';
								return img_str;
							}
							return row.img;
						}
					},
					{data: 'score', name: 'score'},
					{data: 'asin', name: 'asin'},
					{data: 'fba_sellers_total', name: 'fba_sellers_total'},
					{data: 'price', name: 'price'},
					{data: 'category', name: 'category'},
					{data: 'status', name: 'status'},
					{data: 'manufacturer', name: 'manufacturer', "visible": false, "searchable": false},
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

			//Hide any columns greater than 7
			for (var i = 8; i <= 16; i++) {
				table.column(i).visible(false, false);
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
					var data = row.data();

					var getProduct = $.get("/product/json/" + data.id, function (result) {
						result = result[0];

						function commafy(num) {
							var parts = ('' + (num < 0 ? -num : num)).split("."), s = parts[0], i = L = s.length, o = '', c;
							while (i--) {
								o = (i == 0 ? '' : ((L - i) % 3 ? '' : ','))
								+ s.charAt(i) + o
							}
							return (num < 0 ? '-' : '') + o + (parts[1] ? '.' + parts[1] : '');
						}

						var total = commafy(result.category_total);
						data["category_rank_percent"] = result.category_rank_percent;
						data["category_total"] = total;
					});

					var getManufacturers = $.get("/manufacturers/" + data.manufacturer_id, function (result) {
						var ignore = ["deleted_at", "created_at", "updated_at"];
						_.each(_.keys(result), function (i) {
							var rename = true;
							switch (i) {
								case "id":
									data["company_id"] = result[i];
									rename = false;
									break;
								case "status":
									data["company_status"] = result[i];
									rename = false;
									break;
								case "notes":
									data["company_notes"] = result[i];
									rename = false;
									break;
							}

							var add = !_.contains(ignore, i);
							if (add && rename) {
								data[i] = result[i];
							}
						});
					});

					$.when(
							getManufacturers,
							getProduct
					).then(function () {
								row.child(format(data)).show();
								tr.addClass('shown');
								$('.editable').editable({
									params: function (params) {  //params already contain `name`, `value` and `pk`
										params.table_name = $(this).attr('data-tablename');
										return params;
									},
									success: function (response, newValue) {
										if (response.status == 'error') return response.msg; //msg will be shown in editable form
									}
								});
								$('.add-myproduct').on('click', function () {
									$this = $(this);
									var product_id = $(this).closest('[data-product-id]').data('product-id');
									$.ajax({
										method: "POST",
										url: "my-products",
										data: {product_id: product_id}
									}).done(function (data) {
										console.log("Data Saved: ", data);
										$this.prepend('<i class="fa fa-check">')
									});
								});
							});
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
