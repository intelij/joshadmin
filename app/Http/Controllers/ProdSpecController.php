<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProdSpecRequest;
use App\Http\Requests\UpdateProdSpecRequest;
use App\Repositories\ProdSpecRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\ProdSpec;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProdSpecController extends InfyOmBaseController
{
    /** @var  ProdSpecRepository */
    private $prodSpecRepository;

    public function __construct(ProdSpecRepository $prodSpecRepo)
    {
        $this->prodSpecRepository = $prodSpecRepo;
    }

    /**
     * Display a listing of the ProdSpec.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->prodSpecRepository->pushCriteria(new RequestCriteria($request));
        $prodSpecs = $this->prodSpecRepository->all();
        return view('admin.prodSpecs.index')
            ->with('prodSpecs', $prodSpecs);
    }

    /**
     * Show the form for creating a new ProdSpec.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.prodSpecs.create');
    }

    /**
     * Store a newly created ProdSpec in storage.
     *
     * @param CreateProdSpecRequest $request
     *
     * @return Response
     */
    public function store(CreateProdSpecRequest $request)
    {
        $input = $request->all();

        $prodSpec = $this->prodSpecRepository->create($input);

        Flash::success('ProdSpec saved successfully.');

        return redirect(route('admin.prodSpecs.index'));
    }

    /**
     * Display the specified ProdSpec.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prodSpec = $this->prodSpecRepository->findWithoutFail($id);

        if (empty($prodSpec)) {
            Flash::error('ProdSpec not found');

            return redirect(route('prodSpecs.index'));
        }

        return view('admin.prodSpecs.show')->with('prodSpec', $prodSpec);
    }

    /**
     * Show the form for editing the specified ProdSpec.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prodSpec = $this->prodSpecRepository->findWithoutFail($id);

        if (empty($prodSpec)) {
            Flash::error('ProdSpec not found');

            return redirect(route('prodSpecs.index'));
        }

        return view('admin.prodSpecs.edit')->with('prodSpec', $prodSpec);
    }

    /**
     * Update the specified ProdSpec in storage.
     *
     * @param  int              $id
     * @param UpdateProdSpecRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProdSpecRequest $request)
    {
        $prodSpec = $this->prodSpecRepository->findWithoutFail($id);

        

        if (empty($prodSpec)) {
            Flash::error('ProdSpec not found');

            return redirect(route('prodSpecs.index'));
        }

        $prodSpec = $this->prodSpecRepository->update($request->all(), $id);

        Flash::success('ProdSpec updated successfully.');

        return redirect(route('admin.prodSpecs.index'));
    }

    /**
     * Remove the specified ProdSpec from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.prodSpecs.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = ProdSpec::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.prodSpecs.index'))->with('success', Lang::get('message.success.delete'));

       }

}
