<?php
    /**
     *
     */
    namespace IoJaegers\Sitemap\Domain\Sitemap;


    class SitemapWriterFactory
    {
        // Constructors
        public function __construct( SitemapGenerator $generator )
        {
            $this->setGenerator( $generator );
        }

        public function generate(): void
        {

        }

        // Variables
        private ?SitemapGenerator $generator = null;

        // Accessors
        /**
         * @param SitemapGenerator|null $generator
         */
        public function setGenerator( ?SitemapGenerator $generator ): void
        {
            $this->generator = $generator;
        }

        /**
         * @return SitemapGenerator|null
         */
        public function getGenerator(): ?SitemapGenerator
        {
            return $this->generator;
        }
    }
?>