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
        /**
         * @param string $url
         * @return SitemapEntry|null
         */
        public static function create( string $url ): ?SitemapEntry
        {
            $url_parsed = parse_url( $url );

            if( $url_parsed === false )
            {
                return null;
            }

            if( strlen( $url ) == 0 )
            {
                return null;
            }

            $entry = new SitemapEntry();
            $entry->setUrl( $url_parsed );

            return $entry;
        }

		// Constructor
        /**
         *
         */
		public function __construct()
		{

		}

        /**
         * @return string
         */
        public function toString(): string
        {
            return $this->getUrlScheme() .
                   "://"                 .
                   $this->getUrlHost()   .
                   $this->getUrlPath();
        }

        public function isValid()
        {
            $retVal = true;

            if( is_null( $this->getUrlScheme() ) )
            {
                $retVal = true;
                return $retVal;
            }

            if( is_null( $this->getUrlHost()  ) )
            {
                $retVal = true;
                return $retVal;
            }

            if( is_null( $this->getUrlPath() ) )
            {
                $retVal = true;
                return $retVal;
            }

            return $retVal;
        }

        // Variables
		private ?array $url = null;
        private bool $written = false;


		// Accessors
        /**
         * @return array|null
         */
        public final function getUrl(): ?array
        {
            return $this->url;
        }

        /**
         * @param string $key
         * @return string|null
         */
        protected final function getUrlElement( string $key ): ?string
        {
            if( isset( $this->getUrl()[ $key ] ) )
            {
                return $this->getUrl()[ $key ];
            }
            else
            {
                return null;
            }
        }

        /**
         * @return string|null
         */
        public final function getUrlScheme(): ?string
        {
            return $this->getUrlElement('scheme');
        }

        /**
         * @return string|null
         */
        public final function getUrlHost(): ?string
        {
            return $this->getUrlElement('host');
        }

        /**
         * @return string|null
         */
        public final function getUrlPath(): ?string
        {
            return $this->getUrlElement('path');
        }

        /**
         * @param array|null $url
         */
        public final function setUrl( ?array $url ): void
        {
            $this->url = $url;
        }

        /**
         * @return bool
         */
        public function isWritten(): bool
        {
            return $this->written;
        }

        /**
         * @param bool $written
         */
        public function setWritten( bool $written ): void
        {
            $this->written = $written;
        }
	}
?>