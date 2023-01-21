<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain\Sitemap\elements;

	use IoJaegers\Sitemap\Domain\Sitemap\settings\SitemapSetting;


    /**
	 * 
	 */
	class SitemapBuffer
	{
		// constructors
		public function __construct( ?SitemapSetting $setting )
		{
            $this->setSettings( $setting );
            $this->setEntries( array() );
		}
		
		
		// Variables
		private ?array $entries = null;
        private ?SitemapSetting $settings = null;
		
		// Accessors
		/**
		 * @return array|null
		 */
		public function getEntries(): ?array
		{
			return $this->entries;
		}
		
		/**
		 * @param array|null $entries
		 */
		public function setEntries( ?array $entries ): void
		{
			$this->entries = $entries;
		}

        /**
         * @param SitemapSetting|null $settings
         */
        public function setSettings(?SitemapSetting $settings): void
        {
            $this->settings = $settings;
        }

        /**
         * @return SitemapSetting|null
         */
        public function getSettings(): ?SitemapSetting
        {
            return $this->settings;
        }
	}
?>