<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain\Sitemap;
	
	use IoJaegers\Sitemap\Domain\Sitemap\elements\SitemapBuffer;
    use IoJaegers\Sitemap\Domain\Sitemap\elements\SitemapOrder;
    use IoJaegers\Sitemap\Domain\Sitemap\elements\SitemapType;
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
		public function __construct()
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
                SitemapType::TEXT
            );

            $this->setLogLevel(
                SitemapLogLevel::WARNING
            );
		}


		// Variables
		private ?SitemapBuffer $buffer = null;
		
		private ?SitemapOrder $order = null;
		
		private ?SitemapType $fileType = null;
        private ?SitemapSetting $settings = null;
        private ?SitemapLogLevel $logLevel = null;
		
		
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
        public function setLogLevel(?SitemapLogLevel $logLevel): void
        {
            $this->logLevel = $logLevel;
        }
	}
?>