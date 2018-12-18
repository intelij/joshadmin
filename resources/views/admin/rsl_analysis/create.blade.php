@extends('admin/layouts/default')

@section('title')
Analysis
@parent
@stop

<!-- Anaysisname Field -->
<!-- <div class="form-group col-sm-12">
    {!! Form::label('anaysisName', 'Anaysisname:') !!}
    {!! Form::select('idAnalysis', $analysis, null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->
<!-- <div class="form-group col-sm-12 text-center">
    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.rSLS.analysis.index', $rslsID) !!}" class="btn btn-default">Cancel</a>
</div> -->



@section('content')
@include('core-templates::common.errors')
<section class="content-header">
    <h1>Analysis</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Analyses</li>
        <li class="active">Create Analysis </li>
    </ol>
</section>
<section class="content paddingleft_right15">
<div class="row">
    <div class="col-sm-12">
     <div class="card panel-primary">
            <div class="card-heading">
                <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Add New  Analysis
                </h4></div>
            <br />
            <div class="card-body">

            {!! Form::open(array('url' => URL::to('rSLS/analysis/'.$rslsID), 'method' => 'post')) !!}
                @include('admin.rsl_analysis.fields')

            {!! Form::close() !!}
        </div>
      </div>
      </div>
 </div>
</section>
 @stop
@section('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("form").submit(function() {
                $('input[type=submit]').attr('disabled', 'disabled');
                return true;
            });
        });
    </script>
@stop
