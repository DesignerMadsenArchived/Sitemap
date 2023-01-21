<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain\Sitemap\elements;
	
	
	/**
	 * 
	 */
	class SitemapBuffer
	{
		// constructors
		public function __construct()
		{
            $this->setEntries( array() );
		}
		
		
		// Variables
		private ?array $entries = null;
		
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
	}
?>