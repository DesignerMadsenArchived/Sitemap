<?php
    /**
      *
     */
    namespace IoJaegers\Sitemap\Send;


    /**
     *
     */
    class GoogleSend
        extends PingService
    {
        /**
         * @param string $url
         * @throws \Exception
         */
        public function __construct( string $url )
        {
            parent::__construct();
            $this->setUrl( $url );
        }

        /**
         *
         */
        public function __destruct()
        {
            if(
                !is_null(
                    $this->getCurl()
                )
            )
            {
                curl_close(
                    $this->getCurl()
                );
            }

        }

        const google_url = 'https://www.google.com/ping?sitemap=';


        /**
         * @return string
         * @throws \Exception
         */
        public function fullLink(): string
        {
            if( is_string( $this->getUrl() ) )
            {
                return self::google_url . $this->getUrl();
            }
            else
            {
                throw new \Exception('URL NOT INITIALISED AS A STRING');
            }
        }

        /**
         * @return void
         * @throws \Exception
         */
        protected final function options(): void
        {
            curl_setopt( $this->getCurl(), CURLOPT_URL, $this->fullLink() );
            curl_setopt( $this->getCurl(), CURLOPT_RETURNTRANSFER, 1 );
        }

        /**
         * @return void
         */
        public function send(): void
        {
            $message = curl_exec( $this->getCurl() );

            $info = curl_getinfo( $this->getCurl(), CURLINFO_RESPONSE_CODE );

            if( $info == HTTPResponseTable::RESPONSE_SUCCESSFUL )
            {
                $this->setSuccessful( true );

                if( $this->getIsDebugging() )
                {
                    $this->setResponse( $message );
                }
                else
                {
                    unset( $message );
                }
            }
        }
    }
?>