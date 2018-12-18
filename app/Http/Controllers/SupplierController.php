<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Repositories\SupplierRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Supplier;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SupplierController extends InfyOmBaseController
{
    /** @var  SupplierRepository */
    private $supplierRepository;

    public function __construct(SupplierRepository $supplierRepo)
    {
        $this->supplierRepository = $supplierRepo;
    }

    /**
     * Display a listing of the Supplier.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->supplierRepository->pushCriteria(new RequestCriteria($request));
        $suppliers = $this->supplierRepository->all();
        return view('admin.suppliers.index')
            ->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new Supplier.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created Supplier in storage.
     *
     * @param CreateSupplierRequest $request
     *
     * @return Response
     */
    public function store(CreateSupplierRequest $request)
    {
        $input = $request->all();

        $supplier = $this->supplierRepository->create($input);

        Flash::success('Supplier saved successfully.');

        return redirect(route('admin.suppliers.index'));
    }

    /**
     * Display the specified Supplier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $supplier = $this->supplierRepository->findWithoutFail($id);

        if (empty($supplier)) {
            Flash::error('Supplier not found');

            return redirect(route('suppliers.index'));
        }

        return view('admin.suppliers.show')->with('supplier', $supplier);
    }

    /**
     * Show the form for editing the specified Supplier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $supplier = $this->supplierRepository->findWithoutFail($id);

        if (empty($supplier)) {
            Flash::error('Supplier not found');

            return redirect(route('suppliers.index'));
        }

        return view('admin.suppliers.edit')->with('supplier', $supplier);
    }

    /**
     * Update the specified Supplier in storage.
     *
     * @param  int              $id
     * @param UpdateSupplierRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSupplierRequest $request)
    {
        $supplier = $this->supplierRepository->findWithoutFail($id);

        

        if (empty($supplier)) {
            Flash::error('Supplier not found');

            return redirect(route('suppliers.index'));
        }

        $supplier = $this->supplierRepository->update($request->all(), $id);

        Flash::success('Supplier updated successfully.');

        return redirect(route('admin.suppliers.index'));
    }

    /**
     * Remove the specified Supplier from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.suppliers.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Supplier::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.suppliers.index'))->with('success', Lang::get('message.success.delete'));

       }

}
