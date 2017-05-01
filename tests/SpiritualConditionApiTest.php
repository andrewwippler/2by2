<?php
namespace Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SpiritualConditionApiTest extends TestCase
{
    use MakeSpiritualConditionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSpiritualCondition()
    {
        $spiritualCondition = $this->fakeSpiritualConditionData();
        $this->json('POST', '/api/v1/spiritualConditions', $spiritualCondition);

        $this->assertApiResponse($spiritualCondition);
    }

    /**
     * @test
     */
    public function testReadSpiritualCondition()
    {
        $spiritualCondition = $this->makeSpiritualCondition();
        $this->json('GET', '/api/v1/spiritualConditions/'.$spiritualCondition->id);

        $this->assertApiResponse($spiritualCondition->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSpiritualCondition()
    {
        $spiritualCondition = $this->makeSpiritualCondition();
        $editedSpiritualCondition = $this->fakeSpiritualConditionData();

        $this->json('PUT', '/api/v1/spiritualConditions/'.$spiritualCondition->id, $editedSpiritualCondition);

        $this->assertApiResponse($editedSpiritualCondition);
    }

    /**
     * @test
     */
    public function testDeleteSpiritualCondition()
    {
        $spiritualCondition = $this->makeSpiritualCondition();
        $this->json('DELETE', '/api/v1/spiritualConditions/'.$spiritualCondition->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/spiritualConditions/'.$spiritualCondition->id);

        $this->assertResponseStatus(404);
    }
}
