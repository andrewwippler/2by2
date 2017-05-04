<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\ApiTestTrait;
use Tests\Traits\MakeLifeStageTrait;
use App\Models\LifeStage;
use App\Repositories\LifeStageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LifeStageRepositoryTest extends TestCase
{
    use MakeLifeStageTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LifeStageRepository
     */
    protected $lifeStageRepo;

    public function setUp()
    {
        parent::setUp();
        $this->lifeStageRepo = \App::make(LifeStageRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLifeStage()
    {
        $lifeStage = $this->fakeLifeStageData();
        $createdLifeStage = $this->lifeStageRepo->create($lifeStage);
        $createdLifeStage = $createdLifeStage->toArray();
        $this->assertArrayHasKey('id', $createdLifeStage);
        $this->assertNotNull($createdLifeStage['id'], 'Created LifeStage must have id specified');
        $this->assertNotNull(LifeStage::find($createdLifeStage['id']), 'LifeStage with given id must be in DB');
        $this->assertModelData($lifeStage, $createdLifeStage);
    }

    /**
     * @test read
     */
    public function testReadLifeStage()
    {
        $lifeStage = $this->makeLifeStage();
        $dbLifeStage = $this->lifeStageRepo->find($lifeStage->id);
        $dbLifeStage = $dbLifeStage->toArray();
        $this->assertModelData($lifeStage->toArray(), $dbLifeStage);
    }

    /**
     * @test update
     */
    public function testUpdateLifeStage()
    {
        $lifeStage = $this->makeLifeStage();
        $fakeLifeStage = $this->fakeLifeStageData();
        $updatedLifeStage = $this->lifeStageRepo->update($fakeLifeStage, $lifeStage->id);
        $this->assertModelData($fakeLifeStage, $updatedLifeStage->toArray());
        $dbLifeStage = $this->lifeStageRepo->find($lifeStage->id);
        $this->assertModelData($fakeLifeStage, $dbLifeStage->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLifeStage()
    {
        $lifeStage = $this->makeLifeStage();
        $resp = $this->lifeStageRepo->delete($lifeStage->id);
        $this->assertTrue($resp);
        $this->assertNull(LifeStage::find($lifeStage->id), 'LifeStage should not exist in DB');
    }
}
