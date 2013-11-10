<?php
require_once(dirname(__DIR__) . '/PukiWikiUtility.class.php');
assert_options(ASSERT_BAIL, 1);
//$result = PukiWikiUtility::search('http://pukiwiki.sourceforge.jp/', 'PukiWiki');
$results = array(  2513 =>
                  array (
                    'title' => '龍司',
                    'url' => 'http://pukiwiki.sourceforge.jp/?cmd=read&amp;page=%E9%BE%8D%E5%8F%B8&amp;word=PukiWiki',
                  ),
                  2514 =>
                  array (
                    'title' => '２ちゃんねる・ひろゆき敗訴の影響について',
                    'url' => 'http://pukiwiki.sourceforge.jp/?cmd=read&amp;page=%EF%BC%92%E3%81%A1%E3%82%83%E3%82%93%E3%81%AD%E3%82%8B%E3%83%BB%E3%81%B2%E3%82%8D%E3%82%86%E3%81%8D%E6%95%97%E8%A8%B4%E3%81%AE%E5%BD%B1%E9%9F%BF%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6&amp;word=PukiWiki',
                  ),);
assert(isset($results));
assert(is_array($results));
foreach($results as $result) {
    assert(array_key_exists('title', $result));
    assert(array_key_exists('url', $result));
}

echo 'test ok' . PHP_EOL;



