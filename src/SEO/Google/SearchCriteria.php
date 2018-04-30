<?php

namespace SEO\Google;

class SearchCriteria
{
    protected $keyword;

    public function __construct($keyword)
    {
        $this->keyword = $keyword;
    }

    public function getKeyword()
    {
        return $this->keyword;
    }
}