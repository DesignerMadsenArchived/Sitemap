<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain\Sitemap\elements\entries;


	/**
	 * 
	 */
	class SitemapEntry
	{
        /**
         * @param string $url
         * @return SitemapEntry|null
         */
        public final static function create( string $url ): ?SitemapEntry
        {
            $url_parsed = parse_url( $url );

            if( $url_parsed === false ||
                strlen( $url ) == self::zero )
            {
                return null;
            }

            return new SitemapEntry( url: $url,
                                     parsed: $url_parsed );
        }

		// Constructor
        /**
         *
         */
		public function __construct( string $url,
                                     ?array $parsed = null )
		{
            $this->setOriginal( $url );
            $this->setParsed( $parsed );

            $this->setLength(
                strlen( $url )
            );
		}

        /**
         * @return string
         */
        public function toString(): string
        {
            return $this->getUrlScheme()    .
                   self::protocolSeparator  .
                   $this->getUrlHost()      .
                   $this->getUrlPath();
        }

        /**
         * @return bool
         */
        public final function isValid(): bool
        {
            if( $this->isSchemeNull() ||
                $this->isHostNull() )
            {
                return false;
            }

            return true;
        }

        // Variables
        private ?string $original = null;
		private ?array $parsed = null;

        private bool $written = false;
        private ?int $length = null;

        const zero = 0;

        const scheme = 'scheme';
        const host   = 'host';
        const path   = 'path';

        const protocolSeparator = '://';

        /**
         * @return bool
         */
        public final function isSchemeNull(): bool
        {
            return is_null( $this->getUrlScheme() );
        }

        /**
         * @return bool
         */
        public final function isHostNull(): bool
        {
            return is_null( $this->getUrlHost() );
        }

        /**
         * @return bool
         */
        public final function isPathNull(): bool
        {
            return is_null( $this->getUrlPath() );
        }

		// Accessors
        /**
         * @return array|null
         */
        public final function getParsed(): ?array
        {
            return $this->parsed;
        }

        /**
         * @param string $key
         * @return string|null
         */
        protected final function getUrlElement( string $key ): ?string
        {
            return $this->getParsed()[ $key ] ?? null;
        }

        /**
         * @return string|null
         */
        public final function getUrlScheme(): ?string
        {
            return $this->getUrlElement( self::scheme );
        }

        /**
         * @return string|null
         */
        public final function getUrlHost(): ?string
        {
            return $this->getUrlElement( self::host );
        }

        /**
         * @return string|null
         */
        public final function getUrlPath(): ?string
        {
            return $this->getUrlElement( self::path );
        }

        /**
         * @param array|null $parsed
         */
        protected final function setParsed( ?array $parsed ): void
        {
            $this->parsed = $parsed;
        }

        /**
         * @return bool
         */
        public final function isWritten(): bool
        {
            return $this->written;
        }

        /**
         * @param bool $written
         */
        public final function setWritten( bool $written ): void
        {
            $this->written = $written;
        }

        /**
         * @return string|null
         */
        public final function getOriginal(): ?string
        {
            return $this->original;
        }

        /**
         * @param string|null $original
         */
        public final function setOriginal( ?string $original ): void
        {
            $this->original = $original;
        }

        /**
         * @return int
         */
        public function getLength(): int
        {
            return $this->length;
        }

        /**
         * @param int $length
         * @return void
         */
        public function setLength( int $length ): void
        {
            $this->length = $length;
        }

	}
?>