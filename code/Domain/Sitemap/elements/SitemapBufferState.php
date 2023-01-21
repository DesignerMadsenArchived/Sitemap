<?php
	/**
	 *
	 */
    namespace IoJaegers\Sitemap\Domain\Sitemap\elements;

	/**
	 * 
	 */
	class SitemapBufferState
	{
		// Constructor
		public function __construct( SitemapBuffer $buffer )
		{
            $this->setBuffer(
                $buffer
            );

            $this->setSizeOfBuffer(
                self::zero
            );
		}

        /**
         * @return void
         */
        public function calculate(): void
        {

        }

		// Variables
        private SitemapBuffer $buffer;
        private int $sizeOfBuffer;

        const zero = 0;


        /**
         * @return SitemapBuffer
         */
        public final function getBuffer(): SitemapBuffer
        {
            return $this->buffer;
        }

        /**
         * @param SitemapBuffer $buffer
         */
        public final function setBuffer( SitemapBuffer $buffer ): void
        {
            $this->buffer = $buffer;
        }

        /**
         * @return int
         */
        public function getSizeOfBuffer(): int
        {
            return $this->sizeOfBuffer;
        }

        /**
         * @param int $sizeOfBuffer
         */
        public function setSizeOfBuffer( int $sizeOfBuffer ): void
        {
            $this->sizeOfBuffer = $sizeOfBuffer;
        }
	}
?>