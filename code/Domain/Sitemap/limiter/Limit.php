<?php
    /**
     *
     */
    namespace IoJaegers\Sitemap\Domain\Sitemap\limiter;

    use IoJaegers\Sitemap\Domain\Sitemap\elements\buffers\SitemapBuffer;


    /**
     *
     */
    abstract class Limit
    {
        /**
         *
         */
        public function __construct( ?SitemapBuffer $buffer )
        {
            $this->setBuffer( $buffer );
        }

        /**
         * @return bool
         */
        public abstract function checkLimit(): bool;

        /**
         * @return bool
         */
        public abstract function hitWarning(): bool;

        /**
         * @return bool
         */
        public abstract function hitNotice(): bool;

        /**
         * @return int
         */
        public abstract function queue(): int;

        // Variable
        private ?SitemapBuffer $buffer = null;

        // Accessor
        /**
         * @param SitemapBuffer|null $buffer
         */
        public final function setBuffer( ?SitemapBuffer $buffer ): void
        {
            $this->buffer = $buffer;
        }

        /**
         * @return SitemapBuffer|null
         */
        public final function getBuffer(): ?SitemapBuffer
        {
            return $this->buffer;
        }

    };
?>