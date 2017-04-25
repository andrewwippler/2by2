<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRelationshipAPIRequest;
use App\Http\Requests\API\UpdateRelationshipAPIRequest;
use App\Models\Relationship;
use App\Repositories\RelationshipRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RelationshipController
 * @package App\Http\Controllers\API
 */

class RelationshipAPIController extends AppBaseController
{
    /** @var  RelationshipRepository */
    private $relationshipRepository;

    public function __construct(RelationshipRepository $relationshipRepo)
    {
        $this->relationshipRepository = $relationshipRepo;
    }

    /**
     * Display a listing of the Relationship.
     * GET|HEAD /relationships
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->relationshipRepository->pushCriteria(new RequestCriteria($request));
        $this->relationshipRepository->pushCriteria(new LimitOffsetCriteria($request));
        $relationships = $this->relationshipRepository->all();

        return $this->sendResponse($relationships->toArray(), 'Relationships retrieved successfully');
    }

    /**
     * Store a newly created Relationship in storage.
     * POST /relationships
     *
     * @param CreateRelationshipAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRelationshipAPIRequest $request)
    {
        $input = $request->all();

        $relationships = $this->relationshipRepository->create($input);

        return $this->sendResponse($relationships->toArray(), 'Relationship saved successfully');
    }

    /**
     * Display the specified Relationship.
     * GET|HEAD /relationships/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Relationship $relationship */
        $relationship = $this->relationshipRepository->findWithoutFail($id);

        if (empty($relationship)) {
            return $this->sendError('Relationship not found');
        }

        return $this->sendResponse($relationship->toArray(), 'Relationship retrieved successfully');
    }

    /**
     * Update the specified Relationship in storage.
     * PUT/PATCH /relationships/{id}
     *
     * @param  int $id
     * @param UpdateRelationshipAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRelationshipAPIRequest $request)
    {
        $input = $request->all();

        /** @var Relationship $relationship */
        $relationship = $this->relationshipRepository->findWithoutFail($id);

        if (empty($relationship)) {
            return $this->sendError('Relationship not found');
        }

        $relationship = $this->relationshipRepository->update($input, $id);

        return $this->sendResponse($relationship->toArray(), 'Relationship updated successfully');
    }

    /**
     * Remove the specified Relationship from storage.
     * DELETE /relationships/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Relationship $relationship */
        $relationship = $this->relationshipRepository->findWithoutFail($id);

        if (empty($relationship)) {
            return $this->sendError('Relationship not found');
        }

        $relationship->delete();

        return $this->sendResponse($id, 'Relationship deleted successfully');
    }
}
