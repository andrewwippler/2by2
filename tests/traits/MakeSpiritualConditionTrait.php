<?php

use Faker\Factory as Faker;
use App\Models\SpiritualCondition;
use App\Repositories\SpiritualConditionRepository;

trait MakeSpiritualConditionTrait
{
    /**
     * Create fake instance of SpiritualCondition and save it in database
     *
     * @param array $spiritualConditionFields
     * @return SpiritualCondition
     */
    public function makeSpiritualCondition($spiritualConditionFields = [])
    {
        /** @var SpiritualConditionRepository $spiritualConditionRepo */
        $spiritualConditionRepo = App::make(SpiritualConditionRepository::class);
        $theme = $this->fakeSpiritualConditionData($spiritualConditionFields);
        return $spiritualConditionRepo->create($theme);
    }

    /**
     * Get fake instance of SpiritualCondition
     *
     * @param array $spiritualConditionFields
     * @return SpiritualCondition
     */
    public function fakeSpiritualCondition($spiritualConditionFields = [])
    {
        return new SpiritualCondition($this->fakeSpiritualConditionData($spiritualConditionFields));
    }

    /**
     * Get fake data of SpiritualCondition
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSpiritualConditionData($spiritualConditionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $spiritualConditionFields);
    }
}
