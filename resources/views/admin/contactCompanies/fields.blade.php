<!-- Companycontactname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('companyContactName', 'Companycontactname:') !!}
    {!! Form::text('companyContactName', null, ['class' => 'form-control']) !!}
</div>

<!-- Companycontactsurname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('CompanyContactSurname', 'Companycontactsurname:') !!}
    {!! Form::text('CompanyContactSurname', null, ['class' => 'form-control']) !!}
</div>

<!-- Companycontactphone Field -->
<div class="form-group col-sm-12">
    {!! Form::label('companyContactPhone', 'Companycontactphone:') !!}
    {!! Form::text('companyContactPhone', null, ['class' => 'form-control']) !!}
</div>

<!-- Companycontactemail Field -->
<div class="form-group col-sm-12">
    {!! Form::label('companyContactEmail', 'Companycontactemail:') !!}
    {!! Form::text('companyContactEmail', null, ['class' => 'form-control']) !!}
</div>

<!-- Companycontacttitle Field -->
<div class="form-group col-sm-12">
    {!! Form::label('CompanyContactTitle', 'Companycontacttitle:') !!}
    {!! Form::text('CompanyContactTitle', null, ['class' => 'form-control']) !!}
</div>

<!-- Companycontactprimary Field -->
<div class="form-group col-sm-12">
    {!! Form::label('companyContactPrimary', 'Companycontactprimary:') !!}
    {!! Form::text('companyContactPrimary', null, ['class' => 'form-control']) !!}
</div>

<!-- CompanyId Field -->
<div class="form-group col-sm-12 hidden">
    {!! Form::label('companyID', 'CompanyID:') !!}
    {!! Form::text('idCompany', $idCompany, ['class' => 'form-control hidden']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.contactCompanies.index', $idCompany ) !!}" class="btn btn-default">Cancel</a>
</div>
