<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePartRequest;
use App\Http\Requests\UpdatePartRequest;
use App\Repositories\PartRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Part;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PartController extends InfyOmBaseController
{
    /** @var  PartRepository */
    private $partRepository;

    public function __construct(PartRepository $partRepo)
    {
        $this->partRepository = $partRepo;
    }

    /**
     * Display a listing of the Part.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, $reportsID)
    {

        $parts = Part::where('idReports', $reportsID)->get();
        return view('admin.parts.index')
            ->with('parts', $parts)->with('reportsID', $reportsID);
    }

    /**
     * Show the form for creating a new Part.
     *
     * @return Response
     */
    public function create($reportsID)
    {
        return view('admin.parts.create')->with('reportsID', $reportsID);
    }

    /**
     * Store a newly created Part in storage.
     *
     * @param CreatePartRequest $request
     *
     * @return Response
     */
    public function store(CreatePartRequest $request)
    {
        $input = $request->all();
        $reportsID = $request->idReports;

        $part = $this->partRepository->create($input);

        Flash::success('Part saved successfully.');

        return redirect(route('admin.reports.parts.index', $reportsID));
    }

    /**
     * Display the specified Part.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($reportsID, $id)
    {
        $part = $this->partRepository->findWithoutFail($id);

        if (empty($part)) {
            Flash::error('Part not found');

            return redirect(route('reports.parts.index', $reportsID));
        }

        return view('admin.parts.show')->with('part', $part)->with('reportsID', $reportsID);
    }

    /**
     * Show the form for editing the specified Part.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($reportsID, $id)
    {
        $part = $this->partRepository->findWithoutFail($id);

        if (empty($part)) {
            Flash::error('Part not found');

            return redirect(route('reports.parts.index', $reportsID));
        }

        return view('admin.parts.edit')->with('part', $part)->with('reportsID', $reportsID);
    }

    /**
     * Update the specified Part in storage.
     *
     * @param  int              $id
     * @param UpdatePartRequest $request
     *
     * @return Response
     */
    public function update($reportsID, $id, UpdatePartRequest $request)
    {
        $part = $this->partRepository->findWithoutFail($id);

        

        if (empty($part)) {
            Flash::error('Part not found');

        return redirect(route('admin.reports.parts.index', $reportsID));
        }

        $part = $this->partRepository->update($request->all(), $id);

        Flash::success('Part updated successfully.');

        return redirect(route('admin.reports.parts.index', $reportsID));
    }

    /**
     * Remove the specified Part from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($reportsID=null, $id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.parts.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($reportsID=null, $id = null)
       {
           $sample = Part::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.reports.parts.index', $reportsID))->with('success', Lang::get('message.success.delete'));

       }

}
