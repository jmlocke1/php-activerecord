<?php
namespace ActiveRecord;

use ActiveRecord\Exceptions\CacheException;



class Memcache
{
	const DEFAULT_PORT = 11211;

	private $memcache;

	/**
	 * Creates a Memcache instance.
	 *
	 * Takes an $options array w/ the following parameters:
	 *
	 * <ul>
	 * <li><b>host:</b> host for the memcache server </li>
	 * <li><b>port:</b> port for the memcache server </li>
	 * </ul>
	 * @param array $options
	 */
	public function __construct($options)
	{
		$this->memcache = new \Memcache();
		$options['port'] = isset($options['port']) ? $options['port'] : self::DEFAULT_PORT;

		if (!@$this->memcache->connect($options['host'], $options['port'])) {
			if ($error = error_get_last()) {
				$message = $error['message'];
			} else {
				$message = sprintf('Could not connect to %s:%s', $options['host'], $options['port']);
			}
			throw new CacheException($message);
		}
	}

	public function flush()
	{
		$this->memcache->flush();
	}

	public function read($key)
	{
		return $this->memcache->get($key);
	}

	public function write($key, $value, $expire)
	{
		$this->memcache->set($key,$value,null,$expire);
	}

	public function delete($key)
	{
		$this->memcache->delete($key);
	}
}
