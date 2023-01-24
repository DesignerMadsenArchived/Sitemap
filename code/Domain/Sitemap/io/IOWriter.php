<?php
    namespace IoJaegers\Sitemap\Domain\Sitemap\io;

    use IoJaegers\Sitemap\Domain\Sitemap\elements\buffers\SitemapBuffer;


    /**
     *
     */
    abstract class IOWriter
    {
        /**
         * @param SitemapBuffer|null $buffer
         */
        public function __construct(
			?SitemapBuffer $buffer
		)
        {
            $this->setBuffer( $buffer );
        }

        /**
         * @return string
         */
        public abstract function write(): string;

        /**
         * @return string
         */
        public abstract function flush(): string;


        //
        private ?SitemapBuffer $buffer = null;

        /**
         * @return SitemapBuffer|null
         */
        public final function getBuffer(): ?SitemapBuffer
        {
            return $this->buffer;
        }

        /**
         * @param SitemapBuffer|null $buffer
         */
        public final function setBuffer(
			?SitemapBuffer $buffer
		): void
        {
            $this->buffer = $buffer;
        }
    }
?>