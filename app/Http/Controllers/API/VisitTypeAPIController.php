<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVisitTypeAPIRequest;
use App\Http\Requests\API\UpdateVisitTypeAPIRequest;
use App\Models\VisitType;
use App\Repositories\VisitTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class VisitTypeController
 * @package App\Http\Controllers\API
 */

class VisitTypeAPIController extends AppBaseController
{
    /** @var  VisitTypeRepository */
    private $visitTypeRepository;

    public function __construct(VisitTypeRepository $visitTypeRepo)
    {
        $this->visitTypeRepository = $visitTypeRepo;
    }

    /**
     * Display a listing of the VisitType.
     * GET|HEAD /visitTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->visitTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->visitTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $visitTypes = $this->visitTypeRepository->all();

        return response()->json($visitTypes->toArray());
    }

    /**
     * Store a newly created VisitType in storage.
     * POST /visitTypes
     *
     * @param CreateVisitTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVisitTypeAPIRequest $request)
    {
        $input = $request->all();

        $visitTypes = $this->visitTypeRepository->create($input);

        return response()->json($visitTypes->toArray());
    }

    /**
     * Display the specified VisitType.
     * GET|HEAD /visitTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VisitType $visitType */
        $visitType = $this->visitTypeRepository->findWithoutFail($id);

        if (empty($visitType)) {
            return response('Visit Type not found',404);
        }

        return response()->json($visitType->toArray());
    }

    /**
     * Update the specified VisitType in storage.
     * PUT/PATCH /visitTypes/{id}
     *
     * @param  int $id
     * @param UpdateVisitTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVisitTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var VisitType $visitType */
        $visitType = $this->visitTypeRepository->findWithoutFail($id);

        if (empty($visitType)) {
            return response('Visit Type not found',404);
        }

        $visitType = $this->visitTypeRepository->update($input, $id);

        return response()->json($visitType->toArray());
    }

    /**
     * Remove the specified VisitType from storage.
     * DELETE /visitTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VisitType $visitType */
        $visitType = $this->visitTypeRepository->findWithoutFail($id);

        if (empty($visitType)) {
            return response('Visit Type not found',404);
        }

        $visitType->delete();

        return response()->json('Visit Type deleted successfully');
    }
}
