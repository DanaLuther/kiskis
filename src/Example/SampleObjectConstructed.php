<?php
/**
 * SampleObject.php
 *
 * @version 1.0
 * @author Dana Luther <dluther@envisageinternational.com>
 */

namespace Example;


class SampleObjectConstructed
{
	private string $_myApiKey;

	public function __construct(string $apiKey)
	{
		$this->_myApiKey = $apiKey;
	}

	public function connect()
	{
		// Do something with $this->_myApiKey here
	}
}