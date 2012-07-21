<?php

namespace ProductFeedAdapter\Test;


use ProductFeedAdapter\Product;

class ProductTest extends \PHPUnit_Framework_TestCase
{

    public function testProductWithHtmlEncodedDescriptionIsDisplayedCorrect()
    {
        $product = new Product();
        $product->setDescription('&lt;p&gt;Härlig retrotröja föreställande Atari-loggan i grön matrixstyle binärkod.&lt;/p&gt;
&lt;div class=&amp;quot;storlekstabell&amp;quot;&gt;&lt;span class=&amp;quot;rubrik&amp;quot;&gt;Storlekstabell&lt;/span&gt; 
  &lt;table border=&amp;quot;0&amp;quot; cellpadding=&amp;quot;0&amp;quot;&gt;
    &lt;tbody&gt;
      &lt;tr&gt;
        &lt;td rowspan=&amp;quot;7&amp;quot;&gt;&lt;strong&gt;
            &lt;div class=&amp;quot;sizetable_img&amp;quot;&gt;&lt;/div&gt;&lt;/strong&gt;&lt;/td&gt;
        &lt;td&gt;&lt;strong&gt;&lt;br /&gt;&lt;/strong&gt;&lt;/td&gt;
        &lt;td&gt;&lt;strong&gt;Bröstvidd&lt;/strong&gt;&lt;/td&gt;
        &lt;td&gt;&lt;strong&gt;Längd&lt;/strong&gt;&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;&lt;strong&gt;XS&lt;/strong&gt;&lt;/td&gt;
        &lt;td&gt;-&lt;/td&gt;
        &lt;td&gt;-&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;&lt;strong&gt;S&lt;/strong&gt;&lt;/td&gt;
        &lt;td&gt;42,5 cm&lt;/td&gt;
        &lt;td&gt;68 cm&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;&lt;strong&gt;M&lt;/strong&gt;&lt;/td&gt;
        &lt;td&gt;50 cm&lt;/td&gt;
        &lt;td&gt;71 cm&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;&lt;strong&gt;L&lt;/strong&gt;&lt;/td&gt;
        &lt;td&gt;54 cm&lt;/td&gt;
        &lt;td&gt;71 cm&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
        &lt;td&gt;&lt;strong&gt;XL&lt;/strong&gt;&lt;/td&gt;
        &lt;td&gt;59 cm&lt;/td&gt;
 ');
        $this->assertStringStartsWith('<p>Härlig retrotröja föreställande Atari-loggan i grön matrixstyle binärkod.</p>', $product->getDescription());
        $this->assertStringStartsWith('&lt;p&gt;Härlig retrotröja föreställande Atari-loggan i grön matrixstyle binärkod.&lt;/p&gt;', $product->getRawDescription());
    }

    public function testProductWithHtmlDescriptionIsDisplayedCorrect()
    {
        $product = new Product();
        $product->setDescription('<p>Härlig retrotröja föreställande Atari-loggan i grön...</p>'); 
        $this->assertEquals('<p>Härlig retrotröja föreställande Atari-loggan i grön...</p>', $product->getDescription());
    }

    public function testProductWithHtmlEncodedNameIsDisplayedCorrect()
    {
        $product = new Product();
        $product->setName('Alien &amp; Predator Total Destruction Box DVD');
        $this->assertEquals('Alien & Predator Total Destruction Box DVD', $product->getName());
    }

    public function testProductWithHtmlNameIsDisplayedCorrect()
    {
        $product = new Product();
        $product->setDescription('Alien & Predator Total Destruction Box DVD'); 
        $this->assertEquals('Alien & Predator Total Destruction Box DVD', $product->getDescription());
    }

}