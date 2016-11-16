<?php

namespace ProductFeedAdapter\Network;

use ProductFeedAdapter\Network\Network;
use ProductFeedAdapter\Product;



class TradeDoubler extends Network
{
    public function getProducts($from = null, $to = null)
    {
        $products = new \ArrayIterator();

        // TradeDoubler might send invalid xml. Use Tidy if exist to fix it.
        if (class_exists('\tidy')) {
            $tidy = new \tidy();
            $config = array('wrap' => 0, 'input-xml' => true, 'output-xml' => true);
            $xml = $tidy->repairString($this->feed, $config, 'utf8');
        } else {
            $xml = $this->feed;
        }

        $dom = new \SimpleXMLElement($xml);

        $i = 0;
        foreach ($dom->product as $feedProduct) {
            if ((is_null($from) || $i >= $from) && (is_null($to) || $i <= $to)) {
                $product = new Product();
                
                $product->setName($feedProduct->name);

                $product->setDescription((string)$feedProduct->description);
                $product->setPrice($feedProduct->price);
                $product->setTrackingUrl($this->prepareTrackingUrl($feedProduct->productUrl));
                $product->setProductUrl($feedProduct->advertiserProductUrl);
                $product->setGraphicUrl($feedProduct->imageUrl);
                $products->append($product);
            }
            $i++;
        }

        return $products;
    }

    protected function prepareTrackingUrl($trackingUrl)
    {
        return str_replace(')url(', ')epi('.Product::EPI_REPLACE_STRING.')url(', $trackingUrl);
    }

}
