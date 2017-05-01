<?php

use Tests\TestCase;
use Tests\ApiTestTrait;
use Tests\Traits\MakeLifeStageTrait;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LifeStageApiTest extends TestCase
{
    use MakeLifeStageTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLifeStage()
    {
        $lifeStage = $this->fakeLifeStageData();
        $this->json('POST', '/api/v1/lifeStages', $lifeStage);

        $this->assertApiResponse($lifeStage);
    }

    /**
     * @test
     */
    public function testReadLifeStage()
    {
        $lifeStage = $this->makeLifeStage();
        $this->json('GET', '/api/v1/lifeStages/'.$lifeStage->id);

        $this->assertApiResponse($lifeStage->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLifeStage()
    {
        $lifeStage = $this->makeLifeStage();
        $editedLifeStage = $this->fakeLifeStageData();

        $this->json('PUT', '/api/v1/lifeStages/'.$lifeStage->id, $editedLifeStage);

        $this->assertApiResponse($editedLifeStage);
    }

    /**
     * @test
     */
    public function testDeleteLifeStage()
    {
        $lifeStage = $this->makeLifeStage();
        $this->json('DELETE', '/api/v1/lifeStages/'.$lifeStage->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/lifeStages/'.$lifeStage->id);

        $this->assertResponseStatus(404);
    }
}
