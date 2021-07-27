<?php
namespace TestApp\Application;
use TestApp\Logger\Logging;

class Application {
    
    public function run(Logging $logger) {
        // some code that starts up the application
    
        // send out a log that the application has started
        $logger->log('Application has started');
      }
}
