<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpiritualConditionRequest;
use App\Http\Requests\UpdateSpiritualConditionRequest;
use App\Repositories\SpiritualConditionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SpiritualConditionController extends AppBaseController
{
    /** @var  SpiritualConditionRepository */
    private $spiritualConditionRepository;

    public function __construct(SpiritualConditionRepository $spiritualConditionRepo)
    {
        $this->spiritualConditionRepository = $spiritualConditionRepo;
    }

    /**
     * Display a listing of the SpiritualCondition.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->spiritualConditionRepository->pushCriteria(new RequestCriteria($request));
        $spiritualConditions = $this->spiritualConditionRepository->all()->sortBy('position');

        return view('spiritual_conditions.index')
            ->with('spiritualConditions', $spiritualConditions);
    }

    /**
     * Show the form for creating a new SpiritualCondition.
     *
     * @return Response
     */
    public function create()
    {
        return view('spiritual_conditions.create');
    }

    /**
     * Store a newly created SpiritualCondition in storage.
     *
     * @param CreateSpiritualConditionRequest $request
     *
     * @return Response
     */
    public function store(CreateSpiritualConditionRequest $request)
    {
        $input = $request->all();

        $spiritualCondition = $this->spiritualConditionRepository->create($input);

        Flash::success('Spiritual Condition saved successfully.');

        return redirect(route('spiritualConditions.index'));
    }

    /**
     * Display the specified SpiritualCondition.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $spiritualCondition = $this->spiritualConditionRepository->findWithoutFail($id);

        if (empty($spiritualCondition)) {
            Flash::error('Spiritual Condition not found');

            return redirect(route('spiritualConditions.index'));
        }

        return view('spiritual_conditions.show')->with('spiritualCondition', $spiritualCondition);
    }

    /**
     * Show the form for editing the specified SpiritualCondition.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $spiritualCondition = $this->spiritualConditionRepository->findWithoutFail($id);

        if (empty($spiritualCondition)) {
            Flash::error('Spiritual Condition not found');

            return redirect(route('spiritualConditions.index'));
        }

        return view('spiritual_conditions.edit')->with('spiritualCondition', $spiritualCondition);
    }

    /**
     * Update the specified SpiritualCondition in storage.
     *
     * @param  int              $id
     * @param UpdateSpiritualConditionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSpiritualConditionRequest $request)
    {
        $spiritualCondition = $this->spiritualConditionRepository->findWithoutFail($id);

        if (empty($spiritualCondition)) {
            Flash::error('Spiritual Condition not found');

            return redirect(route('spiritualConditions.index'));
        }

        $spiritualCondition = $this->spiritualConditionRepository->update($request->all(), $id);

        Flash::success('Spiritual Condition updated successfully.');

        return redirect(route('spiritualConditions.index'));
    }

    /**
     * Remove the specified SpiritualCondition from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $spiritualCondition = $this->spiritualConditionRepository->findWithoutFail($id);

        if (empty($spiritualCondition)) {
            Flash::error('Spiritual Condition not found');

            return redirect(route('spiritualConditions.index'));
        }

        $this->spiritualConditionRepository->delete($id);

        Flash::success('Spiritual Condition deleted successfully.');

        return redirect(route('spiritualConditions.index'));
    }
}
