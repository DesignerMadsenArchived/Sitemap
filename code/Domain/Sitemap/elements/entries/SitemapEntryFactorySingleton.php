<?php
	namespace IoJaegers\Sitemap\Domain\Sitemap\elements\entries;
	
	
	/**
	 *
	 */
	class SitemapEntryFactorySingleton
	{
		/**
		 *
		 */
		public function __construct()
		{
		
		}
		
		// Variables
		private static ?SitemapEntryFactory $factory = null;
		
		
		/**
		 * @return SitemapEntryFactory
		 */
		public static function getFactory(): SitemapEntryFactory
		{
			if(
				is_null(
					self::$factory
				)
			)
			{
				self::setFactory(
					new SitemapEntryFactory()
				);
			}
			
			return self::$factory;
		}
		
		/**
		 * @param SitemapEntryFactory|null $factory
		 */
		public static function setFactory(
			?SitemapEntryFactory $factory
		): void
		{
			self::$factory = $factory;
		}
	}
?>