<?php
    /**
 *
     */
    namespace IoJaegers\Sitemap\Send;

    use CurlHandle;

    /**
     *
     */
    class GoogleSend
    {
        /**
         * @param string $url
         */
        public function __construct( string $url )
        {
            $this->setUrl( $url );
            $this->setCh( curl_init() );
        }

        /**
         *
         */
        public function __destruct()
        {
            curl_close( $this->getCh() );
        }

        private ?string $url = null;
        private $ch = null;
        private bool $successful = false;

        const google_url = 'https://www.google.com/ping?sitemap=';

        const RESPONSE_SUCCESSFUL = 200;

        /**
         * @return void
         */
        public function send()
        {
            curl_setopt( $this->getCh(),
                CURLOPT_URL,
                $this->getLink() );

            curl_setopt( $this->getCh(),
                CURLOPT_RETURNTRANSFER,
                1 );

            curl_exec( $this->getCh() );

            $info = curl_getinfo( $this->getCh(), CURLINFO_RESPONSE_CODE );

            if( $info == self::RESPONSE_SUCCESSFUL )
            {
                $this->setSuccessful( true );
            }
        }

        protected function getLink()
        {
            return self::google_url . $this->getUrl();
        }

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

        /**
         * @return CurlHandle
         */
        public function getCh(): CurlHandle
        {
            return $this->ch;
        }

        /**
         * @param CurlHandle $ch
         * @return void
         */
        public function setCh( CurlHandle $ch ): void
        {
            $this->ch = $ch;
        }

        /**
         * @return bool
         */
        public function isSuccessful(): bool
        {
            return $this->successful;
        }

        /**
         * @param bool $successful
         */
        public function setSuccessful(bool $successful): void
        {
            $this->successful = $successful;
        }
    }
?>