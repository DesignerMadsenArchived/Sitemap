<?php
    /**
     *
     */
    namespace IoJaegers\Sitemap\Domain\Sitemap\limiter;

    use IoJaegers\Sitemap\Domain\Sitemap\elements\SitemapBuffer;


    /**
     *
     */
    class RSSLimit
        extends Limit
    {
        /**
         * @param SitemapBuffer|null $buffer
         */
        public function __construct( ?SitemapBuffer $buffer )
        {
            Limit::__construct( $buffer );
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