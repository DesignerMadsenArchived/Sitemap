<?php
    namespace IoJaegers\Sitemap\Send;

    use CurlHandle;


    /**
     *
     */
    abstract class PingService
    {
        /**
         * @return bool
         */
        public final static function init(): bool
        {
            return true;
        }

        /**
         *
         */
        public function __construct()
        {
            if( self::init() )
            {
                $this->setCurl(
                    curl_init()
                );
            }
            else
            {
                throw new \Exception("MISSING LIBRARY EXTENSION: CURL");
            }
        }

        /**
         *
         */
        public function __destruct()
        {
            if( isset( $this->Curl ) )
            {
                curl_close(
                    $this->getCurl()
                );
            }
        }

        // Functions for implementation
        /**
         * @return void
         */
        public abstract function send(): void;

        /**
         * @return void
         */
        protected abstract function options(): void;

        /**
         * @return string
         */
        public abstract function fullLink(): string;


        /**
         * @return void
         */
        public final function execute(): void
        {
            $this->options();
            $this->send();
        }


        // Variables
        private ?CurlHandle $Curl = null;
        private ?string $url = null;

        private bool $isDebugging = false;

            // States
        private bool $successful = false;
		
        private ?string $response = null;


        // Accessors
        /**
         * @param string|null $url
         */
        public final function setUrl(
			?string $url
		): void
        {
            $this->url = $url;
        }

        /**
         * @param CurlHandle|null $Curl
         */
        public final function setCurl(
			?CurlHandle $Curl
		): void
        {
            $this->Curl = $Curl;
        }

        /**
         * @return string|null
         */
        public final function getUrl(): ?string
        {
            return $this->url;
        }

        /**
         * @return CurlHandle|null
         */
        public final function getCurl(): ?CurlHandle
        {
            return $this->Curl;
        }


        // States
        /**
         * @return bool
         */
        public final function isUrlNull(): bool
        {
            return is_null( $this->url );
        }

        /**
         * @return bool
         */
        public final function isUrlSet(): bool
        {
            return isset( $this->url );
        }


        /**
         * @return bool
         */
        public final function isSuccessful(): bool
        {
            return $this->successful;
        }

        /**
         * @param bool $successful
         */
        public final function setSuccessful(
			bool $successful
		): void
        {
            $this->successful = $successful;
        }

        /**
         * @return bool
         */
        public final function getIsDebugging(): bool
        {
            return $this->isDebugging;
        }

        /**
         * @param bool $isDebugging
         * @return void
         */
        public final function setIsDebugging(
			bool $isDebugging
		): void
        {
            $this->isDebugging = $isDebugging;
        }

        /**
         * @return string|null
         */
        public final function getResponse(): ?string
        {
            return $this->response;
        }

        /**
         * @param string|null $response
         */
        public final function setResponse(
			?string $response
		): void
        {
            $this->response = $response;
        }
    }
?>