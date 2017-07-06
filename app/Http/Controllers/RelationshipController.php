<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRelationshipRequest;
use App\Http\Requests\UpdateRelationshipRequest;
use App\Repositories\RelationshipRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RelationshipController extends AppBaseController
{
    /** @var  RelationshipRepository */
    private $relationshipRepository;

    public function __construct(RelationshipRepository $relationshipRepo)
    {
        $this->relationshipRepository = $relationshipRepo;
    }

    /**
     * Display a listing of the Relationship.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->relationshipRepository->pushCriteria(new RequestCriteria($request));
        $relationships = $this->relationshipRepository->all()->sortBy('position');

        return view('relationships.index')
            ->with('relationships', $relationships);
    }

    /**
     * Show the form for creating a new Relationship.
     *
     * @return Response
     */
    public function create()
    {
        return view('relationships.create');
    }

    /**
     * Store a newly created Relationship in storage.
     *
     * @param CreateRelationshipRequest $request
     *
     * @return Response
     */
    public function store(CreateRelationshipRequest $request)
    {
        $input = $request->all();

        $relationship = $this->relationshipRepository->create($input);

        Flash::success('Relationship saved successfully.');

        return redirect(route('relationships.index'));
    }

    /**
     * Display the specified Relationship.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $relationship = $this->relationshipRepository->findWithoutFail($id);

        if (empty($relationship)) {
            Flash::error('Relationship not found');

            return redirect(route('relationships.index'));
        }

        return view('relationships.show')->with('relationship', $relationship);
    }

    /**
     * Show the form for editing the specified Relationship.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $relationship = $this->relationshipRepository->findWithoutFail($id);

        if (empty($relationship)) {
            Flash::error('Relationship not found');

            return redirect(route('relationships.index'));
        }

        return view('relationships.edit')->with('relationship', $relationship);
    }

    /**
     * Update the specified Relationship in storage.
     *
     * @param  int              $id
     * @param UpdateRelationshipRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRelationshipRequest $request)
    {
        $relationship = $this->relationshipRepository->findWithoutFail($id);

        if (empty($relationship)) {
            Flash::error('Relationship not found');

            return redirect(route('relationships.index'));
        }

        $relationship = $this->relationshipRepository->update($request->all(), $id);

        Flash::success('Relationship updated successfully.');

        return redirect(route('relationships.index'));
    }

    /**
     * Remove the specified Relationship from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $relationship = $this->relationshipRepository->findWithoutFail($id);

        if (empty($relationship)) {
            Flash::error('Relationship not found');

            return redirect(route('relationships.index'));
        }

        $this->relationshipRepository->delete($id);

        Flash::success('Relationship deleted successfully.');

        return redirect(route('relationships.index'));
    }
}
