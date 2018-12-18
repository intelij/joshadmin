<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateLabRequest;
use App\Http\Requests\UpdateLabRequest;
use App\Repositories\LabRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Lab;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LabController extends InfyOmBaseController
{
    /** @var  LabRepository */
    private $labRepository;

    public function __construct(LabRepository $labRepo)
    {
        $this->labRepository = $labRepo;
    }

    /**
     * Display a listing of the Lab.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->labRepository->pushCriteria(new RequestCriteria($request));
        $labs = $this->labRepository->all();
        return view('admin.labs.index')
            ->with('labs', $labs);
    }

    /**
     * Show the form for creating a new Lab.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.labs.create');
    }

    /**
     * Store a newly created Lab in storage.
     *
     * @param CreateLabRequest $request
     *
     * @return Response
     */
    public function store(CreateLabRequest $request)
    {
        $input = $request->all();

        $lab = $this->labRepository->create($input);

        Flash::success('Lab saved successfully.');

        return redirect(route('admin.labs.index'));
    }

    /**
     * Display the specified Lab.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lab = $this->labRepository->findWithoutFail($id);

        if (empty($lab)) {
            Flash::error('Lab not found');

            return redirect(route('labs.index'));
        }

        return view('admin.labs.show')->with('lab', $lab);
    }

    /**
     * Show the form for editing the specified Lab.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lab = $this->labRepository->findWithoutFail($id);

        if (empty($lab)) {
            Flash::error('Lab not found');

            return redirect(route('labs.index'));
        }

        return view('admin.labs.edit')->with('lab', $lab);
    }

    /**
     * Update the specified Lab in storage.
     *
     * @param  int              $id
     * @param UpdateLabRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLabRequest $request)
    {
        $lab = $this->labRepository->findWithoutFail($id);

        

        if (empty($lab)) {
            Flash::error('Lab not found');

            return redirect(route('labs.index'));
        }

        $lab = $this->labRepository->update($request->all(), $id);

        Flash::success('Lab updated successfully.');

        return redirect(route('admin.labs.index'));
    }

    /**
     * Remove the specified Lab from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.labs.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Lab::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.labs.index'))->with('success', Lang::get('message.success.delete'));

       }

}
