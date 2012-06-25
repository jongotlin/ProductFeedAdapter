<?php

namespace ProductFeedAdapter\Network;

use ProductFeedAdapter\Network\Exception\FeedIsEmptyException;
use ProductFeedAdapter\Network\Exception\NetworkNotFoundException;

class NetworkFactory
{
    public static function getNetwork($feed)
    {
    	if (is_null($feed) || '' == $feed) {
	    	throw new FeedIsEmptyException();
    	}
    
        if (false !== strpos($feed, 'adrecord')) {
            return new Adrecord($feed);
        } else if (false !== strpos($feed, 'tradedoubler')) {
            return new TradeDoubler($feed);
        } else if (false !== strpos($feed, 'adtraction')) {
            return new AdTraction($feed);
        } else if (false !== strpos($feed, 'zanox')) {
            return new Zanox($feed);
        }

        throw new NetworkNotFoundException();
    }
}