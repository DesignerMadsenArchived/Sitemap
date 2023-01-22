<?php
    /**
     *
     */
    namespace IoJaegers\Sitemap\Domain\Sitemap;


    class SitemapLimitFactory
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
         * @return SitemapGenerator|null
         */
        public function getGenerator(): ?SitemapGenerator
        {
            return $this->generator;
        }

        /**
         * @param SitemapGenerator|null $generator
         */
        public function setGenerator( ?SitemapGenerator $generator ): void
        {
            $this->generator = $generator;
        }

    }
?>