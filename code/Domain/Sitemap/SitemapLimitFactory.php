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

    /**
     * /**
     * @return void

    protected final function generateLimit(): void
    {
        if( !is_null( $this->limit ) )
        {
            unset( $this->limit );
        }

        if( $this->getFileType() == SitemapType::TEXT )
        {
            $this->setLimit(
                $this->generateLimitForText()
            );
        }

        if( $this->getFileType() == SitemapType::XML )
        {
            $this->setLimit(
                $this->generateLimitForXML()
            );
        }

        if( $this->getFileType() == SitemapType::RSS )
        {
            $this->setLimit(
                $this->generateLimitForRSS()
            );
        }
    }
     */
?>