<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProspectStatusAPIRequest;
use App\Http\Requests\API\UpdateProspectStatusAPIRequest;
use App\Models\ProspectStatus;
use App\Repositories\ProspectStatusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProspectStatusController
 * @package App\Http\Controllers\API
 */

class ProspectStatusAPIController extends AppBaseController
{
    /** @var  ProspectStatusRepository */
    private $prospectStatusRepository;

    public function __construct(ProspectStatusRepository $prospectStatusRepo)
    {
        $this->prospectStatusRepository = $prospectStatusRepo;
    }

    /**
     * Display a listing of the ProspectStatus.
     * GET|HEAD /prospectStatuses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->prospectStatusRepository->pushCriteria(new RequestCriteria($request));
        $this->prospectStatusRepository->pushCriteria(new LimitOffsetCriteria($request));
        $prospectStatuses = $this->prospectStatusRepository->all();

        return $this->sendResponse($prospectStatuses->toArray(), 'Prospect Statuses retrieved successfully');
    }

    /**
     * Store a newly created ProspectStatus in storage.
     * POST /prospectStatuses
     *
     * @param CreateProspectStatusAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProspectStatusAPIRequest $request)
    {
        $input = $request->all();

        $prospectStatuses = $this->prospectStatusRepository->create($input);

        return $this->sendResponse($prospectStatuses->toArray(), 'Prospect Status saved successfully');
    }

    /**
     * Display the specified ProspectStatus.
     * GET|HEAD /prospectStatuses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProspectStatus $prospectStatus */
        $prospectStatus = $this->prospectStatusRepository->findWithoutFail($id);

        if (empty($prospectStatus)) {
            return $this->sendError('Prospect Status not found');
        }

        return $this->sendResponse($prospectStatus->toArray(), 'Prospect Status retrieved successfully');
    }

    /**
     * Update the specified ProspectStatus in storage.
     * PUT/PATCH /prospectStatuses/{id}
     *
     * @param  int $id
     * @param UpdateProspectStatusAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProspectStatusAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProspectStatus $prospectStatus */
        $prospectStatus = $this->prospectStatusRepository->findWithoutFail($id);

        if (empty($prospectStatus)) {
            return $this->sendError('Prospect Status not found');
        }

        $prospectStatus = $this->prospectStatusRepository->update($input, $id);

        return $this->sendResponse($prospectStatus->toArray(), 'ProspectStatus updated successfully');
    }

    /**
     * Remove the specified ProspectStatus from storage.
     * DELETE /prospectStatuses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProspectStatus $prospectStatus */
        $prospectStatus = $this->prospectStatusRepository->findWithoutFail($id);

        if (empty($prospectStatus)) {
            return $this->sendError('Prospect Status not found');
        }

        $prospectStatus->delete();

        return $this->sendResponse($id, 'Prospect Status deleted successfully');
    }
}
