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

    }

    protected function request($url)
    {

    }

    public function parseHtml($html)
    {

    }
}