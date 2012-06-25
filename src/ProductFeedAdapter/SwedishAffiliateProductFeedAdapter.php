<?php

namespace ProductFeedAdapter;

use ProductFeedAdapter\Network\NetworkFactory;

class SwedishAffiliateProductFeedAdapter
{
    protected $feed;

    public function __construct($feed)
    {
        $this->feed = $feed;
    }

    public function getNetwork()
    {
    	return NetworkFactory::getNetwork($this->feed);
    }
}