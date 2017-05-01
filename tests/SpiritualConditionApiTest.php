<?php

use Tests\TestCase;
use Tests\Traits\MakeSpiritualConditionTrait;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SpiritualConditionApiTest extends TestCase
{
    use MakeSpiritualConditionTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSpiritualCondition()
    {
        $spiritualCondition = $this->fakeSpiritualConditionData();
        $response = $this->json('POST', '/api/v1/spiritualconditions', $spiritualCondition);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testReadSpiritualCondition()
    {
        $spiritualCondition = $this->makeSpiritualCondition();
        $response = $this->json('GET', '/api/v1/spiritualconditions/'.$spiritualCondition->id);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testUpdateSpiritualCondition()
    {
        $spiritualCondition = $this->makeSpiritualCondition();
        $editedSpiritualCondition = $this->fakeSpiritualConditionData();

        $response = $this->json('PUT', '/api/v1/spiritualconditions/'.$spiritualCondition->id, $editedSpiritualCondition);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testDeleteSpiritualCondition()
    {
        $spiritualCondition = $this->makeSpiritualCondition();
        $response = $this->json('DELETE', '/api/v1/spiritualconditions/'.$spiritualCondition->id);

        $response->assertStatus(200);
        $response = $this->json('GET', '/api/v1/spiritualconditions/'.$spiritualCondition->id);

        $response->assertStatus(404);
    }
}
