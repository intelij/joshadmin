<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateContactLabRequest;
use App\Http\Requests\UpdateContactLabRequest;
use App\Repositories\ContactLabRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\ContactLab;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ContactLabController extends InfyOmBaseController
{
    /** @var  ContactLabRepository */
    private $contactLabRepository;

    public function __construct(ContactLabRepository $contactLabRepo)
    {
        $this->contactLabRepository = $contactLabRepo;
    }

    /**
     * Display a listing of the ContactLab.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->contactLabRepository->pushCriteria(new RequestCriteria($request));
        $contactLabs = $this->contactLabRepository->all();
        return view('admin.contactLabs.index')
            ->with('contactLabs', $contactLabs);
    }

    /**
     * Show the form for creating a new ContactLab.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.contactLabs.create');
    }

    /**
     * Store a newly created ContactLab in storage.
     *
     * @param CreateContactLabRequest $request
     *
     * @return Response
     */
    public function store(CreateContactLabRequest $request)
    {
        $input = $request->all();

        $contactLab = $this->contactLabRepository->create($input);

        Flash::success('ContactLab saved successfully.');

        return redirect(route('admin.contactLabs.index'));
    }

    /**
     * Display the specified ContactLab.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactLab = $this->contactLabRepository->findWithoutFail($id);

        if (empty($contactLab)) {
            Flash::error('ContactLab not found');

            return redirect(route('contactLabs.index'));
        }

        return view('admin.contactLabs.show')->with('contactLab', $contactLab);
    }

    /**
     * Show the form for editing the specified ContactLab.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactLab = $this->contactLabRepository->findWithoutFail($id);

        if (empty($contactLab)) {
            Flash::error('ContactLab not found');

            return redirect(route('contactLabs.index'));
        }

        return view('admin.contactLabs.edit')->with('contactLab', $contactLab);
    }

    /**
     * Update the specified ContactLab in storage.
     *
     * @param  int              $id
     * @param UpdateContactLabRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactLabRequest $request)
    {
        $contactLab = $this->contactLabRepository->findWithoutFail($id);

        

        if (empty($contactLab)) {
            Flash::error('ContactLab not found');

            return redirect(route('contactLabs.index'));
        }

        $contactLab = $this->contactLabRepository->update($request->all(), $id);

        Flash::success('ContactLab updated successfully.');

        return redirect(route('admin.contactLabs.index'));
    }

    /**
     * Remove the specified ContactLab from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.contactLabs.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = ContactLab::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.contactLabs.index'))->with('success', Lang::get('message.success.delete'));

       }

}
