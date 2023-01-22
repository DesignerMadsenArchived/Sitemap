<?php
    namespace IoJaegers\Sitemap\Domain\Sitemap\io;

    use IoJaegers\Sitemap\Domain\Sitemap\elements\buffers\SitemapBuffer;


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

         /**
          * @return string
          */
         public function write(): string
         {
             // TODO: Implement write() method.
             return "";
         }

         /**
          * @return string
          */
         public function flush(): string
         {
             // TODO: Implement flush() method.
             return "";
         }
     }
?>