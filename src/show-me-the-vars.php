<?php
/**
 * show-me-the-vars.php
 *
 * @author Dana Luther <dluther@envisageinternational.com>
 */

echo '<html><head><title>ENV Vars</title></head><body>';

echo '<h1>ENV</h1><pre>';
var_dump($_ENV);
echo '</pre></body></html>';