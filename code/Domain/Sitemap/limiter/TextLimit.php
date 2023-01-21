<?php
    /**
     *
     */
    namespace IoJaegers\Sitemap\Domain\Sitemap\limiter;

    use IoJaegers\Sitemap\Domain\Sitemap\elements\SitemapBuffer;


    /**
     *
     */
    class TextLimit
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
        public final function checkLimit(): bool
        {
            return false;
        }

        /**
         * @return bool
         */
        public final function hitWarning(): bool
        {

            return true;
        }

        /**
         * @return bool
         */
        public final function hitNotice(): bool
        {

            return true;
        }

        /**
         * @return int
         */
        public function queue(): int
        {
            // TODO: Implement queue() method.
            return -1;
        }
    };
?>