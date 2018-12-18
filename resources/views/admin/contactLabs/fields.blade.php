<!-- Labscontactname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('labsContactName', 'Labscontactname:') !!}
    {!! Form::text('labsContactName', null, ['class' => 'form-control']) !!}
</div>

<!-- Labscontactsurname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('labsContactSurname', 'Labscontactsurname:') !!}
    {!! Form::text('labsContactSurname', null, ['class' => 'form-control']) !!}
</div>

<!-- Labscontactphone Field -->
<div class="form-group col-sm-12">
    {!! Form::label('LabsContactPhone', 'Labscontactphone:') !!}
    {!! Form::text('LabsContactPhone', null, ['class' => 'form-control']) !!}
</div>

<!-- Labscontactmobile Field -->
<div class="form-group col-sm-12">
    {!! Form::label('labsContactMobile', 'Labscontactmobile:') !!}
    {!! Form::text('labsContactMobile', null, ['class' => 'form-control']) !!}
</div>

<!-- Labscontactemail Field -->
<div class="form-group col-sm-12">
    {!! Form::label('labsContactEmail', 'Labscontactemail:') !!}
    {!! Form::email('labsContactEmail', null, ['class' => 'form-control']) !!}
</div>

<!-- Labscontacttitle Field -->
<div class="form-group col-sm-12">
    {!! Form::label('labsContactTitle', 'Labscontacttitle:') !!}
    {!! Form::text('labsContactTitle', null, ['class' => 'form-control']) !!}
</div>

<!-- Labscontactjobtitle Field -->
<div class="form-group col-sm-12">
    {!! Form::label('labsContactJobTitle', 'Labscontactjobtitle:') !!}
    {!! Form::text('labsContactJobTitle', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.contactLabs.index') !!}" class="btn btn-default">Cancel</a>
</div>
