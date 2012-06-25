<?php

namespace ProductFeedAdapter\Network;

abstract class Network
{
    protected $feed;

    public function __construct($feed)
    {
        $this->feed = $feed;
    }

    abstract function getProducts($from = null, $to = null);
}