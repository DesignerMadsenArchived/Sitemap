<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain;
	
	
	/**
	 * 
	 */
	enum SitemapType
	{
		case XML;
		
		case RSS;
		
		case TEXT;
	}
?>