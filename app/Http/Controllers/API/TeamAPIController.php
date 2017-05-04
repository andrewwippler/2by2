<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTeamAPIRequest;
use App\Http\Requests\API\UpdateTeamAPIRequest;
use App\Models\Team;
use App\Repositories\TeamRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TeamController
 * @package App\Http\Controllers\API
 */

class TeamAPIController extends AppBaseController
{
    /** @var  TeamRepository */
    private $teamRepository;

    public function __construct(TeamRepository $teamRepo)
    {
        $this->teamRepository = $teamRepo;
    }

    /**
     * Display a listing of the Team.
     * GET|HEAD /teams
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->teamRepository->pushCriteria(new RequestCriteria($request));
        $this->teamRepository->pushCriteria(new LimitOffsetCriteria($request));
        $teams = $this->teamRepository->all();

        return $this->sendResponse($teams->toArray(), 'Teams retrieved successfully');
    }

    /**
     * Store a newly created Team in storage.
     * POST /teams
     *
     * @param CreateTeamAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamAPIRequest $request)
    {
        $input = $request->all();

        $teams = $this->teamRepository->create($input);

        return $this->sendResponse($teams->toArray(), 'Team saved successfully');
    }

    /**
     * Display the specified Team.
     * GET|HEAD /teams/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Team $team */
        $team = $this->teamRepository->findWithoutFail($id);

        if (empty($team)) {
            return $this->sendError('Team not found');
        }

        return $this->sendResponse($team->toArray(), 'Team retrieved successfully');
    }

    /**
     * Update the specified Team in storage.
     * PUT/PATCH /teams/{id}
     *
     * @param  int $id
     * @param UpdateTeamAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeamAPIRequest $request)
    {
        $input = $request->all();

        /** @var Team $team */
        $team = $this->teamRepository->findWithoutFail($id);

        if (empty($team)) {
            return $this->sendError('Team not found');
        }

        $team = $this->teamRepository->update($input, $id);

        return $this->sendResponse($team->toArray(), 'Team updated successfully');
    }

    /**
     * Remove the specified Team from storage.
     * DELETE /teams/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Team $team */
        $team = $this->teamRepository->findWithoutFail($id);

        if (empty($team)) {
            return $this->sendError('Team not found');
        }

        $team->delete();

        return $this->sendResponse($id, 'Team deleted successfully');
    }
}
