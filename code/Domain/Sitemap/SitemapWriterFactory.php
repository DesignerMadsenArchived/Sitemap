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

    /**
     * @return void

    protected final function generateWriter(): void
    {
        if( !is_null( $this->writer ) )
        {
            unset( $this->limit );
        }

        if( $this->getFileType() == SitemapType::TEXT )
        {
            $this->setWriter(
                $this->generateTextWriter()
            );
        }

        if( $this->getFileType() == SitemapType::XML )
        {
            $this->setWriter(
                $this->generateXMLWriter()
            );
        }

        if( $this->getFileType() == SitemapType::RSS )
        {
            $this->setWriter(
                $this->generateRSSWriter()
            );
        }
    }
     */
?>