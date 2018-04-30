# seo-lib [![Build Status](https://img.shields.io/travis/arkadiusjonczek/seo-lib.svg)](https://travis-ci.org/arkadiusjonczek/seo-lib)

SEO PHP Library to check your position for a specified keyword and more...

## Supported Search Engines

- Google

## Example

```php
$country  = 'de';
$language = 'de';
$searchCriteria = new SearchCriteria('hello world');

$google = new Google($country, $language);
$search = $google->search($searchCriteria);

$searchResult = $search->getResult();

print_r($searchResult);
```

## Projects

- [SEO-CLI](https://github.com/arkadiusjonczek/seo-cli)