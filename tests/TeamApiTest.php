<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamApiTest extends TestCase
{
    use MakeTeamTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTeam()
    {
        $team = $this->fakeTeamData();
        $this->json('POST', '/api/v1/teams', $team);

        $this->assertApiResponse($team);
    }

    /**
     * @test
     */
    public function testReadTeam()
    {
        $team = $this->makeTeam();
        $this->json('GET', '/api/v1/teams/'.$team->id);

        $this->assertApiResponse($team->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTeam()
    {
        $team = $this->makeTeam();
        $editedTeam = $this->fakeTeamData();

        $this->json('PUT', '/api/v1/teams/'.$team->id, $editedTeam);

        $this->assertApiResponse($editedTeam);
    }

    /**
     * @test
     */
    public function testDeleteTeam()
    {
        $team = $this->makeTeam();
        $this->json('DELETE', '/api/v1/teams/'.$team->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/teams/'.$team->id);

        $this->assertResponseStatus(404);
    }
}
