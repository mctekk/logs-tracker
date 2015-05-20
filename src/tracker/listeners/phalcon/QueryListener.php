<?php namespace Tracker\Listeners\Phalcon;

use Monolog\Logger;

class QueryListener extends \Phalcon\Mvc\User\Plugin
{
    use \Tracker\Handler\TLogHandler;

    /**
     * This is executed if the event triggered is 'beforeQuery'
     */
    public function beforeQuery($event, $connection)
    {
        $this->log('DB', $connection->getSQLStatement(), Logger::INFO);
    }

    /**
     * This is executed if the event triggered is 'afterQuery'
     */
    public function afterQuery($event, $connection)
    {}
}