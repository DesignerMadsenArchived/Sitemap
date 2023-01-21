<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain\Sitemap\elements;


	/**
	 * 
	 */
	class SitemapEntry
	{
        public static function create( string $url ): ?SitemapEntry
        {
            $url = parse_url( $url );

            if( $url === false )
            {
                return null;
            }

            $entry = new SitemapEntry();
            $entry->setUrl( $url );

            return $entry;
        }

		// Constructor
        /**
         *
         */
		public function __construct()
		{

		}

        // Variables
		private ?array $url = null;


		// Accessors
        /**
         * @return array|null
         */
        public function getUrl(): ?array
        {
            return $this->url;
        }

        /**
         * @param array|null $url
         */
        public function setUrl( ?array $url ): void
        {
            $this->url = $url;
        }
	}
?>