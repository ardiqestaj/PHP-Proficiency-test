<?php

namespace App;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class TestFoo extends CIUnitTestCase
{
    use FeatureTestTrait;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testRequest(){

        $result = $this->call('get', '/');
        $result1 = $this->call('post', '/read-data');
        $result2 = $this->call('post', '/import-data');

        $result = assertOK();
        $result1 = assertOK();
        $result2 = assertOK();

    }
}