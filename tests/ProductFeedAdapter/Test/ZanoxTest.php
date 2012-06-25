<?php

namespace ProductFeedAdapter\Test;

use ProductFeedAdapter\Network\NetworkFactory;
use ProductFeedAdapter\Network\Zanox;
use ProductFeedAdapter\Product;

class ZanoxTest extends \PHPUnit_Framework_TestCase
{

    private $zanox;
    private $product;

    public function setUp()
    {
        
        $feed = '<?xml version="1.0" encoding="utf-8"?>
<products xmlns="http://zanox.com/productdata/exportservice/v1" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://zanox.com/productdata/exportservice/v1 http://productdata.zanox.com/exportservice/schema/export-1.0.xsd">
    <product zupid="66e584ec396cb80ef1ce9b275e5f6aa8">
        <name>Bälte</name>
        <program>3633</program>
        <number>www.laredoute.se/d/Accessoarer-Balten-skarp/ActiveWear/_/N-1z141</number>
        <description>Skinn med effekt av två material. Spänne och nitar i patinerad metall. Bredd 3,8 cm. Midjemått i cm.</description>
        <manufacturer>Active Wear</manufacturer>
        <price>226.85</price>
        <oldPrice>349.00</oldPrice>
        <shippingHandling>10 juni</shippingHandling>
        <shippingHandlingCost>44.90</shippingHandlingCost>
        <lastModified>2012-05-23T08:38:00</lastModified>
        <smallImage>http://media.redcatsnordic.com/images/products/thumb_lr/32421/324219343-a8b7bc8f-3caf-45a9-8e15-f41018a3c3da.jpg</smallImage>
        <mediumImage>http://media.redcatsnordic.com/images/products/push_large_lr/32421/324219343-a8b7bc8f-3caf-45a9-8e15-f41018a3c3da.jpg</mediumImage>
        <largeImage>http://media.redcatsnordic.com/images/products/normal_lr/32421/324219343-a8b7bc8f-3caf-45a9-8e15-f41018a3c3da.jpg</largeImage>
        <currencyCode>SEK</currencyCode>
        <extra1>På lager</extra1>
        <extra2>Herr</extra2>
        <extra3>Brun</extra3>
        <merchantCategory>Accessoarer / Bälten &amp; skärp</merchantCategory>
        <deepLink>http://ad.zanox.com/ppc/?13691138C1760332445&amp;ULP=[[Accessoarer-Balten-skarp/ActiveWear/_/N-1z141ptZ1z1414w?Nr=327682]]</deepLink>
    </product>
</products>';

        $this->zanox = new Zanox($feed);

        $products = $this->zanox->getProducts();
        $this->product = $products[0];
    }

    public function testProductTexts()
    {

        $this->assertEquals('Bälte', $this->product->getName());
        $description = 'Skinn med effekt av två material. Spänne och nitar i patinerad metall. Bredd 3,8 cm. Midjemått i cm.';
        $this->assertEquals($description, $this->product->getDescription());
    }

    public function testProductPrice()
    {
        $this->assertEquals(226.85, $this->product->getPrice());
    }

    public function testProductUrl()
    {
        $this->assertEquals('http://ad.zanox.com/ppc/?13691138C1760332445&ULP=[[Accessoarer-Balten-skarp/ActiveWear/_/N-1z141ptZ1z1414w?Nr=327682]]', $this->product->getTrackingUrl());
        $this->assertNull($this->product->getProductUrl());
    }

    public function testGraphicUrl()
    {
        $this->assertEquals('http://media.redcatsnordic.com/images/products/normal_lr/32421/324219343-a8b7bc8f-3caf-45a9-8e15-f41018a3c3da.jpg', $this->product->getGraphicUrl());
    }


}