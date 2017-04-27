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
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

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
        $this->householdRepository->pushCriteria(new RequestCriteria($request));
        $households = $this->householdRepository->all();

        return view('households.index')
            ->with('households', $households);
    }

    /**
     * Show the form for creating a new Household.
     *
     * @return Response
     */
    public function create()
    {
        $dept = Department::all();

        return view('households.create')
            ->with('department', $this->makePrettyArray($dept))
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

        $household = $this->householdRepository->create($input);

        Flash::success('Household saved successfully.');

        return redirect(route('households.index'));
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
        $household = $this->householdRepository->findWithoutFail($id);

        if (empty($household)) {
            Flash::error('Household not found');

            return redirect(route('households.index'));
        }

        return view('households.show')->with('household', $household);
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
        $household = $this->householdRepository->findWithoutFail($id);

        if (empty($household)) {
            Flash::error('Household not found');

            return redirect(route('households.index'));
        }

        $dept = Department::all();


        return view('households.edit')
            ->with('household', $household)
            ->with('department', $this->makePrettyArray($dept))
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

        if (empty($household)) {
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
        $household = $this->householdRepository->findWithoutFail($id);

        if (empty($household)) {
            Flash::error('Household not found');

            return redirect(route('households.index'));
        }

        $this->householdRepository->delete($id);

        Flash::success('Household deleted successfully.');

        return redirect(route('households.index'));
    }
}
