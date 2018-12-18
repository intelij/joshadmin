<!-- Anaysisname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('anaysisName', 'Anaysisname:') !!}
    {!! Form::select('idAnalysis', $analysis, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.rSLS.analysis.index', $rslsID) !!}" class="btn btn-default">Cancel</a>
</div>