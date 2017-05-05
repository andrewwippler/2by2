<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Repositories\PersonRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\LifeStage;
use App\Models\SpiritualCondition;
use App\Models\ProspectStatus;
use App\Models\MaritalStatus;
use App\Models\Relationship;
use App\Models\Household;

class PersonController extends AppBaseController
{
    /** @var  PersonRepository */
    private $personRepository;

    public function __construct(PersonRepository $personRepo)
    {
        $this->personRepository = $personRepo;
    }

    /**
     * Display a listing of the Person.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->personRepository->pushCriteria(new RequestCriteria($request));
        $people = $this->personRepository->all();

        return view('people.index')
            ->with('people', $people);
    }

    /**
     * Show the form for creating a new Person.
     *
     * @return Response
     */
    public function create()
    {

        $life = LifeStage::all();
        $spirit = SpiritualCondition::all();
        $prospect = ProspectStatus::all();
        $marital = MaritalStatus::all();
        $relation = Relationship::all();

        return view('people.create')
            ->with('lifestage', $this->makePrettyArray($life))
            ->with('spiritual_condition', $this->makePrettyArray($spirit))
            ->with('prospect_status', $this->makePrettyArray($prospect))
            ->with('marital_status', $this->makePrettyArray($marital))
            ->with('relationship', $this->makePrettyArray($relation));
    }

    /**
     * Show the form for creating a new Person.
     *
     * @return Response
     */
    public function createPerson($id)
    {

        $life = LifeStage::all();
        $spirit = SpiritualCondition::all();
        $prospect = ProspectStatus::all();
        $marital = MaritalStatus::all();
        $relation = Relationship::all();

        return view('people.create')
            ->with('lifestage', $this->makePrettyArray($life))
            ->with('household_id', $id)
            ->with('spiritual_condition', $this->makePrettyArray($spirit))
            ->with('prospect_status', $this->makePrettyArray($prospect))
            ->with('marital_status', $this->makePrettyArray($marital))
            ->with('relationship', $this->makePrettyArray($relation));
    }

    /**
     * Store a newly created Person in storage.
     *
     * @param CreatePersonRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonRequest $request)
    {
        $input = $request->all();
        $household = Household::find($input['household_id']);

        $person = $this->personRepository->create($input);
        $person->household()->associate($household)->save();

        Flash::success('Person added successfully.');

        return redirect(route('households.index'));
    }

    /**
     * Display the specified Person.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $person = $this->personRepository->findWithoutFail($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        return view('people.show')->with('person', $person);
    }

    /**
     * Show the form for editing the specified Person.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $person = $this->personRepository->findWithoutFail($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        $life = LifeStage::all();
        $spirit = SpiritualCondition::all();
        $prospect = ProspectStatus::all();
        $marital = MaritalStatus::all();
        $relation = Relationship::all();

        return view('people.edit')
            ->with('person', $person)
            ->with('lifestage', $this->makePrettyArray($life))
            ->with('spiritual_condition', $this->makePrettyArray($spirit))
            ->with('prospect_status', $this->makePrettyArray($prospect))
            ->with('marital_status', $this->makePrettyArray($marital))
            ->with('relationship', $this->makePrettyArray($relation));

    }

    /**
     * Update the specified Person in storage.
     *
     * @param  int              $id
     * @param UpdatePersonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonRequest $request)
    {
        $person = $this->personRepository->findWithoutFail($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        $person = $this->personRepository->update($request->all(), $id);

        Flash::success($person->first_name .' updated successfully.');

        $house = $person->household;

        return redirect(route('households.show', ['id' => $house->id,]));
    }

    /**
     * Remove the specified Person from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $person = $this->personRepository->findWithoutFail($id);

        if (empty($person)) {
            Flash::error('Person not found');

            return redirect(route('people.index'));
        }

        $this->personRepository->delete($id);

        Flash::success('Person deleted successfully.');

        return redirect(route('people.index'));
    }
}
