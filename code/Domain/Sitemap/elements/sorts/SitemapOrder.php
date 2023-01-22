<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain\Sitemap\elements\sorts;
		
	use IoJaegers\Sitemap\Domain\Sitemap\settings\SitemapSetting;


    /**
	 * 
	 */
	class SitemapOrder
	{
        // Constructor
        /**
         * @param SitemapSetting|null $setting
         */
		public function __construct( ?SitemapSetting $setting )
		{
            $this->setSettings( $setting );
		}


        // Variable
        private ?SitemapSetting $settings = null;


        // Accessors
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
	}
?>