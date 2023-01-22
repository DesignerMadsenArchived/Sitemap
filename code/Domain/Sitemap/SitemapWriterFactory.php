<?php
    /**
     *
     */
    namespace IoJaegers\Sitemap\Domain\Sitemap;

    use IoJaegers\Sitemap\Domain\Sitemap\elements\enums\SitemapType;
    use IoJaegers\Sitemap\Domain\Sitemap\io\RSSWriter;
    use IoJaegers\Sitemap\Domain\Sitemap\io\TextWriter;
    use IoJaegers\Sitemap\Domain\Sitemap\io\XMLWriter;


    /**
     *
     */
    class SitemapWriterFactory
    {
        // Constructors
        /**
         * @param SitemapGenerator $generator
         */
        public function __construct( SitemapGenerator $generator )
        {
            $this->setGenerator( $generator );
        }

        /**
         * @return void
         */
        public function generate(): void
        {
            if( $this->getGenerator()->isWriterSet() )
            {
                $this->getGenerator()->deleteWriter();
            }

            switch ( $this->getGenerator()->getFileType() )
            {

                case SitemapType::TEXT:
                        $this->generateAsText();
                    break;

                case SitemapType::XML:
                        $this->generateAsXML();
                    break;

                case SitemapType::RSS:
                        $this->generateAsRSS();
                    break;

                default:
                        $this->throwErrorNoFormat();
                    break;
            }
        }

        // Variables
        private ?SitemapGenerator $generator = null;

        // Accessors
        /**
         * @param SitemapGenerator|null $generator
         */
        public final function setGenerator( ?SitemapGenerator $generator ): void
        {
            $this->generator = $generator;
        }

        /**
         * @return SitemapGenerator|null
         */
        public final function getGenerator(): ?SitemapGenerator
        {
            return $this->generator;
        }

        /**
         * @return void
         */
        public final function throwErrorNoFormat(): void
        {

        }

        /**
         * @return void
         */
        protected final function generateAsText(): void
        {
            $this->getGenerator()->setWriter(
                new TextWriter(
                    $this->getGenerator()->getBuffer()
                )
            );
        }

        /**
         * @return void
         */
        protected final function generateAsXML(): void
        {
            $this->getGenerator()->setWriter(
                new XMLWriter(
                    $this->getGenerator()->getBuffer()
                )
            );
        }

        /**
         * @return void
         */
        protected final function generateAsRSS(): void
        {
            $this->getGenerator()->setWriter(
                new RSSWriter(
                    $this->getGenerator()->getBuffer()
                )
            );
        }
    }
?>