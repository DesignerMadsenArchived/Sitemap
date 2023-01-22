<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain\Sitemap;
	
	use IoJaegers\Sitemap\Domain\Sitemap\elements\buffers\SitemapBuffer;

    use IoJaegers\Sitemap\Domain\Sitemap\elements\enums\SitemapLogLevel;
    use IoJaegers\Sitemap\Domain\Sitemap\elements\enums\SitemapType;

    use IoJaegers\Sitemap\Domain\Sitemap\elements\sorts\SitemapOrder;

    use IoJaegers\Sitemap\Domain\Sitemap\io\IOWriter;
    use IoJaegers\Sitemap\Domain\Sitemap\io\RSSWriter;
    use IoJaegers\Sitemap\Domain\Sitemap\io\TextWriter;
    use IoJaegers\Sitemap\Domain\Sitemap\io\XMLWriter;

    use IoJaegers\Sitemap\Domain\Sitemap\limiter\Limit;
    use IoJaegers\Sitemap\Domain\Sitemap\limiter\RSSLimit;
    use IoJaegers\Sitemap\Domain\Sitemap\limiter\TextLimit;
    use IoJaegers\Sitemap\Domain\Sitemap\limiter\XMLLimit;

    use IoJaegers\Sitemap\Domain\Sitemap\settings\SitemapSetting;


    /**
	 *
	 */
	class SitemapGenerator
	{
		// Constructor
        /**
         *
         */
		public function __construct( SitemapType $sitemapFileType = SitemapType::TEXT,
                                     SitemapLogLevel $logLevel = SitemapLogLevel::WARNING )
		{
            $this->setSettings(
                new SitemapSetting()
            );

            $this->setBuffer(
                new SitemapBuffer(
                    $this->getSettings()
                )
            );

            $this->setOrder(
                new SitemapOrder(
                    $this->getSettings()
                )
            );

            $this->setFileType(
                $sitemapFileType
            );

            $this->setLogLevel(
                $logLevel
            );
		}


		// Variables
		private ?SitemapBuffer $buffer = null;
		
		private ?SitemapOrder $order = null;
		
		private ?SitemapType $fileType = null;

        private ?SitemapSetting $settings = null;
        private ?SitemapLogLevel $logLevel = null;

        private ?TextLimit $limit = null;
        private ?IOWriter $writer = null;


        // Execution
        /**
         * @param string $url
         * @return bool
         */
        public final function add( string $url ): bool
        {
            return $this->getBuffer()
                        ->create( $url );
        }

        /**
         * @param array $urls
         * @return int|bool
         */
        public final function addListOfUrls( array $urls ): int|bool
        {
            return $this->getBuffer()
                        ->createFrom( $urls );
        }

        /**
         * @param string $url
         * @return bool
         */
        public final function delete( string $url ): bool
        {
            return false;
        }

        /**
         * @return void
         */
        public final function clear(): void
        {
            $this->getBuffer()
                 ->clear();
        }

        /**
         * @param string $urlInSet
         * @param string $urlTo
         * @return bool
         */
        public final function replace( string $urlInSet, string $urlTo ): bool
        {

            return false;
        }

        //
        /**
         * @return void
         */
        protected final function generateInternalStructure(): void
        {
            $this->generateLimit();
            $this->generateWriter();
        }

        /**
         * @return void
         */
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

        /**
         * @return void
         */
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

        /**
         * @return TextLimit
         */
        private function generateLimitForText(): TextLimit
        {
            return new TextLimit(
                $this->getBuffer()
            );
        }

        /**
         * @return TextWriter
         */
        private function generateTextWriter(): TextWriter
        {
            return new TextWriter(
                $this->getBuffer()
            );
        }

        /**
         * @return RSSLimit
         */
        private function generateLimitForRSS(): RSSLimit
        {
            return new RSSLimit(
                $this->getBuffer()
            );
        }

        /**
         * @return RSSWriter
         */
        private function generateRSSWriter(): RSSWriter
        {
            return new RSSWriter(
                $this->getBuffer()
            );
        }

        /**
         * @return XMLLimit
         */
        private function generateLimitForXML(): XMLLimit
        {
            return new XMLLimit(
                $this->getBuffer()
            );
        }

        /**
         * @return XMLWriter
         */
        private function generateXMLWriter(): XMLWriter
        {
            return new XMLWriter(
                $this->getBuffer()
            );
        }


		// Accessors
		/**
		 * @return SitemapBuffer|null
		 */
		public final function getBuffer(): ?SitemapBuffer
		{
			return $this->buffer;
		}
		
		/**
		 * @param SitemapBuffer|null $buffer
		 */
		public final function setBuffer( ?SitemapBuffer $buffer ): void
		{
			$this->buffer = $buffer;
		}
		
		/**
		 * @return SitemapOrder|null
		 */
		public final function getOrder(): ?SitemapOrder
		{
			return $this->order;
		}
		
		/**
		 * @param SitemapOrder|null $order
		 */
		public final function setOrder( ?SitemapOrder $order ): void
		{
			$this->order = $order;
		}
		
		/**
		 * @return SitemapType|null
		 */
		public final function getFileType(): ?SitemapType
		{
			return $this->fileType;
		}
		
		/**
		 * @param SitemapType|null $fileType
		 */
		public final function setFileType( ?SitemapType $fileType ): void
		{
			$this->fileType = $fileType;

            $this->generateInternalStructure();
		}

        /**
         * @return SitemapSetting|null
         */
        public final function getSettings(): ?SitemapSetting
        {
            return $this->settings;
        }

        /**
         * @param SitemapSetting|null $settings
         */
        public final function setSettings( ?SitemapSetting $settings ): void
        {
            $this->settings = $settings;
        }

        /**
         * @return SitemapLogLevel|null
         */
        public final function getLogLevel(): ?SitemapLogLevel
        {
            return $this->logLevel;
        }

        /**
         * @param SitemapLogLevel|null $logLevel
         */
        public final function setLogLevel( ?SitemapLogLevel $logLevel ): void
        {
            $this->logLevel = $logLevel;
        }

        /**
         * @return TextLimit|null
         */
        public final function getLimit(): ?Limit
        {
            return $this->limit;
        }

        /**
         * @param TextLimit|null $limit
         */
        public final function setLimit( ?Limit $limit ): void
        {
            $this->limit = $limit;
        }

        /**
         * @return IOWriter|null
         */
        public final function getWriter(): ?IOWriter
        {
            return $this->writer;
        }

        /**
         * @param IOWriter|null $writer
         */
        public final function setWriter( ?IOWriter $writer ): void
        {
            $this->writer = $writer;
        }
	}
?>