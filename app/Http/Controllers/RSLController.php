<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRSLRequest;
use App\Http\Requests\UpdateRSLRequest;
use App\Repositories\RSLRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\RSL;
use App\Models\Analysis;
use App\Models\Requirement;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RSLController extends InfyOmBaseController
{
    /** @var  RSLRepository */
    private $rSLRepository;

    public function __construct(RSLRepository $rSLRepo)
    {
        $this->rSLRepository = $rSLRepo;
    }

    /**
     * Display a listing of the RSL.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->rSLRepository->pushCriteria(new RequestCriteria($request));
        $rSLS = $this->rSLRepository->all();
        $rsl = RSL::find(1);
        // $analysis = $rsl->analysis()->attach(11);
        // dd($rsl->analysis);
        return view('admin.rSLS.index')
            ->with('rSLS', $rSLS);
    }

    public function test(Request $request)
    {
        $pk = $request -> pk;
        $name = $request -> name;
        $value = $request -> value;
        $requirement = Requirement::find($pk);
        $requirement->$name = $value;
        $requirement->save();
        // $rsl = RSL::find(1);
        // $rsl->RSLName = $request->value;
        // $rsl->save();
        return response()->json(['success'=>true]);

        // User::find($request->pk)->update([$request->name => $request->value]);

        // return response()->json(['success'=>'done']);
    }

    public function indexWithRequirements(Request $request, $rslsID)
    {
        $rsl = RSL::find($rslsID);
        $analysis = $rsl->analysis;
        $collects = array();
        foreach ($analysis as $element)
        {
            $analysisID = $element -> idAnalysis;
            $components = $element -> components;
            $component_requirement = array();
            foreach ($components as $component)
            {
                $componentID = $component -> idComponents;
                $requirement = Requirement::where('idRsl', $rslsID)
                    ->where('idAnalysis', $analysisID)
                    ->where('idComponents', $componentID)->first();
                if(is_null($requirement)) {
                    $requirement = new Requirement;
                    $requirement->idAnalysis = $analysisID;
                    $requirement->idRsl = $rslsID;
                    $requirement->idComponents = $componentID;
                    $requirement->save();
                } else {
                    $array = array('component'=>$component, 'requirement'=>$requirement);
                    array_push($component_requirement, $array);
                }

            }
            $array = array('component_reqs'=> $component_requirement, 'analysis'=>$element);
            array_push($collects, $array);
        }
        // dd($collects);
        // return view('admin.requirements.index')->with('collects', $collects);
        return view('admin.requirements.index')->with('collects', $collects);

    }

    public function indexWithAnalysis(Request $request, $rslsID)
    {

        $this->rSLRepository->pushCriteria(new RequestCriteria($request));
        $rSLS = $this->rSLRepository->all();
        $rsl = RSL::find($rslsID);
        $analysis = $rsl->analysis;
        // $analysis = $rsl->analysis()->attach(10);
        // dd($rsl->analysis);
        return view('admin.rsl_analysis.index')
            ->with('analyses', $analysis)->with('rslsID', $rslsID);
    }

    /**
     * Show the form for creating a new RSL.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.rSLS.create');
    }

    public function createWithAnalysis($rslsID)
    {
        $analysis = Analysis::pluck('anaysisName','idAnalysis');
        // $departments = Department::pluck('name','id');
        return view('admin.rsl_analysis.create')->with('rslsID', $rslsID)->with('analysis', $analysis);
    }
    /**
     * Store a newly created RSL in storage.
     *
     * @param CreateRSLRequest $request
     *
     * @return Response
     */
    public function store(CreateRSLRequest $request)
    {
        $input = $request->all();

        $rSL = $this->rSLRepository->create($input);

        Flash::success('RSL saved successfully.');

        return redirect(route('admin.rSLS.index'));
    }

    public function storeWithAnalysis(Request $request, $rslsID)
    {
        $idAnalysis = $request->idAnalysis;

        $rsl = RSL::find($rslsID);
        $rsl_analysis = $rsl->analysis->where('idAnalysis', $idAnalysis)->first();
        if ($rsl_analysis) {
             Flash::warning('Analysis already exist!');

            return redirect(route('admin.rSLS.analysis.index', $rslsID));
        }

        $analysis = $rsl->analysis()->attach($idAnalysis);

        Flash::success('Analysis added successfully.');

        return redirect(route('admin.rSLS.analysis.index', $rslsID));
    }

    /**
     * Display the specified RSL.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rSL = $this->rSLRepository->findWithoutFail($id);

        if (empty($rSL)) {
            Flash::error('RSL not found');

            return redirect(route('rSLS.index'));
        }

        return view('admin.rSLS.show')->with('rSL', $rSL);
    }

    /**
     * Show the form for editing the specified RSL.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rSL = $this->rSLRepository->findWithoutFail($id);

        if (empty($rSL)) {
            Flash::error('RSL not found');

            return redirect(route('rSLS.index'));
        }

        return view('admin.rSLS.edit')->with('rSL', $rSL);
    }

    /**
     * Update the specified RSL in storage.
     *
     * @param  int              $id
     * @param UpdateRSLRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRSLRequest $request)
    {
        $rSL = $this->rSLRepository->findWithoutFail($id);

        

        if (empty($rSL)) {
            Flash::error('RSL not found');

            return redirect(route('rSLS.index'));
        }

        $rSL = $this->rSLRepository->update($request->all(), $id);

        Flash::success('RSL updated successfully.');

        return redirect(route('admin.rSLS.index'));
    }

    /**
     * Remove the specified RSL from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.rSLS.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

      public function getModalDeleteWithAnalysis($rslsID=null, $analysisID = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.rSLS.analysis.delete',['rslsID'=>$rslsID, 'analysisID'=>$analysisID]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = RSL::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.rSLS.index'))->with('success', Lang::get('message.success.delete'));

       }

       public function getDeleteWithAnalysis($rslsID=null, $analysisID = null)
       {

            $rsl = RSL::find($rslsID);
            $analysis = $rsl->analysis()->detach($analysisID);

            Flash::success('Analysis removed successfully.');

            return redirect(route('admin.rSLS.analysis.index', $rslsID));

       }

}
