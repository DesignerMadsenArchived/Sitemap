<?php
    namespace IoJaegers\Sitemap\Domain\Sitemap\io;


    use IoJaegers\Sitemap\Domain\Sitemap\elements\SitemapBuffer;

    /**
     *
     */
     class XMLWriter
         extends IOWriter
     {
         /**
          * @param SitemapBuffer|null $buffer
          */
         public function __construct( ?SitemapBuffer $buffer )
         {
             parent::__construct( $buffer );
         }

     }
?>