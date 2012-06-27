Product Feed Adapter
====================

[![Build Status](https://secure.travis-ci.org/jongotlin/ProductFeedAdapter.png)](http://travis-ci.org/jongotlin/ProductFeedAdapter)

Use this adapter with any product feed from Adrecord, TradeDoubler, Zanox or Adtraction.

    $feed = file_get_contents('http://feed.adrecord.com/foo.json?id=bar');
    $productFeedAdapter = new ProductFeedAdapter($feed);
    $network = $productFeedAdapter->getNetwork();
    foreach ($network->getProducts(0, 10) as $product) {
        echo $product->getTrackingUrl();
    }