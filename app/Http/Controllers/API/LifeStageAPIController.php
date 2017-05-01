<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLifeStageAPIRequest;
use App\Http\Requests\API\UpdateLifeStageAPIRequest;
use App\Models\LifeStage;
use App\Repositories\LifeStageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LifeStageController
 * @package App\Http\Controllers\API
 */

class LifeStageAPIController extends AppBaseController
{
    /** @var  LifeStageRepository */
    private $lifeStageRepository;

    public function __construct(LifeStageRepository $lifeStageRepo)
    {
        $this->lifeStageRepository = $lifeStageRepo;
    }

    /**
     * Display a listing of the LifeStage.
     * GET|HEAD /lifeStages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->lifeStageRepository->pushCriteria(new RequestCriteria($request));
        $this->lifeStageRepository->pushCriteria(new LimitOffsetCriteria($request));
        $lifeStages = $this->lifeStageRepository->all();

        return response()->json($lifeStages->toArray());
    }

    /**
     * Store a newly created LifeStage in storage.
     * POST /lifeStages
     *
     * @param CreateLifeStageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLifeStageAPIRequest $request)
    {
        $input = $request->all();

        $lifeStages = $this->lifeStageRepository->create($input);

        return response()->json($lifeStages->toArray());
    }

    /**
     * Display the specified LifeStage.
     * GET|HEAD /lifeStages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LifeStage $lifeStage */
        $lifeStage = $this->lifeStageRepository->findWithoutFail($id);

        if (empty($lifeStage)) {
            return response('Life Stage not found', 404);
        }

        return response()->json($lifeStage->toArray());
    }

    /**
     * Update the specified LifeStage in storage.
     * PUT/PATCH /lifeStages/{id}
     *
     * @param  int $id
     * @param UpdateLifeStageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLifeStageAPIRequest $request)
    {
        $input = $request->all();

        /** @var LifeStage $lifeStage */
        $lifeStage = $this->lifeStageRepository->findWithoutFail($id);

        if (empty($lifeStage)) {
            return response('Life Stage not found', 404);
        }

        $lifeStage = $this->lifeStageRepository->update($input, $id);

        return response()->json($lifeStage->toArray());
    }

    /**
     * Remove the specified LifeStage from storage.
     * DELETE /lifeStages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LifeStage $lifeStage */
        $lifeStage = $this->lifeStageRepository->findWithoutFail($id);

        if (empty($lifeStage)) {
            return response('Life Stage not found',404);
        }

        $lifeStage->delete();

        return response()->json('Life Stage deleted successfully');
    }
}
