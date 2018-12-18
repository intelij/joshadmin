@extends('admin/layouts/default')

@section('title')
Result
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Result View</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Results</li>
        <li class="active">Result View</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
      <div class="col-sm-12">
       <div class="card panel-primary">
                <div class="card-heading clearfix">
                    <h4 class="card-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Result details
                    </h4>
                </div>
                    <div class="card-body">
                        @include('admin.results.show_fields')
                    </div>
                </div>

    <div class="form-group">
           <a href="{!! route('admin.results.index') !!}" class="btn btn-warning mt-2">Back</a>
    </div>
     </div>
  </div>
</section>
@stop
