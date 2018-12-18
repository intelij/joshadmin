<!-- Departmentname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('departmentName', 'Departmentname:') !!}
    {!! Form::text('departmentName', null, ['class' => 'form-control']) !!}
</div>

<!-- Departmentaddress Field -->
<div class="form-group col-sm-12">
    {!! Form::label('departmentAddress', 'Departmentaddress:') !!}
    {!! Form::text('departmentAddress', null, ['class' => 'form-control']) !!}
</div>

<!-- Departmentcity Field -->
<div class="form-group col-sm-12">
    {!! Form::label('departmentCity', 'Departmentcity:') !!}
    {!! Form::text('departmentCity', null, ['class' => 'form-control']) !!}
</div>

<!-- Departmentzip Field -->
<div class="form-group col-sm-12">
    {!! Form::label('departmentZIP', 'Departmentzip:') !!}
    {!! Form::text('departmentZIP', null, ['class' => 'form-control']) !!}
</div>

<!-- Departmentphone Field -->
<div class="form-group col-sm-12">
    {!! Form::label('DepartmentPhone', 'Departmentphone:') !!}
    {!! Form::text('DepartmentPhone', null, ['class' => 'form-control']) !!}
</div>

<!-- Departmentemail Field -->
<div class="form-group col-sm-12">
    {!! Form::label('departmentEmail', 'Departmentemail:') !!}
    {!! Form::text('departmentEmail', null, ['class' => 'form-control']) !!}
</div>

<!-- CompanyId Field -->
<div class="form-group col-sm-12 hidden">
    {!! Form::label('companyID', 'CompanyID:') !!}
    {!! Form::text('idCompany', $idCompany, ['class' => 'form-control hidden']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.departmentCompanies.index', $idCompany ) !!}" class="btn btn-default">Cancel</a>
</div>
