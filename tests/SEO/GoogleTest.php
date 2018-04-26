<?php

namespace SEO;

use SEO\Google\SearchCriteria;
use SEO\Google\Search;

class GoogleTest extends \PHPUnit\Framework\TestCase
{
    public function testSearch()
    {
        $searchCriteria = new SearchCriteria();

        $google = new Google('de', 'de');
        $search = $google->search($searchCriteria);

        $this->assertInstanceOf(Search::class, $search);
    }
}