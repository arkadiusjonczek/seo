<?php

namespace SEO\Google;

use SEO\Google;

class SearchTest extends \PHPUnit\Framework\TestCase
{
    public function testSearch()
    {
        $searchCriteria = new SearchCriteria('foobar');

        $google = new Google('de', 'de');

        /** @var Search $search */
        $search = $google->search($searchCriteria);

        /** @var SearchResult $result */
        $result = $search->getResult();

        /** @var array $entries */
        $entries = $result->getEntries();

        // since google add rich snippets to the results page
        // we don't have exactly 100 result entries per search query
        $this->assertTrue(count($entries) >= 97);
    }
}