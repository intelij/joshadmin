<!-- Idanalysis Field -->
<div class="form-group">
    {!! Form::label('MetaName', 'MetaName:') !!}
    <p>{!! $meta['name'] !!}</p>
    <hr>
</div>

<!-- Meta value Field -->
<div class="form-group col-sm-12">
    {!! Form::label('metaValue', 'MetaValue:') !!}
    {!! Form::text('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.reports.meta.index', $reportsID) !!}" class="btn btn-default">Cancel</a>
</div>

