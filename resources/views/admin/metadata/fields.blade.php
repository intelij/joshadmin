<!-- Metadataname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('metadataName', 'Metadataname:') !!}
    {!! Form::text('metadataName', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.metadata.index') !!}" class="btn btn-default">Cancel</a>
</div>
