<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateContactCompanyRequest;
use App\Http\Requests\UpdateContactCompanyRequest;
use App\Repositories\ContactCompanyRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\ContactCompany;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ContactCompanyController extends InfyOmBaseController
{
    /** @var  ContactCompanyRepository */
    private $contactCompanyRepository;

    public function __construct(ContactCompanyRepository $contactCompanyRepo)
    {
        $this->contactCompanyRepository = $contactCompanyRepo;
    }

    /**
     * Display a listing of the ContactCompany.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, $idCompany)
    {

        $this->contactCompanyRepository->pushCriteria(new RequestCriteria($request));
        $contactCompanies = $this->contactCompanyRepository->all();
        if(is_null($contactCompanies)) {
            $contactCompany = null;
        }
        else {
            $contactCompany = ContactCompany::where('idCompany', $idCompany)->first();
        }
        // dd($contactCompany);
        return view('admin.contactCompanies.index')
            ->with('contactCompany', $contactCompany)->with('idCompany', $idCompany);
    }

    /**
     * Show the form for creating a new ContactCompany.
     *
     * @return Response
     */
    public function create($idCompany)
    {
        // return view('admin.contactCompanies.create');
        return view('admin.contactCompanies.create')->with('idCompany', $idCompany);

    }

    /**
     * Store a newly created ContactCompany in storage.
     *
     * @param CreateContactCompanyRequest $request
     *
     * @return Response
     */
    public function store(CreateContactCompanyRequest $request)
    {
        $input = $request->all();
        $idCompany = $input['idCompany'];

        $contactCompany = $this->contactCompanyRepository->create($input);
       
        Flash::success('ContactCompany saved successfully.');

        return redirect(route('admin.contactCompanies.index', $idCompany));
    }

    /**
     * Display the specified ContactCompany.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactCompany = $this->contactCompanyRepository->findWithoutFail($id);
        $idCompany = $contactCompany->idCompany;

        if (empty($contactCompany)) {
            Flash::error('ContactCompany not found');

            return redirect(route('contactCompanies.index'));
        }

        // return view('admin.contactCompanies.show')->with('contactCompany', $contactCompany);
        return view('admin.contactCompanies.show')->with('contactCompany', $contactCompany)->with('idCompany',$idCompany);

    }

    /**
     * Show the form for editing the specified ContactCompany.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactCompany = $this->contactCompanyRepository->findWithoutFail($id);
        $idCompany = $contactCompany->idCompany;
        if (empty($contactCompany)) {
            Flash::error('ContactCompany not found');

            return redirect(route('contactCompanies.index'));
        }

        return view('admin.contactCompanies.edit')->with('contactCompany', $contactCompany)->with('idCompany',$idCompany);
    }

    /**
     * Update the specified ContactCompany in storage.
     *
     * @param  int              $id
     * @param UpdateContactCompanyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactCompanyRequest $request)
    {
        $contactCompany = $this->contactCompanyRepository->findWithoutFail($id);
        $idCompany = $contactCompany->idCompany;

        if (empty($contactCompany)) {
            Flash::error('ContactCompany not found');

            return redirect(route('contactCompanies.index'));
        }

        $contactCompany = $this->contactCompanyRepository->update($request->all(), $id);

        Flash::success('ContactCompany updated successfully.');

        return redirect(route('admin.contactCompanies.index', $idCompany));
    }

    /**
     * Remove the specified ContactCompany from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.contactCompanies.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $contactCompany = $this->contactCompanyRepository->findWithoutFail($id);
           $idCompany = $contactCompany->idCompany;
           $sample = ContactCompany::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.contactCompanies.index', $idCompany))->with('success', Lang::get('message.success.delete'));

       }

}
