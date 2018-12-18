<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDepartmentCompanyRequest;
use App\Http\Requests\UpdateDepartmentCompanyRequest;
use App\Repositories\DepartmentCompanyRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\DepartmentCompany;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DepartmentCompanyController extends InfyOmBaseController
{
    /** @var  DepartmentCompanyRepository */
    private $departmentCompanyRepository;

    public function __construct(DepartmentCompanyRepository $departmentCompanyRepo)
    {
        $this->departmentCompanyRepository = $departmentCompanyRepo;
    }

    /**
     * Display a listing of the DepartmentCompany.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, $idCompany)
    {

        $this->departmentCompanyRepository->pushCriteria(new RequestCriteria($request));
        $departmentCompanies = $this->departmentCompanyRepository->all();
        $departmentCompany = DepartmentCompany::where('idCompany', $idCompany)->first();

        return view('admin.departmentCompanies.index')
            ->with('departmentCompany', $departmentCompany)->with('idCompany', $idCompany);

    }

    /**
     * Show the form for creating a new DepartmentCompany.
     *
     * @return Response
     */
    public function create($idCompany)
    {
        return view('admin.departmentCompanies.create')->with('idCompany', $idCompany);
    }

    /**
     * Store a newly created DepartmentCompany in storage.
     *
     * @param CreateDepartmentCompanyRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartmentCompanyRequest $request)
    {
        $input = $request->all();
        $idCompany = $input['idCompany'];

        $departmentCompany = $this->departmentCompanyRepository->create($input);

        Flash::success('DepartmentCompany saved successfully.');

        return redirect(route('admin.departmentCompanies.index', $idCompany));

    }

    /**
     * Display the specified DepartmentCompany.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $departmentCompany = $this->departmentCompanyRepository->findWithoutFail($id);
        $idCompany = $departmentCompany->idCompany;
        
        if (empty($departmentCompany)) {
            Flash::error('DepartmentCompany not found');

            return redirect(route('departmentCompanies.index'));
        }

        return view('admin.departmentCompanies.show')->with('departmentCompany', $departmentCompany)->with('idCompany',$idCompany);

    }

    /**
     * Show the form for editing the specified DepartmentCompany.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $departmentCompany = $this->departmentCompanyRepository->findWithoutFail($id);
        $idCompany = $departmentCompany->idCompany;

        if (empty($departmentCompany)) {
            Flash::error('DepartmentCompany not found');

            return redirect(route('departmentCompanies.index'));
        }

        return view('admin.departmentCompanies.edit')->with('departmentCompany', $departmentCompany)->with('idCompany',$idCompany);
    }

    /**
     * Update the specified DepartmentCompany in storage.
     *
     * @param  int              $id
     * @param UpdateDepartmentCompanyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartmentCompanyRequest $request)
    {
        $departmentCompany = $this->departmentCompanyRepository->findWithoutFail($id);
        $idCompany = $departmentCompany->idCompany;

        

        if (empty($departmentCompany)) {
            Flash::error('DepartmentCompany not found');

            return redirect(route('departmentCompanies.index'));
        }

        $departmentCompany = $this->departmentCompanyRepository->update($request->all(), $id);

        Flash::success('DepartmentCompany updated successfully.');

        return redirect(route('admin.departmentCompanies.index', $idCompany));

    }

    /**
     * Remove the specified DepartmentCompany from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.departmentCompanies.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $departmentCompany = $this->departmentCompanyRepository->findWithoutFail($id);
           $idCompany = $departmentCompany->idCompany;
           $sample = DepartmentCompany::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.departmentCompanies.index', $idCompany))->with('success', Lang::get('message.success.delete'));
       }

}
