<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain\Sitemap\elements;
	
	
	/**
	 * 
	 */
	enum SitemapType
	{
		case XML;
		
		case RSS;
		
		case TEXT;

        case UNKNOWN;
	}
?>