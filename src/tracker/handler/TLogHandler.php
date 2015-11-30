<?php namespace Tracker\Handler;

use Monolog\Logger;
use Monolog\Handler\HandlerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

trait TLogHandler
{
	/**
	 * Instance of monolog
	 *
	 * @var Monolog\Logger
	 */
	public static $logger;

	/**
	 * Common function to log, wrapper for comunicate with monolog
	 *
	 * @param string $channel The loggin channel
	 * @param string $message The log message
	 * @param integer $level The level to log [optional]
	 * @param array $context The log context
	 * @return void
	 * @todo Add custom way for log location
	 */
    public function log($message, $level = Logger::DEBUG, array $context = [])
    {
    	self::$logger->log($level, $message, $context);
    }

    /**
     * Initialize the log manager using custom handler
     *
     * @param string $name The loggin channel
     * @param  HandlerInterface $handler Handler to be user to save the log
     * @return void
     */
    public static function listen($name, HandlerInterface $handler)
    {
    	if (null === self::$logger)
	        self::$logger = new Logger($name);

 		self::$logger->pushHandler($handler);
    }
}
