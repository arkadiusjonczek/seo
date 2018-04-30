<?php

namespace SEO\Google;

class Search
{
    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var SearchCriteria
     */
    protected $searchCriteria;

    public function __construct($country, $language, $searchCriteria)
    {
        $this->country        = $country;
        $this->language       = $language;
        $this->searchCriteria = $searchCriteria;
    }

    public function getResult()
    {
        $url     = $this->generateUrl();

        $result  = $this->request($url);
        $entries = $this->parseHtml($result);

        return new SearchResult($entries);
    }

    protected function generateUrl()
    {
        switch ($this->country) {
            case 'de':
            default:
                $host = 'www.google.de';
        }

        $url = sprintf(
            'https://%s/search?oe=utf-8&pws=0&complete=0&hl=%s&num=100&q=%s',
            $host,
            $this->language,
            urlencode($this->searchCriteria->getKeyword())
        );

        return $url;
    }

    protected function request($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36',
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Language: de,en-US;q=0.7,en;q=0.3',
            'Cache-Control: max-age=0'
        ));
        $html = curl_exec($ch);
        curl_close($ch);

        return $html;
    }

    public function parseHtml($html)
    {
        $pattern1 = '/<(div|li) class=\"g\"(.+?)<\/(div|li)>/i';
        $pattern2 = '/<(h3|span) class=\"(r|_Tyb)\"><a\shref=\"([\.\/\&\=\:\;\?a-zA-Z0-9]*\".*>(.*)<\/a><\/(h3|span)>/i';

        preg_match_all($pattern1, $html, $listItems);

        $items = [];
        foreach ($listItems[0] as $item) {

            $found = preg_match($pattern2, $item, $matches);
            print_r($found);exit;
            if ($found == 0 || $found == false) {
                continue;
            }

            $url   = $matches[2];
            $title = htmlspecialchars_decode($matches[3]);

            $items[] = [
                'title' => $title,
                'url'   => $url
            ];
        }

        return new SearchResult($items);
    }
}