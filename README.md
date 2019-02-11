# SEO [![Build Status](https://img.shields.io/travis/arkadiusjonczek/seo.svg)](https://travis-ci.org/arkadiusjonczek/seo)

SEO Command and PHP Library to check your position for a specified keyword and more...

## Installation

```bash
composer require arkadiusjonczek/seo
```

## Basic Usage

```php
<?php

use SEO\Google;
use SEO\Google\SearchCriteria;

$country  = 'de';
$language = 'de';
$searchCriteria = new SearchCriteria('hello world');

$google = new Google($country, $language);
$search = $google->search($searchCriteria);

$searchResult = $search->getResult();

print_r($searchResult);
```

## CLI Usage

```bash
./seo
```

## Supported Search Engines

- Google