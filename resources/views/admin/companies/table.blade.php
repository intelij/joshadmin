<div class="card-body table-responsive-lg table-responsive-sm table-responsive-md">
<table class="table table-striped table-bordered" id="companies-table" width="100%">
    <thead>
     <tr>
        <th>Companyname</th>
        <th>Companyaddress</th>
        <th>Companycity</th>
        <th>Companyphone</th>
        <th>Companyemail</th>
        <th>Companyvat</th>
        <th>Companygrade</th>
        <th>Companylink</th>
        <th>Companyzip</th>
        <th>Contact</th>
        <th>Department</th>
        <th >Action</th>
     </tr>
    </thead>
    <tbody>
        <tr>
            <td>{!! $company->companyName !!}</td>
            <td>{!! $company->companyAddress !!}</td>
            <td>{!! $company->CompanyCity !!}</td>
            <td>{!! $company->companyPhone !!}</td>
            <td>{!! $company->companyEmail !!}</td>
            <td>{!! $company->companyVat !!}</td>
            <td>{!! $company->companyGrade !!}</td>
            <td>{!! $company->companyLink !!}</td>
            <td>{!! $company->CompanyZip !!}</td>
            <td><a  href="{{ route('admin.contactCompanies.index', collect($company)->first() )  }}" type="button" class="btn btn-primary Remove_square">Contact</a></td>
            <td><a  href="{{ route('admin.departmentCompanies.index', collect($company)->first() ) }}" type="button" class="btn btn-primary Remove_square">Department</a></td>
            <td>
                 <a href="{{ route('admin.companies.show', collect($company)->first() ) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view company"></i>
                 </a>
                 <a href="{{ route('admin.companies.edit', collect($company)->first() ) }}">
                     <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit company"></i>
                 </a>
                 <a href="{{ route('admin.companies.confirm-delete', collect($company)->first() ) }}" data-toggle="modal" data-target="#delete_confirm" data-id="{{ route('admin.companies.delete', collect($company)->first() ) }}">
                     <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete company"></i>

                 </a>
            </td>
        </tr>
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
        $('#companies-table').DataTable({
                      responsive: true,
                      pageLength: 10
                  });
                  $('#companies-table').on( 'page.dt', function () {
                     setTimeout(function(){
                           $('.livicon').updateLivicon();
                     },500);
                  } );
                  $('#companies-table').on( 'length.dt', function ( e, settings, len ) {
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