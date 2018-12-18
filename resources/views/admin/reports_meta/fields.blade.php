<!-- Metaname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('metaName', 'MetaName:') !!}
    {!! Form::select('idMetadata', $meta, null, ['class' => 'form-control']) !!}
</div>

<!-- Meta value Field -->
<div class="form-group col-sm-12">
    {!! Form::label('metaValue', 'MetaValue:') !!}
    {!! Form::text('metadataValue', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.reports.meta.index', $reportsID) !!}" class="btn btn-default">Cancel</a>
</div>