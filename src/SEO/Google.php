<?php

namespace SEO;

use SEO\Google\Search;
use SEO\Google\SearchCriteria;

class Google
{
    protected $country;
    protected $language;

    public function __construct($country, $language)
    {
        $this->country  = $country;
        $this->language = $language;
    }

    public function search(SearchCriteria $searchCriteria)
    {
        return new Search(
            $this->country,
            $this->language,
            $searchCriteria
        );
    }
}