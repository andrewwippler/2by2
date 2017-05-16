<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\ProfileRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Team;
use App\Models\SundaySchool;
use App\User;

class ProfileController extends AppBaseController
{
    /** @var  ProfileRepository */
    private $profileRepository;

    public function __construct(ProfileRepository $profileRepo)
    {
        $this->profileRepository = $profileRepo;
    }

    /**
     * Display a listing of the Profile.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->profileRepository->pushCriteria(new RequestCriteria($request));
        $profiles = $this->profileRepository->all();

        if (\Entrust::hasRole('admin')) {
            $users = User::all();
            $team = Team::all();
            $sunday_schools = SundaySchool::all();

            return view('profiles.index')
                ->with('profiles', $profiles)
                ->with('users', $this->makePrettyArray($users))
                ->with('teams', $this->makePrettyArray($team))
                ->with('sunday_schools', $this->makePrettyArray($sunday_schools));

        } else {
            Flash::error('You do not have permission to access the profile list.');

            return redirect(route('households.index'));
        }

    }

    /**
     * Show the form for creating a new Profile.
     *
     * @return Response
     */
    public function create()
    {
        Flash::error('This feature is not yet implemented');

        return redirect(route('households.index'));
    }

    /**
     * Store a newly created Profile in storage.
     *
     * @param CreateProfileRequest $request
     *
     * @return Response
     */
    public function store(CreateProfileRequest $request)
    {

        if (\Entrust::hasRole('admin')) {
            $input = $request->all();

            $profile = $this->profileRepository->create($input);

            Flash::success('Profile saved successfully.');

            return redirect(route('profiles.index'));

        } else {
            Flash::error('You do not have permission to access the profile list.');

            return redirect(route('households.index'));
        }

    }

    /**
     * Display the specified Profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $profile = User::find($id)->profile;

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        if (\Entrust::hasRole('admin') || $profile->user_id == \Auth::id()) {

            $teams = Team::all();
            $sunday_schools = SundaySchool::all();

            return view('profiles.show')
                ->with('sunday_schools', $this->makePrettyArray($sunday_schools))
                ->with('teams', $this->makePrettyArray($teams))
                ->with('profile', $profile);

        } else {
            Flash::error('You do not have permission to access this profile.');

            return redirect(route('households.index'));
        }
    }

    /**
     * Show the form for editing the specified Profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $profile = User::find($id)->profile;

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        if ($profile->user_id == \Auth::id()) {
            $teams = Team::all();
            $sunday_schools = SundaySchool::all();

            return view('profiles.edit')
                ->with('profile', $profile)
                ->with('sunday_schools', $this->makePrettyArray($sunday_schools))
                ->with('teams', $this->makePrettyArray($teams));
        }

        if (\Entrust::hasRole('admin')) {

            $teams = Team::all();
            $sunday_schools = SundaySchool::all();
            $users = User::all();

            return view('profiles.admin_edit')
                ->with('profile', $profile)
                ->with('sunday_schools', $this->makePrettyArray($sunday_schools))
                ->with('teams', $this->makePrettyArray($teams))
                ->with('users', $this->makePrettyArray($users));
        }

        Flash::error('Profile not found');

        return redirect(route('households.index'));

    }

    /**
     * Update the specified Profile in storage.
     *
     * @param  int              $id
     * @param UpdateProfileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfileRequest $request)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        if (\Entrust::hasRole('admin') || $profile->user_id == \Auth::id()) {

            $profile = $this->profileRepository->update($request->all(), $id);

            Flash::success('Profile updated successfully.');

            return redirect(route('profiles.index'));
        } else {
            Flash::error('You do not have permission to update that profile.');

            return redirect(route('households.index'));
        }
    }

    /**
     * Remove the specified Profile from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        if (\Entrust::hasRole('admin') && $profile->user_id != \Auth::id()) {
            $this->profileRepository->delete($id);

            Flash::success('Profile deleted successfully.');

            return redirect(route('profiles.index'));
        } else {
            Flash::error('You do not have permission to update that profile.');

            return redirect(route('households.index'));
        }
    }
}
