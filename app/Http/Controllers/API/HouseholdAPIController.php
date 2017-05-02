<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHouseholdAPIRequest;
use App\Http\Requests\API\UpdateHouseholdAPIRequest;
use App\Models\Household;
use App\Models\Department;
use App\Models\Relationship;
use App\Models\Person;
use App\Models\VisitType;
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

        return response()->json($households->toArray());
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

        $people_count = count($input['people']);

        foreach ($input['people'] as $person) {
             if ($person['first_name'] != '') {
                $people[] = new Person([
                    'first_name' => $person['first_name'],
                    'middle_name' => $person['middle_name'],
                    'phone_number' => $person['phone_number'],
                    'LifeStage' => $person['LifeStage'],
                    'email' => $person['email'],
                    'spiritual_condition' => $person['spiritual_condition'],
                    'prospect_status' => $person['prospect_status'],
                    'notes' => $person['notes'],
                    'marital_status' => $person['marital_status'],
                    'relationship' => $person['relationship'],
                ]);
            }
        }

        if ($people_count > 0) {
            $household = Household::create($input);
            $household->people()->saveMany($people);

            return response()->json($household->toArray());
        } else {
            return response('Household requires at least 1 person',400);
        }

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
        $household = Household::findOrFail($id);

        if (empty($household)) {
            return response('Household not found',404);
        }

        return response()->json($household);
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
        $household = Household::findOrFail($id);

        if (empty($household)) {
            return response('Household not found',404);
        }

        $people_count = count($input['people']);

        foreach ($input['people'] as $person) {
             if ($person['first_name'] != '') {
                $people[] = new Person([
                    'first_name' => $person['first_name'],
                    'middle_name' => $person['middle_name'],
                    'phone_number' => $person['phone_number'],
                    'LifeStage' => $person['LifeStage'],
                    'email' => $person['email'],
                    'spiritual_condition' => $person['spiritual_condition'],
                    'prospect_status' => $person['prospect_status'],
                    'notes' => $person['notes'],
                    'marital_status' => $person['marital_status'],
                    'relationship' => $person['relationship'],
                ]);
            }
        }

        if ($people_count > 0) {
            $household = Household::fill($input);
            $household->people()->saveMany($people);

            return response()->json($household->toArray());
        } else {
            return response('Household requires at least 1 person',400);
        }

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
            return response('Household not found',404);
        }

        $household->delete();

        return response("Household deleted successfully", 200);
    }
}
