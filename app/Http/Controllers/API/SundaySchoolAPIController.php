<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSundaySchoolAPIRequest;
use App\Http\Requests\API\UpdateSundaySchoolAPIRequest;
use App\Models\SundaySchool;
use App\Repositories\SundaySchoolRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SundaySchoolController
 * @package App\Http\Controllers\API
 */

class SundaySchoolAPIController extends AppBaseController
{
    /** @var  SundaySchoolRepository */
    private $sundaySchoolRepository;

    public function __construct(SundaySchoolRepository $sundaySchoolRepo)
    {
        $this->sundaySchoolRepository = $sundaySchoolRepo;
    }

    /**
     * Display a listing of the SundaySchool.
     * GET|HEAD /sundaySchools
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sundaySchoolRepository->pushCriteria(new RequestCriteria($request));
        $this->sundaySchoolRepository->pushCriteria(new LimitOffsetCriteria($request));
        $sundaySchools = $this->sundaySchoolRepository->all();

        return $this->sendResponse($sundaySchools->toArray(), 'Sunday Schools retrieved successfully');
    }

    /**
     * Store a newly created SundaySchool in storage.
     * POST /sundaySchools
     *
     * @param CreateSundaySchoolAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSundaySchoolAPIRequest $request)
    {
        $input = $request->all();

        $sundaySchools = $this->sundaySchoolRepository->create($input);

        return $this->sendResponse($sundaySchools->toArray(), 'Sunday School saved successfully');
    }

    /**
     * Display the specified SundaySchool.
     * GET|HEAD /sundaySchools/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SundaySchool $sundaySchool */
        $sundaySchool = $this->sundaySchoolRepository->findWithoutFail($id);

        if (empty($sundaySchool)) {
            return $this->sendError('Sunday School not found');
        }

        return $this->sendResponse($sundaySchool->toArray(), 'Sunday School retrieved successfully');
    }

    /**
     * Update the specified SundaySchool in storage.
     * PUT/PATCH /sundaySchools/{id}
     *
     * @param  int $id
     * @param UpdateSundaySchoolAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSundaySchoolAPIRequest $request)
    {
        $input = $request->all();

        /** @var SundaySchool $sundaySchool */
        $sundaySchool = $this->sundaySchoolRepository->findWithoutFail($id);

        if (empty($sundaySchool)) {
            return $this->sendError('Sunday School not found');
        }

        $sundaySchool = $this->sundaySchoolRepository->update($input, $id);

        return $this->sendResponse($sundaySchool->toArray(), 'SundaySchool updated successfully');
    }

    /**
     * Remove the specified SundaySchool from storage.
     * DELETE /sundaySchools/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SundaySchool $sundaySchool */
        $sundaySchool = $this->sundaySchoolRepository->findWithoutFail($id);

        if (empty($sundaySchool)) {
            return $this->sendError('Sunday School not found');
        }

        $sundaySchool->delete();

        return $this->sendResponse($id, 'Sunday School deleted successfully');
    }
}
