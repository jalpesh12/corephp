<?php

namespace TestApp\Tests\Unit;

use PHPUnit\Framework\TestCase;
use TestApp\Logger\Logging;
use TestApp\Application\Application;

class ApplicationTest extends TestCase 
{
    public function testThatRunLogsApplicationStart() 
    {
        // create the observer
        $mock = $this->createMock(Logging::class);
        $mock->expects($this->once())
            ->method('log')
            ->with('Application has started');

        // run the application with the observer which ensures the log method was called
        $app = new Application();
        $app->run($mock);
    }

}