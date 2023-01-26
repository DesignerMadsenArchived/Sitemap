<?php
	/**
	 *
	 */
    namespace IoJaegers\Sitemap\Domain\Sitemap\elements\buffers;
	
	use IOJaegers\HRBF\Math\Counters\IntegerCounter;
	
	
	/**
	 *
	 */
	class SitemapBufferState
	{
		// Constructor
        /**
         * @param SitemapBuffer $buffer
         */
		public function __construct(
			SitemapBuffer $buffer
		)
		{
            $this->setBuffer(
                $buffer
            );

            $this->setSizeOfBuffer(
                new IntegerCounter( value: self::zero )
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
		
        private IntegerCounter $sizeOfBuffer;

			// Constant
        const zero = 0;


		// Is states
		/**
		 * @return bool
		 */
        public function isBufferSet(): bool
        {
            return isset( $this->buffer );
        }

		// Accessors
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
        public final function setBuffer(
			SitemapBuffer $buffer
		): void
        {
            $this->buffer = $buffer;
        }

        /**
         * @return IntegerCounter
         */
        public function getSizeOfBuffer(): IntegerCounter
        {
            return $this->sizeOfBuffer;
        }

        /**
         * @param IntegerCounter $sizeOfBuffer
         * @return void
         */
        public function setSizeOfBuffer(
			IntegerCounter $sizeOfBuffer
		): void
        {
            $this->sizeOfBuffer = $sizeOfBuffer;
        }
	}
?>