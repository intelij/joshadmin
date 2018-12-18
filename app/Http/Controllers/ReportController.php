<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Repositories\ReportRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Report;
use App\Models\Supplier;
use App\Models\Metadata;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ReportController extends InfyOmBaseController
{
    /** @var  ReportRepository */
    private $reportRepository;

    public function __construct(ReportRepository $reportRepo)
    {
        $this->reportRepository = $reportRepo;
    }

    /**
     * Display a listing of the Report.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->reportRepository->pushCriteria(new RequestCriteria($request));
        $reports = $this->reportRepository->all();
        return view('admin.reports.index')
            ->with('reports', $reports);
    }

    public function indexWithMetaData(Request $request, $reportsID)
    {

        $this->reportRepository->pushCriteria(new RequestCriteria($request));
        $reports = $this->reportRepository->all();
        $report = Report::find($reportsID);
        $meta = $report->meta;
        $collects = array();
        foreach ($meta as $element)
        {
            $metaValue = $report->meta()->where('meta_id', $element->idMetadata)->first()->pivot->value;
            $array = array('metaID'=>$element->idMetadata, 'name'=>$element->metadataName, 'value'=>$metaValue);
            array_push($collects, $array);
        }
        // $report_meta = $report->meta();
        return view('admin.reports_meta.index')
            ->with('meta', $collects)->with('reportsID', $reportsID);
    }

    /**
     * Show the form for creating a new Report.
     *
     * @return Response
     */
    public function create()
    {
        $suppliers = Supplier::pluck('supplierName','idSupplier');
        return view('admin.reports.create')->with('suppliers', $suppliers);
    }

    public function createWithMeta($reportsID)
    {
        $meta = Metadata::pluck('metadataName','idMetadata');
        return view('admin.reports_meta.create')->with('reportsID', $reportsID)->with('meta', $meta);
    }

    /**
     * Store a newly created Report in storage.
     *
     * @param CreateReportRequest $request
     *
     * @return Response
     */
    public function store(CreateReportRequest $request)
    {
        $input = $request->all();

        $report = $this->reportRepository->create($input);

        Flash::success('Report saved successfully.');

        return redirect(route('admin.reports.index'));
    }

    public function storeWithMeta(Request $request, $reportsID)
    {
        $idMetadata = $request->idMetadata;
        $metaValue = $request->metadataValue;
        $report = Report::find($reportsID);
        $report_meta = $report->meta->where('idMetadata', $idMetadata)->first();
        if ($report_meta) {
             Flash::warning('Metadata already exist in this reports!');

            return redirect(route('admin.reports.meta.index', $reportsID));
        }

        $meta = $report->meta()->attach($idMetadata, ['value' => $metaValue]);

        Flash::success('Metadata added successfully.');

        return redirect(route('admin.reports.meta.index', $reportsID));

    }

    /**
     * Display the specified Report.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $report = $this->reportRepository->findWithoutFail($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        return view('admin.reports.show')->with('report', $report);
    }

    /**
     * Show the form for editing the specified Report.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $report = $this->reportRepository->findWithoutFail($id);
        $suppliers = Supplier::pluck('supplierName','idSupplier');

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        return view('admin.reports.edit')->with('report', $report)->with('suppliers', $suppliers);
    }

    public function editWithMeta($reportsID, $metaID)
    {
        $report = Report::find($reportsID);
        $metaName = $report->meta->where('idMetadata', $metaID)->first()->metadataName;
        $metaValue = $report->meta()->where('meta_id', $metaID)->first()->pivot->value;
        $collect = array('name'=>$metaName, 'value'=>$metaValue);
        
        // $report_meta = $report->meta();
        return view('admin.reports_meta.edit')
            ->with('meta', $collect)->with('reportsID', $reportsID)->with('metaID',  $metaID);
    }

    /**
     * Update the specified Report in storage.
     *
     * @param  int              $id
     * @param UpdateReportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReportRequest $request)
    {
        $report = $this->reportRepository->findWithoutFail($id);

        

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        $report = $this->reportRepository->update($request->all(), $id);

        Flash::success('Report updated successfully.');

        return redirect(route('admin.reports.index'));
    }

    public function updateWithMeta(Request $request, $reportsID, $metaID)
    {
        $idMetadata = $metaID;
        $metaValue = $request->value;
        $report = Report::find($reportsID);
        $report_meta = $report->meta->where('idMetadata', $idMetadata)->first();

        $meta = $report->meta()->updateExistingPivot($idMetadata, ['value' => $metaValue]);
        // $video->galleries()->sync([$gallery_id => ['user_id'=>Auth::user()->id]])

        Flash::success('Metadata updated successfully.');

        return redirect(route('admin.reports.meta.index', $reportsID));
    }

    /**
     * Remove the specified Report from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.reports.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

      public function getModalDeleteWithMeta($reportsID=null, $metaID = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.reports.meta.delete',['reportsID'=>$reportsID, 'metaID'=>$metaID]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Report::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.reports.index'))->with('success', Lang::get('message.success.delete'));

       }

     public function getDeleteWithMeta($reportsID=null, $metaID = null)
       {

            $report = Report::find($reportsID);
            $meta = $report->meta()->detach($metaID);

            Flash::success('Analysis removed successfully.');

            return redirect(route('admin.reports.meta.index', $reportsID));

       }

}
