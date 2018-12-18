<!-- Labsname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('LabsName', 'Labsname:') !!}
    {!! Form::text('LabsName', null, ['class' => 'form-control']) !!}
</div>

<!-- Labsaddress Field -->
<div class="form-group col-sm-12">
    {!! Form::label('LabsAddress', 'Labsaddress:') !!}
    {!! Form::text('LabsAddress', null, ['class' => 'form-control']) !!}
</div>

<!-- Labscity Field -->
<div class="form-group col-sm-12">
    {!! Form::label('LabsCity', 'Labscity:') !!}
    {!! Form::text('LabsCity', null, ['class' => 'form-control']) !!}
</div>

<!-- Labszip Field -->
<div class="form-group col-sm-12">
    {!! Form::label('LabsZip', 'Labszip:') !!}
    {!! Form::text('LabsZip', null, ['class' => 'form-control']) !!}
</div>

<!-- Labsphone Field -->
<div class="form-group col-sm-12">
    {!! Form::label('LabsPhone', 'Labsphone:') !!}
    {!! Form::text('LabsPhone', null, ['class' => 'form-control']) !!}
</div>

<!-- Labsemail Field -->
<div class="form-group col-sm-12">
    {!! Form::label('LabsEmail', 'Labsemail:') !!}
    {!! Form::email('LabsEmail', null, ['class' => 'form-control']) !!}
</div>

<!-- Labscountry Field -->
<div class="form-group col-sm-12">
    {!! Form::label('LabsCountry', 'Labscountry:') !!}
    {!! Form::text('LabsCountry', null, ['class' => 'form-control']) !!}
</div>

<!-- Labsformat Field -->
<div class="form-group col-sm-12">
    {!! Form::label('LabsFormat', 'Labsformat:') !!}
    {!! Form::text('LabsFormat', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.labs.index') !!}" class="btn btn-default">Cancel</a>
</div>
