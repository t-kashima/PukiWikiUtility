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
                $result = array();
                foreach($matches as $match) {
                    $url = $match[1];
                    $title = $match[2];
                    // 稀にEUC-JPのPukiWikiがある
                    // $url = mb_convert_encoding($match[1], 'UTF-8', 'EUC-JP');
                    // $title = mb_convert_encoding($match[2], 'UTF-8', 'EUC-JP');
                    $result[] = array('title' => $title, 'url' => $url);
                }
            }
        }
        return $result;
    }
}

class HttpUtility {
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