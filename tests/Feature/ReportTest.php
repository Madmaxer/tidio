<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test.
     *
     * @return void
     */
    public function testBasic()
    {
        $response = $this->get('/api/employee');

        $response->assertStatus(200);
    }

    /**
     * A data validation test.
     *
     * @return void
     */
    public function testDataValidation()
    {
        $this->seed();

        $response = $this->get('/api/employee');

        $data = json_decode($response->getContent());

        $this->assertEquals(1, (int) $data[0]->employee_id);
        $this->assertEquals('Jack', $data[0]->first_name);
        $this->assertEquals('Dow', $data[0]->surname);
        $this->assertEquals(1000, (int) $data[0]->salary);
        $this->assertEquals(1, (int) $data[0]->department_id);
        $this->assertEquals('Department 1', $data[0]->department_name);
        $this->assertEquals(100, (int) $data[0]->supplement_amount);
        $this->assertEquals('quota', $data[0]->supplement_type);
        $this->assertEquals(2000, (int) $data[0]->salary_total);

        $this->assertEquals(2, (int) $data[1]->employee_id);
        $this->assertEquals('John', $data[1]->first_name);
        $this->assertEquals('Smith', $data[1]->surname);
        $this->assertEquals(1000, (int) $data[1]->salary);
        $this->assertEquals(2, (int) $data[1]->department_id);
        $this->assertEquals('Department 2', $data[1]->department_name);
        $this->assertEquals(10, (int) $data[1]->supplement_amount);
        $this->assertEquals('percent', $data[1]->supplement_type);
        $this->assertEquals(1100, (int) $data[1]->salary_total);
    }
}
