<?php
    /**
     *
     */
    namespace IoJaegers\Sitemap\Domain\Sitemap\limiter;

    use IoJaegers\Sitemap\Domain\Sitemap\elements\SitemapBuffer;


    /**
     *
     */
    class XMLLimit
        extends Limit
    {
        /**
         * @param SitemapBuffer|null $buffer
         */
        public function __construct( ?SitemapBuffer $buffer )
        {
            parent::__construct( $buffer );
        }

        /**
         * @return bool
         */
        public function checkLimit(): bool
        {
            return false;
        }

        /**
         * @return bool
         */
        public function hitWarning(): bool
        {

            return true;
        }

        /**
         * @return bool
         */
        public function hitNotice(): bool
        {

            return true;
        }
    };
?>