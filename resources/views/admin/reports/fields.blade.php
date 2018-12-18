<!-- Reportsnumber Field -->
<div class="form-group col-sm-12">
    {!! Form::label('reportsNumber', 'Reportsnumber:') !!}
    {!! Form::text('reportsNumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Reportsnumberlab Field -->
<div class="form-group col-sm-12">
    {!! Form::label('reportsNumberLab', 'Reportsnumberlab:') !!}
    {!! Form::text('reportsNumberLab', null, ['class' => 'form-control']) !!}
</div>

<!-- Reportsitemdescription Field -->
<div class="form-group col-sm-12">
    {!! Form::label('reportsItemDescription', 'Reportsitemdescription:') !!}
    {!! Form::text('reportsItemDescription', null, ['class' => 'form-control']) !!}
</div>

<!-- Reportscolor Field -->
<div class="form-group col-sm-12">
    {!! Form::label('ReportsColor', 'Reportscolor:') !!}
    {!! Form::text('ReportsColor', null, ['class' => 'form-control']) !!}
</div>

<!-- Reportsstyle Field -->
<div class="form-group col-sm-12">
    {!! Form::label('reportsStyle', 'Reportsstyle:') !!}
    {!! Form::text('reportsStyle', null, ['class' => 'form-control']) !!}
</div>

<!-- Reportssku Field -->
<div class="form-group col-sm-12">
    {!! Form::label('reportsSKU', 'Reportssku:') !!}
    {!! Form::text('reportsSKU', null, ['class' => 'form-control']) !!}
</div>

<!-- Reportdatein Field -->
<div class="form-group col-sm-12">
    {!! Form::label('reportDateIn', 'Reportdatein:') !!}
    {!! Form::date('reportDateIn', null, ['class' => 'form-control']) !!}
</div>

<!-- Reportsdateout Field -->
<div class="form-group col-sm-12">
    {!! Form::label('reportsDateOut', 'Reportsdateout:') !!}
    {!! Form::date('reportsDateOut', null, ['class' => 'form-control']) !!}
</div>

<!-- Reportsrating Field -->
<div class="form-group col-sm-12">
    {!! Form::label('reportsRating', 'Reportsrating:') !!}
    {!! Form::text('reportsRating', null, ['class' => 'form-control']) !!}
</div>

<!-- Anaysisname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Supplier', 'SupplierName:') !!}
    {!! Form::select('idSupplier', $suppliers, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.reports.index') !!}" class="btn btn-default">Cancel</a>
</div>
