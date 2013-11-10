<?php
require_once(dirname(__DIR__) . '/PukiWikiUtility.class.php');
assert_options(ASSERT_BAIL, 1);
$result = PukiWikiUtility::search('http://pukiwiki.sourceforge.jp/', 'PukiWiki');

assert(isset($results));
assert(is_array($results));
foreach($results as $result) {
    assert(array_key_exists('title', $result));
    assert(array_key_exists('url', $result));
}

echo 'test ok' . PHP_EOL;



