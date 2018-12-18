<!-- Rslname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('RSLName', 'Rslname:') !!}
    {!! Form::text('RSLName', null, ['class' => 'form-control']) !!}
</div>

<!-- Rsldescription Field -->
<div class="form-group col-sm-12">
    {!! Form::label('RSLDescription', 'Rsldescription:') !!}
    {!! Form::text('RSLDescription', null, ['class' => 'form-control']) !!}
</div>

<!-- Rslstart Field -->
<div class="form-group col-sm-12">
    {!! Form::label('RSLStart', 'Rslstart:') !!}
    {!! Form::date('RSLStart', null, ['class' => 'form-control']) !!}
</div>

<!-- Rslend Field -->
<div class="form-group col-sm-12">
    {!! Form::label('RSLEnd', 'Rslend:') !!}
    {!! Form::date('RSLEnd', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.rSLS.index') !!}" class="btn btn-default">Cancel</a>
</div>
