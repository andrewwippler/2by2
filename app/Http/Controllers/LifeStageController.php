<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLifeStageRequest;
use App\Http\Requests\UpdateLifeStageRequest;
use App\Repositories\LifeStageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LifeStageController extends AppBaseController
{
    /** @var  LifeStageRepository */
    private $lifeStageRepository;

    public function __construct(LifeStageRepository $lifeStageRepo)
    {
        $this->lifeStageRepository = $lifeStageRepo;
    }

    /**
     * Display a listing of the LifeStage.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->lifeStageRepository->pushCriteria(new RequestCriteria($request));
        $lifeStages = $this->lifeStageRepository->all();

        return view('life_stages.index')
            ->with('lifeStages', $lifeStages);
    }

    /**
     * Show the form for creating a new LifeStage.
     *
     * @return Response
     */
    public function create()
    {
        return view('life_stages.create');
    }

    /**
     * Store a newly created LifeStage in storage.
     *
     * @param CreateLifeStageRequest $request
     *
     * @return Response
     */
    public function store(CreateLifeStageRequest $request)
    {
        $input = $request->all();

        $lifeStage = $this->lifeStageRepository->create($input);

        Flash::success('Life Stage saved successfully.');

        return redirect(route('lifeStages.index'));
    }

    /**
     * Display the specified LifeStage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lifeStage = $this->lifeStageRepository->findWithoutFail($id);

        if (empty($lifeStage)) {
            Flash::error('Life Stage not found');

            return redirect(route('lifeStages.index'));
        }

        return view('life_stages.show')->with('lifeStage', $lifeStage);
    }

    /**
     * Show the form for editing the specified LifeStage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lifeStage = $this->lifeStageRepository->findWithoutFail($id);

        if (empty($lifeStage)) {
            Flash::error('Life Stage not found');

            return redirect(route('lifeStages.index'));
        }

        return view('life_stages.edit')->with('lifeStage', $lifeStage);
    }

    /**
     * Update the specified LifeStage in storage.
     *
     * @param  int              $id
     * @param UpdateLifeStageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLifeStageRequest $request)
    {
        $lifeStage = $this->lifeStageRepository->findWithoutFail($id);

        if (empty($lifeStage)) {
            Flash::error('Life Stage not found');

            return redirect(route('lifeStages.index'));
        }

        $lifeStage = $this->lifeStageRepository->update($request->all(), $id);

        Flash::success('Life Stage updated successfully.');

        return redirect(route('lifeStages.index'));
    }

    /**
     * Remove the specified LifeStage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lifeStage = $this->lifeStageRepository->findWithoutFail($id);

        if (empty($lifeStage)) {
            Flash::error('Life Stage not found');

            return redirect(route('lifeStages.index'));
        }

        $this->lifeStageRepository->delete($id);

        Flash::success('Life Stage deleted successfully.');

        return redirect(route('lifeStages.index'));
    }
}
