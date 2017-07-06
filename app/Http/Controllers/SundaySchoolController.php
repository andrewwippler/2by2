<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSundaySchoolRequest;
use App\Http\Requests\UpdateSundaySchoolRequest;
use App\Repositories\SundaySchoolRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SundaySchoolController extends AppBaseController
{
    /** @var  SundaySchoolRepository */
    private $sundaySchoolRepository;

    public function __construct(SundaySchoolRepository $sundaySchoolRepo)
    {
        $this->sundaySchoolRepository = $sundaySchoolRepo;
    }

    /**
     * Display a listing of the SundaySchool.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sundaySchoolRepository->pushCriteria(new RequestCriteria($request));
        $sundaySchools = $this->sundaySchoolRepository->all()->sortBy('position');

        return view('sunday_schools.index')
            ->with('sundaySchools', $sundaySchools);
    }

    /**
     * Show the form for creating a new SundaySchool.
     *
     * @return Response
     */
    public function create()
    {
        return view('sunday_schools.create');
    }

    /**
     * Store a newly created SundaySchool in storage.
     *
     * @param CreateSundaySchoolRequest $request
     *
     * @return Response
     */
    public function store(CreateSundaySchoolRequest $request)
    {
        $input = $request->all();

        $sundaySchool = $this->sundaySchoolRepository->create($input);

        Flash::success('Sunday School saved successfully.');

        return redirect(route('sundaySchools.index'));
    }

    /**
     * Display the specified SundaySchool.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sundaySchool = $this->sundaySchoolRepository->findWithoutFail($id);

        if (empty($sundaySchool)) {
            Flash::error('Sunday School not found');

            return redirect(route('sundaySchools.index'));
        }

        return view('sunday_schools.show')->with('sundaySchool', $sundaySchool);
    }

    /**
     * Show the form for editing the specified SundaySchool.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sundaySchool = $this->sundaySchoolRepository->findWithoutFail($id);

        if (empty($sundaySchool)) {
            Flash::error('Sunday School not found');

            return redirect(route('sundaySchools.index'));
        }

        return view('sunday_schools.edit')->with('sundaySchool', $sundaySchool);
    }

    /**
     * Update the specified SundaySchool in storage.
     *
     * @param  int              $id
     * @param UpdateSundaySchoolRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSundaySchoolRequest $request)
    {
        $sundaySchool = $this->sundaySchoolRepository->findWithoutFail($id);

        if (empty($sundaySchool)) {
            Flash::error('Sunday School not found');

            return redirect(route('sundaySchools.index'));
        }

        $sundaySchool = $this->sundaySchoolRepository->update($request->all(), $id);

        Flash::success('Sunday School updated successfully.');

        return redirect(route('sundaySchools.index'));
    }

    /**
     * Remove the specified SundaySchool from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sundaySchool = $this->sundaySchoolRepository->findWithoutFail($id);

        if (empty($sundaySchool)) {
            Flash::error('Sunday School not found');

            return redirect(route('sundaySchools.index'));
        }

        $this->sundaySchoolRepository->delete($id);

        Flash::success('Sunday School deleted successfully.');

        return redirect(route('sundaySchools.index'));
    }
}
