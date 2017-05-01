<?php

use Tests\TestCase;
use Tests\Traits\MakeLifeStageTrait;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LifeStageApiTest extends TestCase
{
    use MakeLifeStageTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLifeStage()
    {
        $lifeStage = $this->fakeLifeStageData();
        $response = $this->json('POST', '/api/v1/lifestages', $lifeStage);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testReadLifeStage()
    {
        $lifeStage = $this->makeLifeStage();
        $response = $this->json('GET', '/api/v1/lifestages/'.$lifeStage->id);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testUpdateLifeStage()
    {
        $lifeStage = $this->makeLifeStage();
        $editedLifeStage = $this->fakeLifeStageData();

        $response = $this->json('PUT', '/api/v1/lifestages/'.$lifeStage->id, $editedLifeStage);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testDeleteLifeStage()
    {
        $lifeStage = $this->makeLifeStage();
        $response = $this->json('DELETE', '/api/v1/lifestages/'.$lifeStage->id);

        $response->assertStatus(200);
        $response = $this->json('GET', '/api/v1/lifestages/'.$lifeStage->id);

        $response->assertStatus(404);
    }
}
