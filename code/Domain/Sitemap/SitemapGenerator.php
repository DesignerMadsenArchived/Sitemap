<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain\Sitemap;
	
	use IoJaegers\Sitemap\Domain\Sitemap\elements\SitemapBuffer;
    use IoJaegers\Sitemap\Domain\Sitemap\elements\SitemapOrder;
    use IoJaegers\Sitemap\Domain\Sitemap\elements\SitemapType;
    use IoJaegers\Sitemap\Domain\Sitemap\settings\SitemapSettings;


    /**
	 *
	 */
	class SitemapGenerator
	{
		// Constructor
		public function __construct()
		{
            $this->setBuffer( new SitemapBuffer() );
            $this->setOrder( new SitemapOrder() );

            $this->setFileType( SitemapType::XML );
            $this->setSettings( new SitemapSettings() );
		}
		
		
		// Variables
		private ?SitemapBuffer $buffer = null;
		
		private ?SitemapOrder $order = null;
		
		private ?SitemapType $fileType = null;
        private ?SitemapSettings $settings = null;
		
		
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
         * @return SitemapSettings|null
         */
        public function getSettings(): ?SitemapSettings
        {
            return $this->settings;
        }

        /**
         * @param SitemapSettings|null $settings
         */
        public function setSettings( ?SitemapSettings $settings ): void
        {
            $this->settings = $settings;
        }
	}
?>