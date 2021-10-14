<?php
/**
 * SampleObject.php
 *
 * @version 1.0
 * @author Dana Luther <dluther@envisageinternational.com>
 */

namespace Example;


class SampleObjectMoreSecure
{
	private string $_myApiKey = 'ABC1234';

	public function connect()
	{
		// Do something with $myApiKey here
	}
}