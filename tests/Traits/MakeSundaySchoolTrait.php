<?php
namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\SundaySchool;
use App\Repositories\SundaySchoolRepository;

trait MakeSundaySchoolTrait
{
    /**
     * Create fake instance of SundaySchool and save it in database
     *
     * @param array $sundaySchoolFields
     * @return SundaySchool
     */
    public function makeSundaySchool($sundaySchoolFields = [])
    {
        /** @var SundaySchoolRepository $sundaySchoolRepo */
        $sundaySchoolRepo = \App::make(SundaySchoolRepository::class);
        $theme = $this->fakeSundaySchoolData($sundaySchoolFields);
        return $sundaySchoolRepo->create($theme);
    }

    /**
     * Get fake instance of SundaySchool
     *
     * @param array $sundaySchoolFields
     * @return SundaySchool
     */
    public function fakeSundaySchool($sundaySchoolFields = [])
    {
        return new SundaySchool($this->fakeSundaySchoolData($sundaySchoolFields));
    }

    /**
     * Get fake data of SundaySchool
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSundaySchoolData($sundaySchoolFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
        ], $sundaySchoolFields);
    }
}
