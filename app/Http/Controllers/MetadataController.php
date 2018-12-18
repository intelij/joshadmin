<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMetadataRequest;
use App\Http\Requests\UpdateMetadataRequest;
use App\Repositories\MetadataRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Metadata;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MetadataController extends InfyOmBaseController
{
    /** @var  MetadataRepository */
    private $metadataRepository;

    public function __construct(MetadataRepository $metadataRepo)
    {
        $this->metadataRepository = $metadataRepo;
    }

    /**
     * Display a listing of the Metadata.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->metadataRepository->pushCriteria(new RequestCriteria($request));
        $metadata = $this->metadataRepository->all();
        return view('admin.metadata.index')
            ->with('metadata', $metadata);
    }

    /**
     * Show the form for creating a new Metadata.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.metadata.create');
    }

    /**
     * Store a newly created Metadata in storage.
     *
     * @param CreateMetadataRequest $request
     *
     * @return Response
     */
    public function store(CreateMetadataRequest $request)
    {
        $input = $request->all();

        $metadata = $this->metadataRepository->create($input);

        Flash::success('Metadata saved successfully.');

        return redirect(route('admin.metadata.index'));
    }

    /**
     * Display the specified Metadata.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $metadata = $this->metadataRepository->findWithoutFail($id);

        if (empty($metadata)) {
            Flash::error('Metadata not found');

            return redirect(route('metadata.index'));
        }

        return view('admin.metadata.show')->with('metadata', $metadata);
    }

    /**
     * Show the form for editing the specified Metadata.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $metadata = $this->metadataRepository->findWithoutFail($id);

        if (empty($metadata)) {
            Flash::error('Metadata not found');

            return redirect(route('metadata.index'));
        }

        return view('admin.metadata.edit')->with('metadata', $metadata);
    }

    /**
     * Update the specified Metadata in storage.
     *
     * @param  int              $id
     * @param UpdateMetadataRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMetadataRequest $request)
    {
        $metadata = $this->metadataRepository->findWithoutFail($id);

        

        if (empty($metadata)) {
            Flash::error('Metadata not found');

            return redirect(route('metadata.index'));
        }

        $metadata = $this->metadataRepository->update($request->all(), $id);

        Flash::success('Metadata updated successfully.');

        return redirect(route('admin.metadata.index'));
    }

    /**
     * Remove the specified Metadata from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.metadata.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Metadata::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.metadata.index'))->with('success', Lang::get('message.success.delete'));

       }

}
