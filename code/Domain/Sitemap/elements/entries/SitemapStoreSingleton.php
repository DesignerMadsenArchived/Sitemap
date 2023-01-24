<?php
	namespace IoJaegers\Sitemap\Domain\Sitemap\elements\entries;
	
	/**
	 *
	 */
	class SitemapStoreSingleton
	{
		//
		private static ?SitemapStore $store = null;
		
		/**
		 * @param SitemapStore $store
		 * @return void
		 */
		public static function setSitemapStore( SitemapStore $store ): void
		{
			self::$store = $store;
		}
		
		/**
		 * @return SitemapStore
		 */
		public static function getSitemapStore(): SitemapStore
		{
			if(
				is_null( self::$store )
			)
			{
				self::setSitemapStore(
					new SitemapStore()
				);
			}
			
			return self::$store;
		}
	}
?>