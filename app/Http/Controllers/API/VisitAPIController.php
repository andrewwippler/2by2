<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVisitAPIRequest;
use App\Http\Requests\API\UpdateVisitAPIRequest;
use App\Models\Visit;
use App\Repositories\VisitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class VisitController
 * @package App\Http\Controllers\API
 */

class VisitAPIController extends AppBaseController
{
    /** @var  VisitRepository */
    private $visitRepository;

    public function __construct(VisitRepository $visitRepo)
    {
        $this->visitRepository = $visitRepo;
    }

    /**
     * Display a listing of the Visit.
     * GET|HEAD /visits
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->visitRepository->pushCriteria(new RequestCriteria($request));
        $this->visitRepository->pushCriteria(new LimitOffsetCriteria($request));
        $visits = $this->visitRepository->all();

        return $this->sendResponse($visits->toArray(), 'Visits retrieved successfully');
    }

    /**
     * Store a newly created Visit in storage.
     * POST /visits
     *
     * @param CreateVisitAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVisitAPIRequest $request)
    {
        $input = $request->all();

        $visits = $this->visitRepository->create($input);

        return $this->sendResponse($visits->toArray(), 'Visit saved successfully');
    }

    /**
     * Display the specified Visit.
     * GET|HEAD /visits/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Visit $visit */
        $visit = $this->visitRepository->findWithoutFail($id);

        if (empty($visit)) {
            return $this->sendError('Visit not found');
        }

        return $this->sendResponse($visit->toArray(), 'Visit retrieved successfully');
    }

    /**
     * Update the specified Visit in storage.
     * PUT/PATCH /visits/{id}
     *
     * @param  int $id
     * @param UpdateVisitAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVisitAPIRequest $request)
    {
        $input = $request->all();

        /** @var Visit $visit */
        $visit = $this->visitRepository->findWithoutFail($id);

        if (empty($visit)) {
            return $this->sendError('Visit not found');
        }

        $visit = $this->visitRepository->update($input, $id);

        return $this->sendResponse($visit->toArray(), 'Visit updated successfully');
    }

    /**
     * Remove the specified Visit from storage.
     * DELETE /visits/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Visit $visit */
        $visit = $this->visitRepository->findWithoutFail($id);

        if (empty($visit)) {
            return $this->sendError('Visit not found');
        }

        $visit->delete();

        return $this->sendResponse($id, 'Visit deleted successfully');
    }
}
