<?php

namespace TestApp\Tests\Unit;

use PHPUnit\Framework\TestCase;
use TestApp\Logger\Logging;

class LoggingTest extends TestCase 
{
    public function testLog() 
    {

        $expected = 'This is a test message';
        $this->expectOutputString($expected);

        $logging = new Logging();
        $logging->log('This is a test message');
    }
}