<?php

use Faker\Factory as Faker;
use App\Models\Relationship;
use App\Repositories\RelationshipRepository;

trait MakeRelationshipTrait
{
    /**
     * Create fake instance of Relationship and save it in database
     *
     * @param array $relationshipFields
     * @return Relationship
     */
    public function makeRelationship($relationshipFields = [])
    {
        /** @var RelationshipRepository $relationshipRepo */
        $relationshipRepo = App::make(RelationshipRepository::class);
        $theme = $this->fakeRelationshipData($relationshipFields);
        return $relationshipRepo->create($theme);
    }

    /**
     * Get fake instance of Relationship
     *
     * @param array $relationshipFields
     * @return Relationship
     */
    public function fakeRelationship($relationshipFields = [])
    {
        return new Relationship($this->fakeRelationshipData($relationshipFields));
    }

    /**
     * Get fake data of Relationship
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRelationshipData($relationshipFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $relationshipFields);
    }
}
