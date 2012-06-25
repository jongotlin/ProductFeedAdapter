<?php

namespace ProductFeedAdapter\Test;

use ProductFeedAdapter\Network\NetworkFactory;
use ProductFeedAdapter\Network\AdTraction;
use ProductFeedAdapter\Product;

class AdTractionTest extends \PHPUnit_Framework_TestCase
{

    private $adtraction;
    private $product;
    private $adtractionWithDummyFeed;

    public function setUp()
    {
        
        $feed = '<?xml version="1.0" encoding="UTF-8"?>
<productFeed
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:noNamespaceSchemaLocation="http://www.adtraction.com/schemas/productfeedschema.xsd">
  <product>
    <SKU>48343</SKU>
    <Name>DC Grande Premium Zip Hood</Name>
    <Description>Härlig Zip Hood från DC. Magficka, och metall logga på bröstet.

80% Bomull
20% Polyester
Tvätt: 30 grader

Modellen är 181 och fotograferad i Large.</Description>
    <Category>Tröjor  -  Zip Hoods</Category>
    <Price>699</Price>
    <Shipping>49</Shipping>
    <Currency>SEK</Currency>
    <Instock>yes</Instock>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=24156984&amp;t=2&amp;tk=1&amp;epi=DC+Grande+Premium+Zip+Hood&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
    <Brand>DC</Brand>
  </product>
</productFeed>';



        $this->adtraction = new AdTraction($feed);

        $products = $this->adtraction->getProducts();
        $this->product = $products[0];




        $dummyFeed = '<?xml version="1.0" encoding="UTF-8"?>
<productFeed
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:noNamespaceSchemaLocation="http://www.adtraction.com/schemas/productfeedschema.xsd">
  <product>
    <Name>Produkt 1</Name>
    <Description>Foo</Description>
    <Price>699</Price>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=24156984&amp;t=2&amp;tk=1&amp;epi=DC+Grande+Premium+Zip+Hood&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
  </product>
  <product>
    <Name>Produkt 2</Name>
    <Description>Foo</Description>
    <Price>699</Price>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=24156984&amp;t=2&amp;tk=1&amp;epi=DC+Grande+Premium+Zip+Hood&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
  </product>
  <product>
    <Name>Produkt 3</Name>
    <Description>Foo</Description>
    <Price>699</Price>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=24156984&amp;t=2&amp;tk=1&amp;epi=DC+Grande+Premium+Zip+Hood&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
  </product>
  <product>
    <Name>Produkt 4</Name>
    <Description>Foo</Description>
    <Price>699</Price>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=24156984&amp;t=2&amp;tk=1&amp;epi=DC+Grande+Premium+Zip+Hood&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
  </product>
  <product>
    <Name>Produkt 5</Name>
    <Description>Foo</Description>
    <Price>699</Price>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=24156984&amp;t=2&amp;tk=1&amp;epi=DC+Grande+Premium+Zip+Hood&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
  </product>
  <product>
    <Name>Produkt 6</Name>
    <Description>Foo</Description>
    <Price>699</Price>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=24156984&amp;t=2&amp;tk=1&amp;epi=DC+Grande+Premium+Zip+Hood&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
  </product>
  <product>
    <Name>Produkt 7</Name>
    <Description>Foo</Description>
    <Price>699</Price>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=24156984&amp;t=2&amp;tk=1&amp;epi=DC+Grande+Premium+Zip+Hood&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
  </product>
  <product>
    <Name>Produkt 8</Name>
    <Description>Foo</Description>
    <Price>699</Price>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=24156984&amp;t=2&amp;tk=1&amp;epi=DC+Grande+Premium+Zip+Hood&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
  </product>
  <product>
    <Name>Produkt 9</Name>
    <Description>Foo</Description>
    <Price>699</Price>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=24156984&amp;t=2&amp;tk=1&amp;epi=DC+Grande+Premium+Zip+Hood&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
  </product>
  <product>
    <Name>Produkt 10</Name>
    <Description>Foo</Description>
    <Price>699</Price>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=24156984&amp;t=2&amp;tk=1&amp;epi=DC+Grande+Premium+Zip+Hood&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
  </product>
  <product>
    <Name>Produkt 11</Name>
    <Description>Foo</Description>
    <Price>699</Price>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=24156984&amp;t=2&amp;tk=1&amp;epi=DC+Grande+Premium+Zip+Hood&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
  </product>
  <product>
    <Name>Produkt 12</Name>
    <Description>Foo</Description>
    <Price>699</Price>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=24156984&amp;t=2&amp;tk=1&amp;epi=DC+Grande+Premium+Zip+Hood&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
  </product>
</productFeed>';

        $this->adtractionWithDummyFeed = new AdTraction($dummyFeed);


    }

    public function testProductTexts()
    {

        $this->assertEquals('DC Grande Premium Zip Hood', $this->product->getName());
        $description = 'Härlig Zip Hood från DC. Magficka, och metall logga på bröstet.

80% Bomull
20% Polyester
Tvätt: 30 grader

Modellen är 181 och fotograferad i Large.';
        $this->assertEquals($description, $this->product->getDescription());
    }

    

    public function testProductPrice()
    {
        $this->assertEquals(699, $this->product->getPrice());
    }

    public function testProductUrl()
    {
        $this->assertEquals('http://track.adtraction.com/t/t?a=29137242&as=24156984&t=2&tk=1&epi=&url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood', $this->product->getTrackingUrl());
        $this->assertEquals('http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood', $this->product->getProductUrl());
    }

    public function testEpi()
    {
        $epi = 'Myepi';
        $this->assertEquals('http://track.adtraction.com/t/t?a=29137242&as=24156984&t=2&tk=1&epi='.$epi.'&url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood', $this->product->getTrackingUrl($epi));
    }

    public function testEpiWithUrlEncoding()
    {
        $epi = 'My epi';
        $this->assertEquals('http://track.adtraction.com/t/t?a=29137242&as=24156984&t=2&tk=1&epi='.urlencode($epi).'&url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood', $this->product->getTrackingUrl($epi));
    }

    public function testGraphicUrl()
    {
        $this->assertEquals('http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg', $this->product->getGraphicUrl());
    }

    public function testFeedWithNoEpi()
    {


        $feedWithNoEpi = '<productFeed
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:noNamespaceSchemaLocation="http://www.adtraction.com/schemas/productfeedschema.xsd">
  <product>
    <SKU>48343</SKU>
    <Name>DC Grande Premium Zip Hood</Name>
    <Description>Härlig Zip Hood från DC. Magficka, och metall logga på bröstet.

80% Bomull
20% Polyester
Tvätt: 30 grader

Modellen är 181 och fotograferad i Large.</Description>
    <Category>Tröjor  -  Zip Hoods</Category>
    <Price>699</Price>
    <Shipping>49</Shipping>
    <Currency>SEK</Currency>
    <Instock>yes</Instock>
    <ProductUrl>http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</ProductUrl>
    <ImageUrl>http://www.boardstore.se/assets/img/items/08811f82-565a-41c6-8ef7-933f8e7dde85.jpg</ImageUrl>
    <TrackingUrl>http://track.adtraction.com/t/t?a=29137242&amp;as=680860723&amp;t=2&amp;tk=1&amp;url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood</TrackingUrl>
    <Brand>DC</Brand>
  </product>
</productFeed>';

        $adtraction = new AdTraction($feedWithNoEpi);

        $products = $this->adtraction->getProducts();
        $product = $products[0];

        $this->assertEquals('http://track.adtraction.com/t/t?a=29137242&as=24156984&t=2&tk=1&epi=&url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood', $this->product->getTrackingUrl());
        $epi = 'foo';
        $this->assertEquals('http://track.adtraction.com/t/t?a=29137242&as=24156984&t=2&tk=1&epi='.$epi.'&url=http://www.boardstore.se/item/48343-DC-Grande-Premium-Zip-Hood', $this->product->getTrackingUrl($epi));

    }



    public function testGetAllProducts()
    {
        $products = $this->adtractionWithDummyFeed->getProducts();
        $this->assertEquals(12, $products->count());

        $products = $this->adtractionWithDummyFeed->getProducts(0);
        $this->assertEquals(12, $products->count());

        $products = $this->adtractionWithDummyFeed->getProducts(0, 12);
        $this->assertEquals(12, $products->count());
    }

    public function testGetSelectedProducts()
    {
        $products = $this->adtractionWithDummyFeed->getProducts(0,1);
        $this->assertEquals(2, $products->count());
        $this->assertEquals('Produkt 1', $products[0]->getName());
        $this->assertEquals('Produkt 2', $products[1]->getName());

        $products = $this->adtractionWithDummyFeed->getProducts(3,5);
        $this->assertEquals(3, $products->count());
        $this->assertEquals('Produkt 4', $products[0]->getName());
        $this->assertEquals('Produkt 5', $products[1]->getName());
        $this->assertEquals('Produkt 6', $products[2]->getName());

    }

}