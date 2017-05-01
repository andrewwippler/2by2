<?php

use Tests\TestCase;
use Tests\Traits\MakeVisitTypeTrait;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VisitTypeApiTest extends TestCase
{
    use MakeVisitTypeTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVisitType()
    {
        $visitType = $this->fakeVisitTypeData();
        $response = $this->json('POST', '/api/v1/visittypes', $visitType);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testReadVisitType()
    {
        $visitType = $this->makeVisitType();
        $response = $this->json('GET', '/api/v1/visittypes/'.$visitType->id);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testUpdateVisitType()
    {
        $visitType = $this->makeVisitType();
        $editedVisitType = $this->fakeVisitTypeData();

        $response = $this->json('PUT', '/api/v1/visittypes/'.$visitType->id, $editedVisitType);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testDeleteVisitType()
    {
        $visitType = $this->makeVisitType();
        $response = $this->json('DELETE', '/api/v1/visittypes/'.$visitType->id);

        $response->assertStatus(200);
        $response = $this->json('GET', '/api/v1/visittypes/'.$visitType->id);

        $response->assertStatus(404);
    }
}
