<?php
class PukiWikiUtility {
    // 指定されたURLのWikiでの検索結果を配列で返す
    public static function search($baseurl, $word, $type = 'AND') {
        $url = $baseurl . '?cmd=search';
        $dict = array(
                      'word' => $word,
                      'type' => $type
                      );
        $content = HttpUtility::requestPost($url, $dict);
        
        $result = NULL;
        if (preg_match('/<div id="body">.*?<ul>(.+?)<\/ul>/ms', $content, $matches) === 1) {
            $list_str = $matches[1];
            $matches = NULL;
            if (preg_match_all('/.+?href="(.+?)">(.+?)<\/a>/', $list_str, $matches, PREG_SET_ORDER) > 0) {
                $result = $matches;
            }
        }
        return $result;
    }
}

class HttpUtility {
    // This method is http_build_query.
    /* public static function paramsFromDictionary($dictionary) { */
    /*     $params = array(); */
    /*     foreach ($dictionary as $k => $v) { */
    /*         $params[] = $k . '='. urlencode($v); */
    /*     } */
    /*     $param = implode('&', $params); */
    /*     return $param; */
    /* } */

    public static function requestPost($url, $dict) {
        $query = http_build_query($dict);
        $headers = array(
                         'Content-Type: application/x-www-form-urlencoded ',
                         'Content-Length: ' . strlen($query)
        );
        
        $context = array('http' => array(
                                         'method' => 'POST',
                                         'header' => implode("\r\n", $headers),
                                         'content' => $query
                                         )
                         );
        $content = file_get_contents($url, false, stream_context_create($context));
        return $content;
    }
}