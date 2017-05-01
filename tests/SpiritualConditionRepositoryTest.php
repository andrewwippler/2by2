<?php

use Tests\TestCase;
use Tests\ApiTestTrait;
use Tests\Traits\MakeSpiritualConditionTrait;
use App\Models\SpiritualCondition;
use App\Repositories\SpiritualConditionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SpiritualConditionRepositoryTest extends TestCase
{
    use MakeSpiritualConditionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SpiritualConditionRepository
     */
    protected $spiritualConditionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->spiritualConditionRepo = App::make(SpiritualConditionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSpiritualCondition()
    {
        $spiritualCondition = $this->fakeSpiritualConditionData();
        $createdSpiritualCondition = $this->spiritualConditionRepo->create($spiritualCondition);
        $createdSpiritualCondition = $createdSpiritualCondition->toArray();
        $this->assertArrayHasKey('id', $createdSpiritualCondition);
        $this->assertNotNull($createdSpiritualCondition['id'], 'Created SpiritualCondition must have id specified');
        $this->assertNotNull(SpiritualCondition::find($createdSpiritualCondition['id']), 'SpiritualCondition with given id must be in DB');
        $this->assertModelData($spiritualCondition, $createdSpiritualCondition);
    }

    /**
     * @test read
     */
    public function testReadSpiritualCondition()
    {
        $spiritualCondition = $this->makeSpiritualCondition();
        $dbSpiritualCondition = $this->spiritualConditionRepo->find($spiritualCondition->id);
        $dbSpiritualCondition = $dbSpiritualCondition->toArray();
        $this->assertModelData($spiritualCondition->toArray(), $dbSpiritualCondition);
    }

    /**
     * @test update
     */
    public function testUpdateSpiritualCondition()
    {
        $spiritualCondition = $this->makeSpiritualCondition();
        $fakeSpiritualCondition = $this->fakeSpiritualConditionData();
        $updatedSpiritualCondition = $this->spiritualConditionRepo->update($fakeSpiritualCondition, $spiritualCondition->id);
        $this->assertModelData($fakeSpiritualCondition, $updatedSpiritualCondition->toArray());
        $dbSpiritualCondition = $this->spiritualConditionRepo->find($spiritualCondition->id);
        $this->assertModelData($fakeSpiritualCondition, $dbSpiritualCondition->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSpiritualCondition()
    {
        $spiritualCondition = $this->makeSpiritualCondition();
        $resp = $this->spiritualConditionRepo->delete($spiritualCondition->id);
        $this->assertTrue($resp);
        $this->assertNull(SpiritualCondition::find($spiritualCondition->id), 'SpiritualCondition should not exist in DB');
    }
}
