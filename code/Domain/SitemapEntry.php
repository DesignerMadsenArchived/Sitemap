<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain;
		
	/**
	 * 
	 */
	class SitemapEntry
	{
		// Constructor
		public function __construct()
		{
		
		}
		
		
		// Variables
		private ?string $url = null;
		
		// Accessors
		/**
		 * @return string|null
		 */
		public function getUrl(): ?string
		{
			return $this->url;
		}
		
		/**
		 * @param string|null $url
		 */
		public function setUrl( ?string $url ): void
		{
			$this->url = $url;
		}
	}
?>