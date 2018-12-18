<!-- Suppliername Field -->
<div class="form-group col-sm-12">
    {!! Form::label('supplierName', 'Suppliername:') !!}
    {!! Form::text('supplierName', null, ['class' => 'form-control']) !!}
</div>

<!-- Supplieraddress Field -->
<div class="form-group col-sm-12">
    {!! Form::label('supplierAddress', 'Supplieraddress:') !!}
    {!! Form::text('supplierAddress', null, ['class' => 'form-control']) !!}
</div>

<!-- Suppliercity Field -->
<div class="form-group col-sm-12">
    {!! Form::label('supplierCity', 'Suppliercity:') !!}
    {!! Form::text('supplierCity', null, ['class' => 'form-control']) !!}
</div>

<!-- Supplierzip Field -->
<div class="form-group col-sm-12">
    {!! Form::label('supplierZip', 'Supplierzip:') !!}
    {!! Form::text('supplierZip', null, ['class' => 'form-control']) !!}
</div>

<!-- Supplierphone Field -->
<div class="form-group col-sm-12">
    {!! Form::label('supplierPhone', 'Supplierphone:') !!}
    {!! Form::text('supplierPhone', null, ['class' => 'form-control']) !!}
</div>

<!-- Supplieremail Field -->
<div class="form-group col-sm-12">
    {!! Form::label('supplierEmail', 'Supplieremail:') !!}
    {!! Form::email('supplierEmail', null, ['class' => 'form-control']) !!}
</div>

<!-- Suppliercontactperson Field -->
<div class="form-group col-sm-12">
    {!! Form::label('supplierContactPerson', 'Suppliercontactperson:') !!}
    {!! Form::text('supplierContactPerson', null, ['class' => 'form-control']) !!}
</div>

<!-- Supplierprivacy Field -->
<div class="form-group col-sm-12">
    {!! Form::label('supplierPrivacy', 'Supplierprivacy:') !!}
    {!! Form::text('supplierPrivacy', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.suppliers.index') !!}" class="btn btn-default">Cancel</a>
</div>
