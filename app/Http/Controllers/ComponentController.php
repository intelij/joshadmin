<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateComponentRequest;
use App\Http\Requests\UpdateComponentRequest;
use App\Repositories\ComponentRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Component;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

class ComponentController extends InfyOmBaseController
{
    /** @var  ComponentRepository */
    private $componentRepository;

    public function __construct(ComponentRepository $componentRepo)
    {
        $this->componentRepository = $componentRepo;
    }

    /**
     * Display a listing of the Component.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, $idAnalysis)
    {
        $this->componentRepository->pushCriteria(new RequestCriteria($request));
        // $components = $this->componentRepository->all();
        $components = Component::where('idAnalysis', $idAnalysis)->get();
        return view('admin.components.index')
            ->with('components', $components)->with('idAnalysis', $idAnalysis);

    }

    /**
     * Show the form for creating a new Component.
     *
     * @return Response
     */
    public function create($idAnalysis)
    {
        return view('admin.components.create')->with('idAnalysis', $idAnalysis);
    }

    /**
     * Store a newly created Component in storage.
     *
     * @param CreateComponentRequest $request
     *
     * @return Response
     */
    public function store(CreateComponentRequest $request)
    {
        $input = $request->all();
        $idAnalysis = $input['idAnalysis'];
        $component = $this->componentRepository->create($input);

        Flash::success('Component saved successfully.');

        return redirect(route('admin.components.index', $idAnalysis));

    }

    /**
     * Display the specified Component.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $component = $this->componentRepository->findWithoutFail($id);
        $idAnalysis = $component->idAnalysis;


        if (empty($component)) {
            Flash::error('Component not found');

            return redirect(route('components.index'));
        }

        return view('admin.components.show')->with('component', $component)->with('idAnalysis',$idAnalysis);

    }

    /**
     * Show the form for editing the specified Component.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $component = $this->componentRepository->findWithoutFail($id);
        $idAnalysis = $component->idAnalysis;
        if (empty($component)) {
            Flash::error('Component not found');

            return redirect(route('components.index'));
        }

        return view('admin.components.edit')->with('component', $component)->with('idAnalysis',$idAnalysis);

    }

    /**
     * Update the specified Component in storage.
     *
     * @param  int              $id
     * @param UpdateComponentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComponentRequest $request)
    {
        $component = $this->componentRepository->findWithoutFail($id);
        $idAnalysis = $component->idAnalysis;

        if (empty($component)) {
            Flash::error('Component not found');

            return redirect(route('components.index'));
        }

        $component = $this->componentRepository->update($request->all(), $id);

        Flash::success('Component updated successfully.');
        return redirect(route('admin.components.index', $idAnalysis));

    }

    /**
     * Remove the specified Component from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.components.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $component = $this->componentRepository->findWithoutFail($id);
           $idAnalysis = $component->idAnalysis;
           $sample = Component::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.components.index', $idAnalysis))->with('success', Lang::get('message.success.delete'));

       }

       public function test()
       {
            $orders = DB::select("SHOW COLUMNS FROM testAdd");
            dd($orders);
       }

}
