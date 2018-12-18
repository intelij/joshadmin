<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAnalysisRequest;
use App\Http\Requests\UpdateAnalysisRequest;
use App\Repositories\AnalysisRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Analysis;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnalysisController extends InfyOmBaseController
{
    /** @var  AnalysisRepository */
    private $analysisRepository;

    public function __construct(AnalysisRepository $analysisRepo)
    {
        $this->analysisRepository = $analysisRepo;
    }

    /**
     * Display a listing of the Analysis.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->analysisRepository->pushCriteria(new RequestCriteria($request));
        $analyses = $this->analysisRepository->all();
        return view('admin.analyses.index')
            ->with('analyses', $analyses);
    }

    /**
     * Show the form for creating a new Analysis.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.analyses.create');
    }

    /**
     * Store a newly created Analysis in storage.
     *
     * @param CreateAnalysisRequest $request
     *
     * @return Response
     */
    public function store(CreateAnalysisRequest $request)
    {
        $input = $request->all();

        $analysis = $this->analysisRepository->create($input);

        Flash::success('Analysis saved successfully.');

        return redirect(route('admin.analyses.index'));
    }

    /**
     * Display the specified Analysis.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $analysis = $this->analysisRepository->findWithoutFail($id);

        if (empty($analysis)) {
            Flash::error('Analysis not found');

            return redirect(route('analyses.index'));
        }

        return view('admin.analyses.show')->with('analysis', $analysis);
    }

    public function showWithRSLs($id)
    {
        $analysis = $this->analysisRepository->findWithoutFail($id);

        if (empty($analysis)) {
            Flash::error('Analysis not found');

            return redirect(route('analyses.index'));
        }

        return view('admin.rsl_analysis.show')->with('analysis', $analysis);
    }

    /**
     * Show the form for editing the specified Analysis.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $analysis = $this->analysisRepository->findWithoutFail($id);

        if (empty($analysis)) {
            Flash::error('Analysis not found');

            return redirect(route('analyses.index'));
        }

        return view('admin.analyses.edit')->with('analysis', $analysis);
    }

    /**
     * Update the specified Analysis in storage.
     *
     * @param  int              $id
     * @param UpdateAnalysisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnalysisRequest $request)
    {
        $analysis = $this->analysisRepository->findWithoutFail($id);

        

        if (empty($analysis)) {
            Flash::error('Analysis not found');

            return redirect(route('analyses.index'));
        }

        $analysis = $this->analysisRepository->update($request->all(), $id);

        Flash::success('Analysis updated successfully.');

        return redirect(route('admin.analyses.index'));
    }

    /**
     * Remove the specified Analysis from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.analyses.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           // $analysis = Analysis::find($id);
           // $analysis->components->delete();
           $sample = Analysis::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.analyses.index'))->with('success', Lang::get('message.success.delete'));

       }

}
