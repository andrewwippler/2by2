<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMaritalStatusAPIRequest;
use App\Http\Requests\API\UpdateMaritalStatusAPIRequest;
use App\Models\MaritalStatus;
use App\Repositories\MaritalStatusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MaritalStatusController
 * @package App\Http\Controllers\API
 */

class MaritalStatusAPIController extends AppBaseController
{
    /** @var  MaritalStatusRepository */
    private $maritalStatusRepository;

    public function __construct(MaritalStatusRepository $maritalStatusRepo)
    {
        $this->maritalStatusRepository = $maritalStatusRepo;
    }

    /**
     * Display a listing of the MaritalStatus.
     * GET|HEAD /maritalStatuses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->maritalStatusRepository->pushCriteria(new RequestCriteria($request));
        $this->maritalStatusRepository->pushCriteria(new LimitOffsetCriteria($request));
        $maritalStatuses = $this->maritalStatusRepository->all();

        return $this->sendResponse($maritalStatuses->toArray(), 'Marital Statuses retrieved successfully');
    }

    /**
     * Store a newly created MaritalStatus in storage.
     * POST /maritalStatuses
     *
     * @param CreateMaritalStatusAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMaritalStatusAPIRequest $request)
    {
        $input = $request->all();

        $maritalStatuses = $this->maritalStatusRepository->create($input);

        return $this->sendResponse($maritalStatuses->toArray(), 'Marital Status saved successfully');
    }

    /**
     * Display the specified MaritalStatus.
     * GET|HEAD /maritalStatuses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MaritalStatus $maritalStatus */
        $maritalStatus = $this->maritalStatusRepository->findWithoutFail($id);

        if (empty($maritalStatus)) {
            return $this->sendError('Marital Status not found');
        }

        return $this->sendResponse($maritalStatus->toArray(), 'Marital Status retrieved successfully');
    }

    /**
     * Update the specified MaritalStatus in storage.
     * PUT/PATCH /maritalStatuses/{id}
     *
     * @param  int $id
     * @param UpdateMaritalStatusAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMaritalStatusAPIRequest $request)
    {
        $input = $request->all();

        /** @var MaritalStatus $maritalStatus */
        $maritalStatus = $this->maritalStatusRepository->findWithoutFail($id);

        if (empty($maritalStatus)) {
            return $this->sendError('Marital Status not found');
        }

        $maritalStatus = $this->maritalStatusRepository->update($input, $id);

        return $this->sendResponse($maritalStatus->toArray(), 'MaritalStatus updated successfully');
    }

    /**
     * Remove the specified MaritalStatus from storage.
     * DELETE /maritalStatuses/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MaritalStatus $maritalStatus */
        $maritalStatus = $this->maritalStatusRepository->findWithoutFail($id);

        if (empty($maritalStatus)) {
            return $this->sendError('Marital Status not found');
        }

        $maritalStatus->delete();

        return $this->sendResponse($id, 'Marital Status deleted successfully');
    }
}
