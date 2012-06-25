<?php

namespace ProductFeedAdapter\Network;

use ProductFeedAdapter\Network\Network;
use ProductFeedAdapter\Product;



class TradeDoubler extends Network
{
    public function getProducts($from = null, $to = null)
    {
        $products = new \ArrayIterator();

        // Tidy is needed since TradeDoubler sends invalid xml(!)
        $tidy = new \tidy();
        $config = array('wrap' => 0, 'input-xml' => true, 'output-xml' => true );
        $cleanXML = $tidy->repairString($this->feed, $config, 'utf8');

        $dom = new \SimpleXMLElement($cleanXML);

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