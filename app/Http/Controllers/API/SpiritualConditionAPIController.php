<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSpiritualConditionAPIRequest;
use App\Http\Requests\API\UpdateSpiritualConditionAPIRequest;
use App\Models\SpiritualCondition;
use App\Repositories\SpiritualConditionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SpiritualConditionController
 * @package App\Http\Controllers\API
 */

class SpiritualConditionAPIController extends AppBaseController
{
    /** @var  SpiritualConditionRepository */
    private $spiritualConditionRepository;

    public function __construct(SpiritualConditionRepository $spiritualConditionRepo)
    {
        $this->spiritualConditionRepository = $spiritualConditionRepo;
    }

    /**
     * Display a listing of the SpiritualCondition.
     * GET|HEAD /spiritualConditions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->spiritualConditionRepository->pushCriteria(new RequestCriteria($request));
        $this->spiritualConditionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $spiritualConditions = $this->spiritualConditionRepository->all();

        return response()->json($spiritualConditions->toArray());
    }

    /**
     * Store a newly created SpiritualCondition in storage.
     * POST /spiritualConditions
     *
     * @param CreateSpiritualConditionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSpiritualConditionAPIRequest $request)
    {
        $input = $request->all();

        $spiritualConditions = $this->spiritualConditionRepository->create($input);

        return response()->json($spiritualConditions->toArray());
    }

    /**
     * Display the specified SpiritualCondition.
     * GET|HEAD /spiritualConditions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SpiritualCondition $spiritualCondition */
        $spiritualCondition = $this->spiritualConditionRepository->findWithoutFail($id);

        if (empty($spiritualCondition)) {
            return response('Spiritual Condition not found', 404);
        }

        return response()->json($spiritualCondition->toArray());
    }

    /**
     * Update the specified SpiritualCondition in storage.
     * PUT/PATCH /spiritualConditions/{id}
     *
     * @param  int $id
     * @param UpdateSpiritualConditionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSpiritualConditionAPIRequest $request)
    {
        $input = $request->all();

        /** @var SpiritualCondition $spiritualCondition */
        $spiritualCondition = $this->spiritualConditionRepository->findWithoutFail($id);

        if (empty($spiritualCondition)) {
            return response('Spiritual Condition not found', 404);
        }

        $spiritualCondition = $this->spiritualConditionRepository->update($input, $id);

        return response()->json($spiritualCondition->toArray());
    }

    /**
     * Remove the specified SpiritualCondition from storage.
     * DELETE /spiritualConditions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SpiritualCondition $spiritualCondition */
        $spiritualCondition = $this->spiritualConditionRepository->findWithoutFail($id);

        if (empty($spiritualCondition)) {
            return response('Spiritual Condition not found', 404);
        }

        $spiritualCondition->delete();

        return response()->json('Spiritual Condition deleted successfully');
    }
}
