<?php
    /**
     *
     */
    namespace IoJaegers\Sitemap\Domain\Sitemap;

    use IoJaegers\Sitemap\Domain\Sitemap\elements\enums\SitemapType;
    use IoJaegers\Sitemap\Domain\Sitemap\limiter\RSSLimit;
    use IoJaegers\Sitemap\Domain\Sitemap\limiter\TextLimit;
    use IoJaegers\Sitemap\Domain\Sitemap\limiter\XMLLimit;


    /**
     *
     */
    class SitemapLimitFactory
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
            if( $this->getGenerator()->isLimitSet() )
            {
                $this->getGenerator()->deleteLimit();
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
         * @return SitemapGenerator|null
         */
        public final function getGenerator(): ?SitemapGenerator
        {
            return $this->generator;
        }

        /**
         * @param SitemapGenerator|null $generator
         */
        public final function setGenerator( ?SitemapGenerator $generator ): void
        {
            $this->generator = $generator;
        }

        /**
         * @return void
         */
        protected final function generateAsText(): void
        {
            $this->getGenerator()->setLimit(
                new TextLimit(
                    $this->getGenerator()->getBuffer()
                )
            );
        }

        /**
         * @return void
         */
        protected final function generateAsXML(): void
        {
            $this->getGenerator()->setLimit(
                new XMLLimit(
                    $this->getGenerator()->getBuffer()
                )
            );
        }

        /**
         * @return void
         */
        protected final function generateAsRSS(): void
        {
            $this->getGenerator()->setLimit(
                new RSSLimit(
                    $this->getGenerator()->getBuffer()
                )
            );
        }

        /**
         * @return void
         */
        protected final function throwErrorNoFormat(): void
        {

        }
    }
?>