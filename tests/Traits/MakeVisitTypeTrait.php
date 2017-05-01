<?php
namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\VisitType;
use App\Repositories\VisitTypeRepository;

trait MakeVisitTypeTrait
{
    /**
     * Create fake instance of VisitType and save it in database
     *
     * @param array $visitTypeFields
     * @return VisitType
     */
    public function makeVisitType($visitTypeFields = [])
    {
        /** @var VisitTypeRepository $visitTypeRepo */
        $visitTypeRepo = \App::make(VisitTypeRepository::class);
        $theme = $this->fakeVisitTypeData($visitTypeFields);
        return $visitTypeRepo->create($theme);
    }

    /**
     * Get fake instance of VisitType
     *
     * @param array $visitTypeFields
     * @return VisitType
     */
    public function fakeVisitType($visitTypeFields = [])
    {
        return new VisitType($this->fakeVisitTypeData($visitTypeFields));
    }

    /**
     * Get fake data of VisitType
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVisitTypeData($visitTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
        ], $visitTypeFields);
    }
}
