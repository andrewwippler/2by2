<?php
namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\LifeStage;
use App\Repositories\LifeStageRepository;

trait MakeLifeStageTrait
{
    /**
     * Create fake instance of LifeStage and save it in database
     *
     * @param array $lifeStageFields
     * @return LifeStage
     */
    public function makeLifeStage($lifeStageFields = [])
    {
        /** @var LifeStageRepository $lifeStageRepo */
        $lifeStageRepo = \App::make(LifeStageRepository::class);
        $theme = $this->fakeLifeStageData($lifeStageFields);
        return $lifeStageRepo->create($theme);
    }

    /**
     * Get fake instance of LifeStage
     *
     * @param array $lifeStageFields
     * @return LifeStage
     */
    public function fakeLifeStage($lifeStageFields = [])
    {
        return new LifeStage($this->fakeLifeStageData($lifeStageFields));
    }

    /**
     * Get fake data of LifeStage
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLifeStageData($lifeStageFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
        ], $lifeStageFields);
    }
}
