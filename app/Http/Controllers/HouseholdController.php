<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHouseholdRequest;
use App\Http\Requests\UpdateHouseholdRequest;
use App\Repositories\HouseholdRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Household;
use App\Models\Department;
use App\Models\Relationship;
use App\Models\Person;
use App\Models\VisitType;
use Illuminate\Support\Facades\Auth;
use libphonenumber;

class HouseholdController extends AppBaseController
{
    /** @var  HouseholdRepository */
    private $householdRepository;

    public function __construct(HouseholdRepository $householdRepo)
    {
        $this->householdRepository = $householdRepo;
    }

    /**
     * Display a listing of the Household.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $households = Household::where('user', '=', Auth::id())->with('people','visits')->get();

        foreach ($households as $household)
        {
            if (count($household['relations']['people']) < 2)
            {
                $people = $household['relations']['people'][0]->first_name;
            }
            else
            {
                foreach ($household['relations']['people'] as $person)
                {
                    $peopleArray[] =  $person->first_name;
                }
                $people = implode(", ", $peopleArray);
            }
            $peopleInHouse[$household->id] = $people;
        }

        return view('households.index')
            ->with('households', $households)
            ->with('people', $peopleInHouse);
    }

    /**
     * Show the form for creating a new Household.
     *
     * @return Response
     */
    public function create()
    {
        $dept = Department::all();
        $rela = Relationship::all();
        // $prof = Profile::find(); // find user's profile

        return view('households.create')
            ->with('department', $this->makePrettyArray($dept))
            ->with('relationship', $this->makePrettyArray($rela))
            ->with('user', Auth::id())
            ->with('profile', $prof);
    }

    /**
     * Show the form for creating a new Household visit.
     *
     * @return Response
     */
    public function createVisit($id)
    {

        $household = $this->householdRepository->findWithoutFail($id);

        $visi = VisitType::all();

        return view('households.create_visit')
            ->with('household_id', $household->id)
            ->with('visit_type', $this->makePrettyArray($visi))
            ->with('user', Auth::id())
            ->with('today', \Carbon\Carbon::now());
    }

    /**
     * Store a newly created Household in storage.
     *
     * @param CreateHouseholdRequest $request
     *
     * @return Response
     */
    public function store(CreateHouseholdRequest $request)
    {
        $input = $request->all();
        $people = Array();

        if ($input['first_name'])
        {
            $people_count = count($input['first_name']);

            for ($i=0; $i < $people_count; $i++)
            {
                if ($input['first_name'][$i] != '')
                {
                    $people[] = new Person([
                        'first_name' => $input['first_name'][$i],
                        'email' => $input['email'][$i],
                        'phone_number' => $input['phone_number'][$i],
                        'relationship' => $input['relationship'][$i],
                    ]);
                }
            }
        }

        if (count($people) > 0)
        {
            $household = $this->householdRepository->create($input)->people()->saveMany($people);

            Flash::success('Household saved successfully.');

            return redirect(route('households.index'));
        }
        else
        {
            Flash::error('Household save failed. A person was missing.');

            $dept = Department::all();
            $rela = Relationship::all();

            return view('households.create')
                ->with('department', $this->makePrettyArray($dept))
                ->with('relationship', $this->makePrettyArray($rela))
                ->with('user', Auth::id())
                ->with('today', \Carbon\Carbon::now());
        }

    }

    /**
     * Display the specified Household.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $household = $this->householdRepository->findWithoutFail($id)->load('people','visits');

        if (empty($household) || $household->user != Auth::id()) {
            Flash::error('Household not found');

            return redirect(route('households.index'));
        }

        $dept = Department::all();
        $rela = Relationship::all();
        $visi = VisitType::all();

        return view('households.show')
            ->with('household', $household)
            ->with('people', $household['relations']['people'])
            ->with('visits', $household['relations']['visits'])
            ->with('visit_type', $this->makePrettyArray($visi))
            ->with('department', $this->makePrettyArray($dept))
            ->with('relationship', $this->makePrettyArray($rela))
            ->with('user', Auth::id());

    }

    /**
     * Show the form for editing the specified Household.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $household = $this->householdRepository->findWithoutFail($id)->load('people');

        if (empty($household) || $household->user != Auth::id()) {
            Flash::error('Household not found');

            return redirect(route('households.index'));
        }

        $dept = Department::all();
        $rela = Relationship::all();

        return view('households.edit')
            ->with('household', $household)
            ->with('people', $household['relations']['people'])
            ->with('department', $this->makePrettyArray($dept))
            ->with('relationship', $this->makePrettyArray($rela))
            ->with('user', Auth::id());
    }

    /**
     * Update the specified Household in storage.
     *
     * @param  int              $id
     * @param UpdateHouseholdRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHouseholdRequest $request)
    {
        $household = $this->householdRepository->findWithoutFail($id);

        if (empty($household) || $household->user != Auth::id()) {
            Flash::error('Household not found');

            return redirect(route('households.index'));
        }

        $household = $this->householdRepository->update($request->all(), $id);

        Flash::success('Household updated successfully.');

        return redirect(route('households.index'));
    }

    /**
     * Remove the specified Household from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $household = $this->householdRepository->findWithoutFail($id)->load('people', 'visits');

        if (empty($household) || $household->user != Auth::id()) {
            Flash::error('Household not found');

            return redirect(route('households.index'));
        }

        $this->householdRepository->delete($id);

        Flash::success('Household deleted successfully.');

        return redirect(route('households.index'));
    }
}
