<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDepartmentAPIRequest;
use App\Http\Requests\API\UpdateDepartmentAPIRequest;
use App\Models\Department;
use App\Repositories\DepartmentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DepartmentController
 * @package App\Http\Controllers\API
 */

class DepartmentAPIController extends AppBaseController
{
    /** @var  DepartmentRepository */
    private $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepo)
    {
        $this->departmentRepository = $departmentRepo;
    }

    /**
     * Display a listing of the Department.
     * GET|HEAD /departments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->departmentRepository->pushCriteria(new RequestCriteria($request));
        $this->departmentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $departments = $this->departmentRepository->all();

        return response()->json($departments->toArray());
    }

    /**
     * Store a newly created Department in storage.
     * POST /departments
     *
     * @param CreateDepartmentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartmentAPIRequest $request)
    {
        $input = $request->all();

        $departments = $this->departmentRepository->create($input);

        return response()->json($departments->toArray());
    }

    /**
     * Display the specified Department.
     * GET|HEAD /departments/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Department $department */
        $department = $this->departmentRepository->findWithoutFail($id);

        if (empty($department)) {
            return response("Department not found", 404);
        }

        return response()->json($department->toArray());
    }

    /**
     * Update the specified Department in storage.
     * PUT/PATCH /departments/{id}
     *
     * @param  int $id
     * @param UpdateDepartmentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartmentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Department $department */
        $department = $this->departmentRepository->findWithoutFail($id);

        if (empty($department)) {
            return response("Department not found", 404);
        }

        $department = $this->departmentRepository->update($input, $id);

        return response()->json($department->toArray());
    }

    /**
     * Remove the specified Department from storage.
     * DELETE /departments/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Department $department */
        $department = $this->departmentRepository->findWithoutFail($id);

        if (empty($department)) {
            return response("Department not deleted successfully", 500);
        }

        $department->delete();

        return response("Department deleted successfully", 200);
    }
}
