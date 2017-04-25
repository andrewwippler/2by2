<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PersonApiTest extends TestCase
{
    use MakePersonTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePerson()
    {
        $person = $this->fakePersonData();
        $this->json('POST', '/api/v1/people', $person);

        $this->assertApiResponse($person);
    }

    /**
     * @test
     */
    public function testReadPerson()
    {
        $person = $this->makePerson();
        $this->json('GET', '/api/v1/people/'.$person->id);

        $this->assertApiResponse($person->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePerson()
    {
        $person = $this->makePerson();
        $editedPerson = $this->fakePersonData();

        $this->json('PUT', '/api/v1/people/'.$person->id, $editedPerson);

        $this->assertApiResponse($editedPerson);
    }

    /**
     * @test
     */
    public function testDeletePerson()
    {
        $person = $this->makePerson();
        $this->json('DELETE', '/api/v1/people/'.$person->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/people/'.$person->id);

        $this->assertResponseStatus(404);
    }
}
