<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVisitRequest;
use App\Http\Requests\UpdateVisitRequest;
use App\Repositories\VisitRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\VisitType;
use App\Models\Household;

class VisitController extends AppBaseController
{
    /** @var  VisitRepository */
    private $visitRepository;

    public function __construct(VisitRepository $visitRepo)
    {
        $this->visitRepository = $visitRepo;
    }

    /**
     * Display a listing of the Visit.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->visitRepository->pushCriteria(new RequestCriteria($request));
        $visits = $this->visitRepository->all()->sortBy('position');

        $visit_types = VisitType::all();

        return view('visits.index')
            ->with('visits', $visits)
            ->with('visit_type', $this->makePrettyArray($visit_types));
    }

    /**
     * Show the form for creating a new Visit.
     *
     * @return Response
     */
    public function create()
    {
        $visit_types = VisitType::all();

        return view('visits.create')
            ->with('visit_type', $this->makePrettyArray($visit_types));
    }

    /**
     * Store a newly created Visit in storage.
     *
     * @param CreateVisitRequest $request
     *
     * @return Response
     */
    public function store(CreateVisitRequest $request)
    {
        $input = $request->all();
        $household = Household::find($input['household_id']);

        $visit = $this->visitRepository->create($input);
        $visit->household()->associate($household)->save();

        Flash::success('Visit saved successfully.');

        return redirect(route('households.show', ['id' => $input['household_id'],]));
    }

    /**
     * Display the specified Visit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $visit = $this->visitRepository->findWithoutFail($id);

        if (empty($visit)) {
            Flash::error('Visit not found');

            return redirect(route('visits.index'));
        }

        return view('visits.show')
            ->with('visit', $visit);
    }

    /**
     * Show the form for editing the specified Visit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $visit = $this->visitRepository->findWithoutFail($id);

        if (empty($visit)) {
            Flash::error('Visit not found');

            return redirect(route('visits.index'));
        }

        $visit_types = VisitType::all();

        return view('visits.edit')
            ->with('visit', $visit)
            ->with('household_id', $visit->household_id)
            ->with('today', \Carbon\Carbon::now())
            ->with('visit_type', $this->makePrettyArray($visit_types));
    }

    /**
     * Update the specified Visit in storage.
     *
     * @param  int              $id
     * @param UpdateVisitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVisitRequest $request)
    {
        $visit = $this->visitRepository->findWithoutFail($id);

        if (empty($visit)) {
            Flash::error('Visit not found');

            return redirect(route('households.show', ['id' => $request['household_id'],]));
        }

        $household = Household::find($request['household_id']);

        $visit = $this->visitRepository->update($request->all(), $id);
        $visit->household()->associate($household)->save();

        Flash::success('Visit updated successfully.');

        return redirect(route('households.show', ['id' => $request['household_id'],]));
    }

    /**
     * Remove the specified Visit from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $visit = $this->visitRepository->findWithoutFail($id);

        if (empty($visit)) {
            Flash::error('Visit not found');

            return redirect(route('visits.index'));
        }

        $this->visitRepository->delete($id);

        Flash::success('Visit deleted successfully.');

        return redirect(route('visits.index'));
    }
}
