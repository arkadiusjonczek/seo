<?php

namespace SEO\Google;

class SearchResult implements \Iterator, \ArrayAccess, \Serializable
{
    protected $entries;

    public function __construct(array $entries)
    {
        $this->entries = $entries;
    }

    public function getEntries()
    {
        return $this->entries;
    }

    public function getPosition($domain)
    {
        $items = [];

        foreach ($this->entries as $position => $item) {
            if (strpos($item['url'], sprintf('http://%s', $domain)) !== false ||
                strpos($item['url'], sprintf('https://%s', $domain)) !== false) {
                $items[$position + 1] = $item;
            }
        }

        if (empty($items)) {
            throw new Exception('No domain found for this Search Result.');
        }

        return $items;
    }

    public function current()
    {
        // TODO: Implement current() method.
    }

    public function next()
    {
        // TODO: Implement next() method.
    }

    public function key()
    {
        // TODO: Implement key() method.
    }

    public function valid()
    {
        // TODO: Implement valid() method.
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }
}