<!-- Companyname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('companyName', 'Companyname:') !!}
    {!! Form::text('companyName', null, ['class' => 'form-control']) !!}
</div>

<!-- Companyaddress Field -->
<div class="form-group col-sm-12">
    {!! Form::label('companyAddress', 'Companyaddress:') !!}
    {!! Form::text('companyAddress', null, ['class' => 'form-control']) !!}
</div>

<!-- Companycity Field -->
<div class="form-group col-sm-12">
    {!! Form::label('CompanyCity', 'Companycity:') !!}
    {!! Form::text('CompanyCity', null, ['class' => 'form-control']) !!}
</div>

<!-- Companyphone Field -->
<div class="form-group col-sm-12">
    {!! Form::label('companyPhone', 'Companyphone:') !!}
    {!! Form::text('companyPhone', null, ['class' => 'form-control']) !!}
</div>

<!-- Companyemail Field -->
<div class="form-group col-sm-12">
    {!! Form::label('companyEmail', 'Companyemail:') !!}
    {!! Form::text('companyEmail', null, ['class' => 'form-control']) !!}
</div>

<!-- Companyvat Field -->
<div class="form-group col-sm-12">
    {!! Form::label('companyVat', 'Companyvat:') !!}
    {!! Form::text('companyVat', null, ['class' => 'form-control']) !!}
</div>

<!-- Companygrade Field -->
<div class="form-group col-sm-12">
    {!! Form::label('companyGrade', 'Companygrade:') !!}
    {!! Form::text('companyGrade', null, ['class' => 'form-control']) !!}
</div>

<!-- Companylink Field -->
<div class="form-group col-sm-12">
    {!! Form::label('companyLink', 'Companylink:') !!}
    {!! Form::text('companyLink', null, ['class' => 'form-control']) !!}
</div>

<!-- Companyzip Field -->
<div class="form-group col-sm-12">
    {!! Form::label('CompanyZip', 'Companyzip:') !!}
    {!! Form::text('CompanyZip', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.companies.index') !!}" class="btn btn-default">Cancel</a>
</div>
