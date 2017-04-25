<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProspectStatusRequest;
use App\Http\Requests\UpdateProspectStatusRequest;
use App\Repositories\ProspectStatusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProspectStatusController extends AppBaseController
{
    /** @var  ProspectStatusRepository */
    private $prospectStatusRepository;

    public function __construct(ProspectStatusRepository $prospectStatusRepo)
    {
        $this->prospectStatusRepository = $prospectStatusRepo;
    }

    /**
     * Display a listing of the ProspectStatus.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->prospectStatusRepository->pushCriteria(new RequestCriteria($request));
        $prospectStatuses = $this->prospectStatusRepository->all();

        return view('prospect_statuses.index')
            ->with('prospectStatuses', $prospectStatuses);
    }

    /**
     * Show the form for creating a new ProspectStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('prospect_statuses.create');
    }

    /**
     * Store a newly created ProspectStatus in storage.
     *
     * @param CreateProspectStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateProspectStatusRequest $request)
    {
        $input = $request->all();

        $prospectStatus = $this->prospectStatusRepository->create($input);

        Flash::success('Prospect Status saved successfully.');

        return redirect(route('prospectStatuses.index'));
    }

    /**
     * Display the specified ProspectStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prospectStatus = $this->prospectStatusRepository->findWithoutFail($id);

        if (empty($prospectStatus)) {
            Flash::error('Prospect Status not found');

            return redirect(route('prospectStatuses.index'));
        }

        return view('prospect_statuses.show')->with('prospectStatus', $prospectStatus);
    }

    /**
     * Show the form for editing the specified ProspectStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prospectStatus = $this->prospectStatusRepository->findWithoutFail($id);

        if (empty($prospectStatus)) {
            Flash::error('Prospect Status not found');

            return redirect(route('prospectStatuses.index'));
        }

        return view('prospect_statuses.edit')->with('prospectStatus', $prospectStatus);
    }

    /**
     * Update the specified ProspectStatus in storage.
     *
     * @param  int              $id
     * @param UpdateProspectStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProspectStatusRequest $request)
    {
        $prospectStatus = $this->prospectStatusRepository->findWithoutFail($id);

        if (empty($prospectStatus)) {
            Flash::error('Prospect Status not found');

            return redirect(route('prospectStatuses.index'));
        }

        $prospectStatus = $this->prospectStatusRepository->update($request->all(), $id);

        Flash::success('Prospect Status updated successfully.');

        return redirect(route('prospectStatuses.index'));
    }

    /**
     * Remove the specified ProspectStatus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prospectStatus = $this->prospectStatusRepository->findWithoutFail($id);

        if (empty($prospectStatus)) {
            Flash::error('Prospect Status not found');

            return redirect(route('prospectStatuses.index'));
        }

        $this->prospectStatusRepository->delete($id);

        Flash::success('Prospect Status deleted successfully.');

        return redirect(route('prospectStatuses.index'));
    }
}
