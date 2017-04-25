<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVisitTypeRequest;
use App\Http\Requests\UpdateVisitTypeRequest;
use App\Repositories\VisitTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VisitTypeController extends AppBaseController
{
    /** @var  VisitTypeRepository */
    private $visitTypeRepository;

    public function __construct(VisitTypeRepository $visitTypeRepo)
    {
        $this->visitTypeRepository = $visitTypeRepo;
    }

    /**
     * Display a listing of the VisitType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->visitTypeRepository->pushCriteria(new RequestCriteria($request));
        $visitTypes = $this->visitTypeRepository->all();

        return view('visit_types.index')
            ->with('visitTypes', $visitTypes);
    }

    /**
     * Show the form for creating a new VisitType.
     *
     * @return Response
     */
    public function create()
    {
        return view('visit_types.create');
    }

    /**
     * Store a newly created VisitType in storage.
     *
     * @param CreateVisitTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateVisitTypeRequest $request)
    {
        $input = $request->all();

        $visitType = $this->visitTypeRepository->create($input);

        Flash::success('Visit Type saved successfully.');

        return redirect(route('visitTypes.index'));
    }

    /**
     * Display the specified VisitType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $visitType = $this->visitTypeRepository->findWithoutFail($id);

        if (empty($visitType)) {
            Flash::error('Visit Type not found');

            return redirect(route('visitTypes.index'));
        }

        return view('visit_types.show')->with('visitType', $visitType);
    }

    /**
     * Show the form for editing the specified VisitType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $visitType = $this->visitTypeRepository->findWithoutFail($id);

        if (empty($visitType)) {
            Flash::error('Visit Type not found');

            return redirect(route('visitTypes.index'));
        }

        return view('visit_types.edit')->with('visitType', $visitType);
    }

    /**
     * Update the specified VisitType in storage.
     *
     * @param  int              $id
     * @param UpdateVisitTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVisitTypeRequest $request)
    {
        $visitType = $this->visitTypeRepository->findWithoutFail($id);

        if (empty($visitType)) {
            Flash::error('Visit Type not found');

            return redirect(route('visitTypes.index'));
        }

        $visitType = $this->visitTypeRepository->update($request->all(), $id);

        Flash::success('Visit Type updated successfully.');

        return redirect(route('visitTypes.index'));
    }

    /**
     * Remove the specified VisitType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $visitType = $this->visitTypeRepository->findWithoutFail($id);

        if (empty($visitType)) {
            Flash::error('Visit Type not found');

            return redirect(route('visitTypes.index'));
        }

        $this->visitTypeRepository->delete($id);

        Flash::success('Visit Type deleted successfully.');

        return redirect(route('visitTypes.index'));
    }
}
