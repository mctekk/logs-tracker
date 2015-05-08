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
	 * @todo
			- Add custom way for log location
	 */
    public function log($channel, $message, $level = Logger::DEBUG, array $context = [], HandlerInterface $handler = null)
    {
    	if (null === self::$logger)
    	{
	        self::$logger = new Logger($channel);
 			self::$logger->pushHandler((isset($handler))?$handler :(new StreamHandler(__DIR__ . '/../../../logs/app.log', $level)));
    	}

    	self::$logger->log($level, $message, $context);
    }
}