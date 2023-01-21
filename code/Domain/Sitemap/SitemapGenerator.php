<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain\Sitemap;
	
	use IoJaegers\Sitemap\Domain\Sitemap\elements\SitemapBuffer;
    use IoJaegers\Sitemap\Domain\Sitemap\elements\SitemapOrder;
    use IoJaegers\Sitemap\Domain\Sitemap\elements\SitemapType;
    use IoJaegers\Sitemap\Domain\Sitemap\limiter\TextLimit;
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

            $this->generateLimit();
		}


		// Variables
		private ?SitemapBuffer $buffer = null;
		
		private ?SitemapOrder $order = null;
		
		private ?SitemapType $fileType = null;

        private ?SitemapSetting $settings = null;
        private ?SitemapLogLevel $logLevel = null;

        private ?TextLimit $limit = null;


        // Execution
        /**
         * @param string $url
         * @return bool
         */
        public function add( string $url ): bool
        {

            return false;
        }

        /**
         * @param string $url
         * @return bool
         */
        public function delete( string $url ): bool
        {
            return false;
        }

        /**
         * @param string $urlInSet
         * @param string $urlTo
         * @return bool
         */
        public function replace( string $urlInSet, string $urlTo ): bool
        {

            return false;
        }

        /**
         * @return void
         */
        protected function generateLimit(): void
        {
            if( $this->getFileType() == SitemapType::TEXT )
            {
                $this->setLimit(
                    new TextLimit( $this->getBuffer() )
                );
            }
        }

		// Accessors
		/**
		 * @return SitemapBuffer|null
		 */
		public function getBuffer(): ?SitemapBuffer
		{
			return $this->buffer;
		}
		
		/**
		 * @param SitemapBuffer|null $buffer
		 */
		public function setBuffer( ?SitemapBuffer $buffer ): void
		{
			$this->buffer = $buffer;
		}
		
		/**
		 * @return SitemapOrder|null
		 */
		public function getOrder(): ?SitemapOrder
		{
			return $this->order;
		}
		
		/**
		 * @param SitemapOrder|null $order
		 */
		public function setOrder( ?SitemapOrder $order ): void
		{
			$this->order = $order;
		}
		
		/**
		 * @return SitemapType|null
		 */
		public function getFileType(): ?SitemapType
		{
			return $this->fileType;
		}
		
		/**
		 * @param SitemapType|null $fileType
		 */
		public function setFileType( ?SitemapType $fileType ): void
		{
			$this->fileType = $fileType;
		}

        /**
         * @return SitemapSetting|null
         */
        public function getSettings(): ?SitemapSetting
        {
            return $this->settings;
        }

        /**
         * @param SitemapSetting|null $settings
         */
        public function setSettings( ?SitemapSetting $settings ): void
        {
            $this->settings = $settings;
        }

        /**
         * @return SitemapLogLevel|null
         */
        public function getLogLevel(): ?SitemapLogLevel
        {
            return $this->logLevel;
        }

        /**
         * @param SitemapLogLevel|null $logLevel
         */
        public function setLogLevel( ?SitemapLogLevel $logLevel ): void
        {
            $this->logLevel = $logLevel;
        }

        /**
         * @return TextLimit|null
         */
        public function getLimit(): ?TextLimit
        {
            return $this->limit;
        }

        /**
         * @param TextLimit|null $limit
         */
        public function setLimit(?TextLimit $limit): void
        {
            $this->limit = $limit;
        }
	}
?>