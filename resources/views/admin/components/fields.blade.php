<!-- Componentsname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('ComponentsName', 'Componentsname:') !!}
    {!! Form::text('ComponentsName', null, ['class' => 'form-control']) !!}
</div>

<!-- Componentsdescription Field -->
<div class="form-group col-sm-12">
    {!! Form::label('ComponentsDescription', 'Componentsdescription:') !!}
    {!! Form::text('ComponentsDescription', null, ['class' => 'form-control']) !!}
</div>

<!-- Componentscas Field -->
<div class="form-group col-sm-12">
    {!! Form::label('ComponentsCAS', 'Componentscas:') !!}
    {!! Form::text('ComponentsCAS', null, ['class' => 'form-control']) !!}
</div>

<!-- Componentsfomular Field -->
<div class="form-group col-sm-12">
    {!! Form::label('ComponentsFomular', 'Componentsfomular:') !!}
    {!! Form::text('ComponentsFomular', null, ['class' => 'form-control']) !!}
</div>

<!-- CompanyId Field -->
<div class="form-group col-sm-12 hidden">
    {!! Form::label('AnalysisID', 'AnaysisID:') !!}
    {!! Form::text('idAnalysis', $idAnalysis, ['class' => 'form-control hidden']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.components.index', $idAnalysis) !!}" class="btn btn-default">Cancel</a>
</div>
