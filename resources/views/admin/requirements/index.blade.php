@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Advanced Data Tables
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--     <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/colReorder.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/rowReorder.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/scroller.bootstrap4.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.6/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #table1_filter{
            margin-bottom: 10px;
        }

    </style>
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">

                <!--section starts-->
                <h1>RSL requirements</h1>
                <div id="_token" class="hidden" data-token="{{ csrf_token() }}"></div>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">RSLs</a>
                    </li>
                    <li class="active">Requirements</li>
                </ol>
            </section>
            <!--section ends-->
            <section class="content">
                

                <div class="row">
                    <div class="col-lg-12 my-3">
                        <div class="card panel-primary filterable table-tools">
                            <div class="card-heading clearfix  ">
                                <div class="card-title pull-left">
                                    <div class="caption">
                                        <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> RSL requirements
                                    </div>
                                </div>
                                <div class="tools pull-right"></div>
                            </div>
                            <div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">

                                <table class="table table-striped table-bordered" id="inline_edit" width="100%">
                                    <thead>
                                    <tr>
                                        <th>AnalysisName</th>
                                        <th>Component</th>
                                        <th>UM</th>
                                        <th>LQ</th>
                                        <th>Limit</th>
                                        <th>Score</th>
                                    </tr>
                                    </thead>
                                    <tbody id="requirements-tbody">
                                        @foreach($collects as $collect)
                                        <tr>
                                           <td class="title">{!! $collect['analysis']->anaysisName!!}</td>
                                        </tr>
                                            @foreach($collect['component_reqs'] as $component_req)

                                                <tr>
                                                    <td class="text-hide title"></td>
                                                    <td class="title">{!! $component_req['component']->ComponentsName!!}</td>
                                                    <td class="title">{!! $component_req['component']->ComponentsName!!}</td>
                                                    <td><a href="" class="update" data-name="LOQ" data-type="text" data-pk="{!! $component_req['requirement']->idRequirements!!}" data-title="Enter name">{!! $component_req['requirement']->LOQ!!}</a></td>
                                                    <td><a href="" class="update" data-name="limit" data-type="text" data-pk="{!! $component_req['requirement']->idRequirements!!}" data-title="Enter name">{!! $component_req['requirement']->limit!!}</a></td>
                                                    <td><a href="" class="update" data-name="score_value" data-type="text" data-pk="{!! $component_req['requirement']->idRequirements!!}" data-title="Enter name">{!! $component_req['requirement']->score_value!!}</a></td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- content -->

    @stop

{{-- page level scripts --}}
@section('footer_scripts')

<!--     <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/jeditable/js/jquery.jeditable.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap4.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.buttons.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.colReorder.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.rowReorder.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.colVis.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.html5.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.print.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.bootstrap4.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/pdfmake.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/vfs_fonts.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.scroller.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/table-advanced.js') }}" ></script> -->
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> 

    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.6/bootstrap-editable/js/bootstrap-editable.min.js"></script>

<!--     <script type="text/javascript">
        $('.title').on( 'click', function (e) {
            editor.inline( this, {
                submitOnBlur: false
            } );
        } );
        $('.text-hide').html("");
        $('.column-hide').html("");
        $('#inline_edit').dataTable( 
        {
        "bSort" : false
        } );
    </script> -->

<script type="text/javascript">



    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });



    $('.update').editable({

           url: '/rSLS/xxx',

           type: 'text',

           pk: 1,

           name: 'name',

           title: 'Enter name'

    });



</script>
@stop
