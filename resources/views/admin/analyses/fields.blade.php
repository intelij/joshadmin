<!-- Anaysisname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('anaysisName', 'Anaysisname:') !!}
    {!! Form::text('anaysisName', null, ['class' => 'form-control']) !!}
</div>

<!-- Anaysisdescription Field -->
<div class="form-group col-sm-12">
    {!! Form::label('anaysisDescription', 'Anaysisdescription:') !!}
    {!! Form::text('anaysisDescription', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.analyses.index') !!}" class="btn btn-default">Cancel</a>
</div>
