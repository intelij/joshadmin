@extends('admin/layouts/default')

@section('title')
Components
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Components</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Components</li>
        <li class="active">Components List</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
     <div class="col-12">
     @include('flash::message')
        <div class="card panel-primary ">
            <div class="card-heading clearfix">
                <h4 class="card-title float-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Components List
                </h4>
                <div class="float-right">
                    <a href="{{ route('admin.components.create', $idAnalysis) }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                </div>
            </div>
            <br />
            <div class="card-body table-responsive">
                 @include('admin.components.table')
                 
            </div>
        </div>
        </div>
 </div>
</section>
@stop
