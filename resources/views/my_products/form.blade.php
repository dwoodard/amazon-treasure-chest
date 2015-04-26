
<div class="form-group">
	{!!Form::label('title','title:')!!}
	{!!Form::text('title', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
	{!!Form::submit($submitButtonText, null, ['class' => 'btn btn-primary form-control']) !!}
</div>