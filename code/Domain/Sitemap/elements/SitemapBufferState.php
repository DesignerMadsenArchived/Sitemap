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
        /**
         * @param SitemapBuffer $buffer
         */
		public function __construct( SitemapBuffer $buffer )
		{
            $this->setBuffer(
                $buffer
            );

            $this->setSizeOfBuffer(
                new Counter( value:
                             self::zero )
            );
		}

        /**
         * @return void
         */
        public function calculate(): void
        {
            if( $this->isBufferSet() )
            {
                $this->getSizeOfBuffer()
                     ->setValue(
                    count( $this->getBuffer()
                                ->getEntries()
                    )
                );
            }
        }

		// Variables
        private SitemapBuffer $buffer;
        private Counter $sizeOfBuffer;

        const zero = 0;


        public function isBufferSet(): bool
        {
            return isset($this->buffer);
        }

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
         * @return Counter
         */
        public function getSizeOfBuffer(): Counter
        {
            return $this->sizeOfBuffer;
        }

        /**
         * @param Counter $sizeOfBuffer
         * @return void
         */
        public function setSizeOfBuffer( Counter $sizeOfBuffer ): void
        {
            $this->sizeOfBuffer = $sizeOfBuffer;
        }
	}
?>