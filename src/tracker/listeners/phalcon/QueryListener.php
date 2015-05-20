<?php namespace Tracker\Listeners\Phalcon;

use Monolog\Logger;

class QueryListener extends \Phalcon\Mvc\User\Plugin
{
    use \Tracker\Handler\TLogHandler;

    /**
     * Execute when the event 'afterConnect' trigger
     */
    public function afterConnect()
    {}

    /**
     * Execute when the event 'beforeQuery' trigger
     */
    public function beforeQuery($event, $connection)
    {
        $this->log($connection->getRealSQLStatement(), Logger::INFO, $connection->getErrorInfo());
    }

    /**
     * Execute when the event 'afterQuery' trigger
     */
    public function afterQuery($event, $connection)
    {}
}