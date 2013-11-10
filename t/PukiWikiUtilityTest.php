<?php
require_once(dirname(__DIR__) . '/PukiWikiUtility.class.php');
$result = PukiWikiUtility::search('http://pukiwiki.sourceforge.jp/', 'PukiWiki');
if (isset($result)) {
    echo 'test ok';
} else {
    echo 'test failed';
}



