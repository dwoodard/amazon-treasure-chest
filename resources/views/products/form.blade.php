
<div class="form-group">
	{!!Form::label('title','title:')!!}
	{!!Form::text('title', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('asin','asin:')!!}
	{!!Form::text('asin', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('price','price:')!!}
	{!!Form::text('price', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('manufacturer','manufacturer:')!!}
	{!!Form::text('manufacturer', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('made_by_link','made_by_link:')!!}
	{!!Form::text('made_by_link', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('stars','stars:')!!}
	{!!Form::text('stars', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('fba_sellers_total','fba_sellers_total:')!!}
	{!!Form::text('fba_sellers_total', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('price_lowest_sold','price_lowest_sold:')!!}
	{!!Form::text('price_lowest_sold', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('url','url:')!!}
	{!!Form::text('url', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('customer_reviews_total','customer_reviews_total:')!!}
	{!!Form::text('customer_reviews_total', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('sold_by','sold_by:')!!}
	{!!Form::text('sold_by', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('new_sellers_total','new_sellers_total:')!!}
	{!!Form::text('new_sellers_total', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('new_sellers_link','new_sellers_link:')!!}
	{!!Form::text('new_sellers_link', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('item_model_number','item_model_number:')!!}
	{!!Form::text('item_model_number', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('manufacturer_part_number','manufacturer_part_number:')!!}
	{!!Form::text('manufacturer_part_number', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('dimensions','dimensions:')!!}
	{!!Form::text('dimensions', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('weight','weight:')!!}
	{!!Form::text('weight', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('category','category:')!!}
	{!!Form::text('category', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('category_rank','category_rank:')!!}
	{!!Form::text('category_rank', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('subcategory','subcategory:')!!}
	{!!Form::text('subcategory', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::label('status','status:')!!}
	{!!Form::text('status', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::submit($submitButtonText, null, ['class' => 'btn btn-primary form-control']) !!}
</div>