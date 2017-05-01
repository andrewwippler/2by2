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

        return response()->json($prospectStatuses->toArray());
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

        return response()->json($prospectStatuses->toArray());
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
            return response('Prospect Status not found',404);
        }

        return response()->json($prospectStatus->toArray());
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
            return response('Prospect Status not found',404);
        }

        $prospectStatus = $this->prospectStatusRepository->update($input, $id);

        return response()->json($prospectStatus->toArray());
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
            return response('Prospect Status not found',404);
        }

        $prospectStatus->delete();

        return response()->json('Prospect Status deleted successfully');
    }
}
