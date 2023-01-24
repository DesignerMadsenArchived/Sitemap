<?php
    /**
     *
     */
    namespace IoJaegers\Sitemap\Domain\Sitemap\limiter;

    use IoJaegers\Sitemap\Domain\Sitemap\elements\buffers\SitemapBuffer;


    /**
     *
     */
    class XMLLimit
        extends Limit
    {
        /**
         * @param SitemapBuffer|null $buffer
         */
        public final function __construct(
			?SitemapBuffer $buffer
		)
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
        public final function hasHitWarning(): bool
        {

            return true;
        }

        /**
         * @return bool
         */
        public final function hasHitNotice(): bool
        {

            return true;
        }

        /**
         * @return int
         */
        public function queueNewList(): int
        {
            // TODO: Implement queue() method.
            return -1;
        }
    };
?>