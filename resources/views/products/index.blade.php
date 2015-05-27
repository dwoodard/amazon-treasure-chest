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
			Mustache.parse(template);
			return Mustache.render(template, data);
		}

		var editor;
		$(document).ready(function () {

			$.fn.editable.defaults.mode = 'inline';
			editor = new $.fn.dataTable.Editor({
				ajax: "/products/data",
				table: "#all-products",
				fields: [
					{
						label: "asin",
						name: "asin"
					}, {
						label: "FBA:",
						name: "fba_sellers_total"
					}, {
						label: "Price:",
						name: "price"
					}, {
						label: "Category:",
						name: "category"
					}, {
						label: "manufacturer:",
						name: "manufacturer"
					}, {
						label: "Status:",
						name: "status",
						type: "select",
						options: [
							'',
							'evaluated:good',
							'rejected'
						]
					}
				]
			});

			// Activate an inline edit on click of a table cell
			$('#all-products').on('click', 'tbody td:not(:first-child)', function (e) {
				editor.inline(this, {
					buttons: {
						label: '>', fn: function () {
							console.log(this);
							this.submit();
						}
					}
				});
			});
			var table = $('#all-products').DataTable({
				deferRender: true,
				dom: 'f<"#columns" C>rtiS',
				scrollY: $(window).height() < 630 ? 380 : 640,
				"oScroller": {
					"displayBuffer": 50
				},
				scrollCollapse: false,
				"oColVis": {
					"exclude": [0],
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
				"ajax": "/products/data",
				tableTools: {
					sRowSelect: "os",
					sRowSelector: 'td:first-child',
					aButtons: [
						{sExtends: "editor_create", editor: editor},
						{sExtends: "editor_edit", editor: editor},
						{sExtends: "editor_remove", editor: editor}
					]
				},
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
					{data: 'asin', name: 'asin'},
					{data: 'fba_sellers_total', name: 'fba_sellers_total'},
					{data: 'price', name: 'price'},
					{data: 'category', name: 'category'},
					{data: 'status', name: 'status'},
					{ data: 'manufacturer', name: 'manufacturer', "visible": false, "searchable": false},
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
			for (var i = 8; i <= 15; i++) {
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
					var data = row.data()
					console.log(data)
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
							getManufacturers
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
