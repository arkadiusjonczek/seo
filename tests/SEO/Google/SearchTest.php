<?php

namespace SEO\Google;

class SearchTest extends \PHPUnit\Framework\TestCase
{
    public function testGenerateUrl()
    {
        $class = new \ReflectionClass('SEO\Google\Search');
        $method = $class->getMethod('generateUrl');
        $method->setAccessible(true);

        $country = 'de';
        $language = 'de';
        $searchCriteria = new SearchCriteria('foobar');

        $search = new Search($country, $language, $searchCriteria);
        $url = $method->invokeArgs($search, []);

        $this->assertEquals(
            'https://www.google.de/search?oe=utf-8&pws=0&complete=0&hl=de&num=100&q=foobar',
            $url
        );
    }

    public function testRequest()
    {
        $class = new \ReflectionClass('SEO\Google\Search');
        $method = $class->getMethod('request');
        $method->setAccessible(true);

        $country = 'de';
        $language = 'de';
        $searchCriteria = new SearchCriteria('foobar');

        $search = new Search($country, $language, $searchCriteria);

        $url = 'https://www.google.de/search?oe=utf-8&pws=0&complete=0&hl=de&num=100&q=foobar';
        $html = $method->invokeArgs($search, [$url]);

        $this->assertThat($html, \PHPUnit\Framework\Assert::isType('string'));
        $this->assertThat($html, \PHPUnit\Framework\Assert::stringContains('<!doctype html>'));
    }

    public function testParseHtml()
    {
        $class = new \ReflectionClass('SEO\Google\Search');

        $method1 = $class->getMethod('request');
        $method1->setAccessible(true);

        $method2 = $class->getMethod('parseHtml');
        $method2->setAccessible(true);

        $country = 'de';
        $language = 'de';
        $searchCriteria = new SearchCriteria('foobar');

        $search = new Search($country, $language, $searchCriteria);

        $url = 'https://www.google.de/search?oe=utf-8&pws=0&complete=0&hl=de&num=100&q=foobar';
        $html = $method1->invokeArgs($search, [$url]);

        $searchResult = $method2->invokeArgs($search, [$html]);

        print_r($searchResult);
    }
}