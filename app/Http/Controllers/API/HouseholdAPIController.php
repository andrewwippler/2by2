<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHouseholdAPIRequest;
use App\Http\Requests\API\UpdateHouseholdAPIRequest;
use App\Models\Household;
use App\Repositories\HouseholdRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class HouseholdController
 * @package App\Http\Controllers\API
 */

class HouseholdAPIController extends AppBaseController
{
    /** @var  HouseholdRepository */
    private $householdRepository;

    public function __construct(HouseholdRepository $householdRepo)
    {
        $this->householdRepository = $householdRepo;
    }

    /**
     * Display a listing of the Household.
     * GET|HEAD /households
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->householdRepository->pushCriteria(new RequestCriteria($request));
        $this->householdRepository->pushCriteria(new LimitOffsetCriteria($request));
        $households = $this->householdRepository->all();

        return $this->sendResponse($households->toArray(), 'Households retrieved successfully');
    }

    /**
     * Store a newly created Household in storage.
     * POST /households
     *
     * @param CreateHouseholdAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHouseholdAPIRequest $request)
    {
        $input = $request->all();

        $households = $this->householdRepository->create($input);

        return $this->sendResponse($households->toArray(), 'Household saved successfully');
    }

    /**
     * Display the specified Household.
     * GET|HEAD /households/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Household $household */
        $household = $this->householdRepository->findWithoutFail($id);

        if (empty($household)) {
            return $this->sendError('Household not found');
        }

        return $this->sendResponse($household->toArray(), 'Household retrieved successfully');
    }

    /**
     * Update the specified Household in storage.
     * PUT/PATCH /households/{id}
     *
     * @param  int $id
     * @param UpdateHouseholdAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHouseholdAPIRequest $request)
    {
        $input = $request->all();

        /** @var Household $household */
        $household = $this->householdRepository->findWithoutFail($id);

        if (empty($household)) {
            return $this->sendError('Household not found');
        }

        $household = $this->householdRepository->update($input, $id);

        return $this->sendResponse($household->toArray(), 'Household updated successfully');
    }

    /**
     * Remove the specified Household from storage.
     * DELETE /households/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Household $household */
        $household = $this->householdRepository->findWithoutFail($id);

        if (empty($household)) {
            return $this->sendError('Household not found');
        }

        $household->delete();

        return $this->sendResponse($id, 'Household deleted successfully');
    }
}
