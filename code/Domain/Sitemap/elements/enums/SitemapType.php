<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain\Sitemap\elements\enums;
	
	
	/**
	 * 
	 */
	enum SitemapType
	{
		/**
		 *
		 */
		case XML;
		
		/**
		 *
		 */
		case RSS;
		
		/**
		 *
		 */
		case TEXT;
		
		/**
		 *
		 */
        case UNKNOWN;
	}
?>