<?php
namespace CodeIgniter;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

class TestControllerA extends CIUnitTestCase
{
    use ControllerTestTrait;

    public function testEmployeesApi()
    {
        $result = $this->withURI('http://localhost:8080/employees')
            ->controller(\App\Controllers\Employees::Class)
            ->execute('index');

        $this->assertTrue($result->isOK());
    }
}