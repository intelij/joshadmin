<!-- Partsdescription Field -->
<div class="form-group col-sm-12">
    {!! Form::label('partsDescription', 'Partsdescription:') !!}
    {!! Form::text('partsDescription', null, ['class' => 'form-control']) !!}
</div>

<!-- Partscolor Field -->
<div class="form-group col-sm-12">
    {!! Form::label('partsColor', 'Partscolor:') !!}
    {!! Form::text('partsColor', null, ['class' => 'form-control']) !!}
</div>

<!-- Partsmaterial Field -->
<div class="form-group col-sm-12">
    {!! Form::label('partsMaterial', 'Partsmaterial:') !!}
    {!! Form::text('partsMaterial', null, ['class' => 'form-control']) !!}
</div>

<!-- CompanyId Field -->
<div class="form-group col-sm-12 hidden">
    {!! Form::label('reportsID', 'ReportID:') !!}
    {!! Form::text('idReports', $reportsID, ['class' => 'form-control hidden']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.reports.parts.index', $reportsID) !!}" class="btn btn-default">Cancel</a>
</div>
