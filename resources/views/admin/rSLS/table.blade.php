<div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
<table class="table table-striped table-bordered" id="rSLS-table" width="100%">
    <thead>
     <tr>
        <th>Rslname</th>
        <th>Rsldescription</th>
        <th>Rslstart</th>
        <th>Rslend</th>
        <th>Analysis</th>
        <th>Requirements</th>
        <th >Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($rSLS as $rSL)
        <tr>
            <td>{!! $rSL->RSLName !!}</td>
            <td>{!! $rSL->RSLDescription !!}</td>
            <td>{!! $rSL->RSLStart !!}</td>
            <td>{!! $rSL->RSLEnd !!}</td>
            <td> 
                <a href="{{ route('admin.rSLS.analysis.index', collect($rSL)->first() ) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view analysis"></i>
                </a>
            </td>
            <td> 
                <a href="{{ route('admin.rSLS.requirements.index', collect($rSL)->first() ) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view requirements"></i>
                </a>
            </td>
            <td>
                 <a href="{{ route('admin.rSLS.show', collect($rSL)->first() ) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view rSL"></i>
                 </a>
                 <a href="{{ route('admin.rSLS.edit', collect($rSL)->first() ) }}">
                     <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit rSL"></i>
                 </a>
                 <a href="{{ route('admin.rSLS.confirm-delete', collect($rSL)->first() ) }}" data-toggle="modal" data-target="#delete_confirm" data-id="{{ route('admin.rSLS.delete', collect($rSL)->first() ) }}">
                     <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete rSL"></i>

                 </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@section('footer_scripts')

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                                <h4 class="modal-title" id="deleteLabel">Delete Item</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete this Item? This operation is irreversible.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <a  type="button" class="btn btn-danger Remove_square">Delete</a>
                            </div>
            </div>
        </div>
    </div>
    <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap4.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap4.css') }}"/>
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap4.css') }}">
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
 <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap4.js') }}" ></script>

    <script>
        $('#rSLS-table').DataTable({
                      responsive: true,
                      pageLength: 10
                  });
                  $('#rSLS-table').on( 'page.dt', function () {
                     setTimeout(function(){
                           $('.livicon').updateLivicon();
                     },500);
                  } );
                  $('#rSLS-table').on( 'length.dt', function ( e, settings, len ) {
                     setTimeout(function(){
                            $('.livicon').updateLivicon();
                     },500);
                  } );

                  $('#delete_confirm').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget)
                       var $recipient = button.data('id');
                      var modal = $(this);
                      modal.find('.modal-footer a').prop("href",$recipient);
                  })

       </script>

@stop