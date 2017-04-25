<?php

use App\Models\Person;
use App\Repositories\PersonRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PersonRepositoryTest extends TestCase
{
    use MakePersonTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PersonRepository
     */
    protected $personRepo;

    public function setUp()
    {
        parent::setUp();
        $this->personRepo = App::make(PersonRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePerson()
    {
        $person = $this->fakePersonData();
        $createdPerson = $this->personRepo->create($person);
        $createdPerson = $createdPerson->toArray();
        $this->assertArrayHasKey('id', $createdPerson);
        $this->assertNotNull($createdPerson['id'], 'Created Person must have id specified');
        $this->assertNotNull(Person::find($createdPerson['id']), 'Person with given id must be in DB');
        $this->assertModelData($person, $createdPerson);
    }

    /**
     * @test read
     */
    public function testReadPerson()
    {
        $person = $this->makePerson();
        $dbPerson = $this->personRepo->find($person->id);
        $dbPerson = $dbPerson->toArray();
        $this->assertModelData($person->toArray(), $dbPerson);
    }

    /**
     * @test update
     */
    public function testUpdatePerson()
    {
        $person = $this->makePerson();
        $fakePerson = $this->fakePersonData();
        $updatedPerson = $this->personRepo->update($fakePerson, $person->id);
        $this->assertModelData($fakePerson, $updatedPerson->toArray());
        $dbPerson = $this->personRepo->find($person->id);
        $this->assertModelData($fakePerson, $dbPerson->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePerson()
    {
        $person = $this->makePerson();
        $resp = $this->personRepo->delete($person->id);
        $this->assertTrue($resp);
        $this->assertNull(Person::find($person->id), 'Person should not exist in DB');
    }
}
