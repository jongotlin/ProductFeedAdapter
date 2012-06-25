<?php

namespace ProductFeedAdapter\Test;

use ProductFeedAdapter\Network\NetworkFactory;
use ProductFeedAdapter\Network\TradeDoubler;
use ProductFeedAdapter\Product;

class TradeDoublerTest extends \PHPUnit_Framework_TestCase
{

    private $tradedoubler;
    private $product;

    public function setUp()
    {
        
        $feed = '<?xml version="1.0" encoding="UTF-8"?>
<products>
    <product>
        <name>Call of Duty: Modern Warfare 3 /X360</name>
        <productUrl>
            http://pdt.tradedoubler.com/click?a(2122225)p(77609)prod(1016720533)ttid(5)url(http%3A%2F%2Fwww.spelbutiken.se%2Fcatalog%2Fproduct%2F68837-call-of-duty--modern-warfare-3--for-x360)
        </productUrl>
        <imageUrl>
            http://www.spelbutiken.se/catalog/product_thumb.php?w=150&img=images/boxshots/68837-forside.jpg
        </imageUrl>
        <description>
            Call of Duty: Modern Warfare 3 - Utvecklat av Infinity Ward och Sledgehammer Games; Modern Warfare 3 utspelar sig i en värld på randen till undergång, där Makarov och hans terror-organisation sprider kaos och ödeläggelse över hela planeten. Spelaren tar sig an flera roller och spelar som medlemmar från olika specialstyrkor, alla utrustade med de mest avancerade vapen som finns. I samarbete med Delta-operatörer och välkända karaktärer ger sig spelaren ut på en livsfarlig, världsomspännande katt-och-råtta-lek för att stoppa en galning innan det är för sent. Modern Warfare 3 vidareutvecklar Modern Warfares välkända 60fps-teknologi för att leverera en adrenalinpumpande actionupplevelse i Single Player, Special Ops och Online Multiplayer. Spelet börjar precis efter Modern Warfare 2 slutar, och utspelar sig över hela världen när du iklär dig olika roller som en rysk säkerhetsagent, SAS-soldat, tank förare och AC-130 skytt såväl som karaktärer från tidigare spel. Spelet innehåller 15 uppdrag och börjar när Manhattan invaderas av ryska soldater.Självklart så finns en stor multiplayer-del, med mängder av banor och även två spellägen: \'\'Survival\'\' och \'\'Mission\'\'.###SEARCH#call of duty x360###&nbsp;Plattform:XboxGenre: FPSSpr&aring;k i spelet: Spr&aring;k p&aring; f&ouml;rpackning: E3 2011 - CoD: Modern Warfare 3Call Of Duty: Modern Warfare 3 - Teaser trailerCall Of Duty: Modern Warfare 3 - Reveal trailer
        </description>
        <price>348.00</price>
        <currency>SEK</currency>
        <TDProductId>1016720533</TDProductId>
        <TDCategoryID>101</TDCategoryID>
        <TDCategoryName>Spel och leksaker</TDCategoryName>
        <merchantCategoryName>Xbox 360</merchantCategoryName>
        <sku/>
        <shortDescription>
            Call of Duty: Modern Warfare 3 - Utvecklat av Infinity Ward och Sledgehammer Games; Modern Warfare 3 utspelar sig i en värld på randen till undergång, där Makarov och hans terror-organisation sprider
        </shortDescription>
        <promoText/>
        <previousPrice/>
        <warranty/>
        <availability>Now</availability>
        <inStock/>
        <shippingCost/>
        <deliveryTime>1-3 dage</deliveryTime>
        <weight>90.00</weight>
        <size/>
        <brand/>
        <model/>
        <ean>5030917096853</ean>
        <upc/>
        <isbn/>
        <condition/>
        <mpn/>
        <techSpecs/>
        <manufacturer/>
        <programName>Spelbutiken</programName>
        <programLogoPath>
            http://hst.tradedoubler.com/file/77609/logo/spelbutiken-logo-100x100.jpg
        </programLogoPath>
        <programId>77609</programId>
        <advertiserProductUrl>
            http://www.spelbutiken.se/catalog/product/68837-call-of-duty--modern-warfare-3--for-x360
        </advertiserProductUrl>
        <fields/>
    </product>
</products>';

        $this->tradedoubler = new TradeDoubler($feed);

        $products = $this->tradedoubler->getProducts();
        $this->product = $products[0];
    }

    public function testProductTexts()
    {

        $this->assertEquals('Call of Duty: Modern Warfare 3 /X360', $this->product->getName());
        $description = 'Call of Duty: Modern Warfare 3 - Utvecklat av Infinity Ward och Sledgehammer Games; Modern Warfare 3 utspelar sig i en värld på randen till undergång, där Makarov och hans terror-organisation sprider kaos och ödeläggelse över hela planeten. Spelaren tar sig an flera roller och spelar som medlemmar från olika specialstyrkor, alla utrustade med de mest avancerade vapen som finns. I samarbete med Delta-operatörer och välkända karaktärer ger sig spelaren ut på en livsfarlig, världsomspännande katt-och-råtta-lek för att stoppa en galning innan det är för sent. Modern Warfare 3 vidareutvecklar Modern Warfares välkända 60fps-teknologi för att leverera en adrenalinpumpande actionupplevelse i Single Player, Special Ops och Online Multiplayer. Spelet börjar precis efter Modern Warfare 2 slutar, och utspelar sig över hela världen när du iklär dig olika roller som en rysk säkerhetsagent, SAS-soldat, tank förare och AC-130 skytt såväl som karaktärer från tidigare spel. Spelet innehåller 15 uppdrag och börjar när Manhattan invaderas av ryska soldater.Självklart så finns en stor multiplayer-del, med mängder av banor och även två spellägen: \'\'Survival\'\' och \'\'Mission\'\'.###SEARCH#call of duty x360### Plattform:XboxGenre: FPSSpråk i spelet: Språk på förpackning: E3 2011 - CoD: Modern Warfare 3Call Of Duty: Modern Warfare 3 - Teaser trailerCall Of Duty: Modern Warfare 3 - Reveal trailer';
        $this->assertEquals($description, $this->product->getDescription());
    }

    public function testProductPrice()
    {
        $this->assertEquals(348, $this->product->getPrice());
    }

    public function testProductUrl()
    {
        $this->assertEquals('http://pdt.tradedoubler.com/click?a(2122225)p(77609)prod(1016720533)ttid(5)epi()url(http%3A%2F%2Fwww.spelbutiken.se%2Fcatalog%2Fproduct%2F68837-call-of-duty--modern-warfare-3--for-x360)', $this->product->getTrackingUrl());
        $this->assertEquals('http://www.spelbutiken.se/catalog/product/68837-call-of-duty--modern-warfare-3--for-x360', $this->product->getProductUrl());
    }

    public function testEpi()
    {
        $epi = 'Myepi';
        $this->assertEquals('http://pdt.tradedoubler.com/click?a(2122225)p(77609)prod(1016720533)ttid(5)epi('.$epi.')url(http%3A%2F%2Fwww.spelbutiken.se%2Fcatalog%2Fproduct%2F68837-call-of-duty--modern-warfare-3--for-x360)', $this->product->getTrackingUrl($epi));
    }

    public function testEpiWithUrlEncoding()
    {
        $epi = 'My epi';
        $this->assertEquals('http://pdt.tradedoubler.com/click?a(2122225)p(77609)prod(1016720533)ttid(5)epi('.urlencode($epi).')url(http%3A%2F%2Fwww.spelbutiken.se%2Fcatalog%2Fproduct%2F68837-call-of-duty--modern-warfare-3--for-x360)', $this->product->getTrackingUrl($epi));
    }

    public function testGraphicUrl()
    {
        $this->assertEquals('http://www.spelbutiken.se/catalog/product_thumb.php?w=150&img=images/boxshots/68837-forside.jpg', $this->product->getGraphicUrl());
    }


}