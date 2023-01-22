<?php
    namespace IoJaegers\Sitemap\Domain\Sitemap\io;

    use IoJaegers\Sitemap\Domain\Sitemap\elements\buffers\SitemapBuffer;


    /**
     *
     */
     class TextWriter
         extends IOWriter
     {
         /**
          * @param SitemapBuffer|null $buffer
          */
         public function __construct( ?SitemapBuffer $buffer )
         {
             parent::__construct( $buffer );
         }

         private ?string $write_cache = null;

         /**
          * @return string
          */
         public function write(): string
         {
             $idx = null;

             $sizeOf = $this->getBuffer()
                            ->getState()
                            ->getSizeOfBuffer()
                            ->getValue();

             for( $idx = 0;
                  $idx < $sizeOf;
                  $idx ++ )
             {
                 $current = $this->getBuffer()->getEntries()[$idx];

                 if( $current->isValid() )
                 {
                     $this->writeLine( $current->toString() );
                     $this->newLine();
                 }
             }

             return $this->getWriteCache();
         }

         /**
          * @return string
          */
         public function flush(): string
         {
             return "";
         }

         /**
          * @param string $line
          * @return void
          */
         protected function writeLine( string $line ): void
         {
             $result = $this->getWriteCache() . $line;
             $this->setWriteCache( $result );
         }

         /**
          * @return void
          */
         protected function newLine()
         {
             $result = $this->getWriteCache() . "\r\n";
             $this->setWriteCache( $result );
         }

         /**
          * @return string|null
          */
         public function getWriteCache(): ?string
         {
             if( is_null( $this->write_cache ) )
             {
                 $this->setWriteCache( '' );
             }

             return $this->write_cache;
         }

         /**
          * @param string|null $write_cache
          */
         public function setWriteCache( ?string $write_cache ): void
         {
             $this->write_cache = $write_cache;
         }
     }
?>