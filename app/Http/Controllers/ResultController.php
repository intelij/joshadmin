<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Repositories\ResultRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Result;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ResultController extends InfyOmBaseController
{
    /** @var  ResultRepository */
    private $resultRepository;

    public function __construct(ResultRepository $resultRepo)
    {
        $this->resultRepository = $resultRepo;
    }

    /**
     * Display a listing of the Result.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->resultRepository->pushCriteria(new RequestCriteria($request));
        $results = $this->resultRepository->all();
        return view('admin.results.index')
            ->with('results', $results);
    }

    /**
     * Show the form for creating a new Result.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.results.create');
    }

    /**
     * Store a newly created Result in storage.
     *
     * @param CreateResultRequest $request
     *
     * @return Response
     */
    public function store(CreateResultRequest $request)
    {
        $input = $request->all();

        $result = $this->resultRepository->create($input);

        Flash::success('Result saved successfully.');

        return redirect(route('admin.results.index'));
    }

    /**
     * Display the specified Result.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $result = $this->resultRepository->findWithoutFail($id);

        if (empty($result)) {
            Flash::error('Result not found');

            return redirect(route('results.index'));
        }

        return view('admin.results.show')->with('result', $result);
    }

    /**
     * Show the form for editing the specified Result.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $result = $this->resultRepository->findWithoutFail($id);

        if (empty($result)) {
            Flash::error('Result not found');

            return redirect(route('results.index'));
        }

        return view('admin.results.edit')->with('result', $result);
    }

    /**
     * Update the specified Result in storage.
     *
     * @param  int              $id
     * @param UpdateResultRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResultRequest $request)
    {
        $result = $this->resultRepository->findWithoutFail($id);

        

        if (empty($result)) {
            Flash::error('Result not found');

            return redirect(route('results.index'));
        }

        $result = $this->resultRepository->update($request->all(), $id);

        Flash::success('Result updated successfully.');

        return redirect(route('admin.results.index'));
    }

    /**
     * Remove the specified Result from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.results.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Result::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.results.index'))->with('success', Lang::get('message.success.delete'));

       }

}
