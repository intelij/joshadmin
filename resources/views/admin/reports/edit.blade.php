@extends('admin/layouts/default')

@section('title')
Reports
@parent
@stop
@section('content')
  @include('core-templates::common.errors')
    <section class="content-header">
     <h1>Reports Edit</h1>
     <ol class="breadcrumb">
         <li>
             <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                 Dashboard
             </a>
         </li>
         <li>Reports</li>
         <li class="active">Edit Report </li>
     </ol>
    </section>
    <section class="content paddingleft_right15">
      <div class="row">
             <div class="col-sm-12">
              <div class="card panel-primary">
                    <div class="card-heading">
                        <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Edit  Report
                        </h4></div>
                    <br />
                <div class="card-body">
                {!! Form::model($report, ['route' => ['admin.reports.update', collect($report)->first() ], 'method' => 'patch']) !!}

                @include('admin.reports.fields')

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