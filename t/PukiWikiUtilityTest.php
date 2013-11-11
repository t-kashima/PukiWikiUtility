<?php
require_once(dirname(__DIR__) . '/PukiWikiUtility.class.php');

class PukiWikiUtilityTest extends PHPUnit_Framework_TestCase {
    private $results;
    public function setUp() {
        $this->results = PukiWikiUtility::search('http://pukiwiki.sourceforge.jp/', 'PukiWiki');
    }

    /**
     * @test
     */
    public function isArray() {
        $this->assertTrue(is_array($this->results));
    }

    /**
     * @test
     */
    public function allResultsHaveTitle() {
        foreach($this->results as $result) {
            $this->assertTrue(array_key_exists('title', $result));
        }
    }

    /**
     * @test
     */
    public function allResultsHaveUrl() {
        foreach($this->results as $result) {
            $this->assertTrue(array_key_exists('url', $result));
        }
    }
}