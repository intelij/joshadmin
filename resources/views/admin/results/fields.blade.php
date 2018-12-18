<!-- Resultscomments Field -->
<div class="form-group col-sm-12">
    {!! Form::label('resultsComments', 'Resultscomments:') !!}
    {!! Form::text('resultsComments', null, ['class' => 'form-control']) !!}
</div>

<!-- Resultslabrating Field -->
<div class="form-group col-sm-12">
    {!! Form::label('resultsLabRating', 'Resultslabrating:') !!}
    {!! Form::text('resultsLabRating', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.results.index') !!}" class="btn btn-default">Cancel</a>
</div>
