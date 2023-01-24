<?php
    /**
     *
     */
    namespace IoJaegers\Sitemap\Domain\TBM;


    /**
     *
     */
    class FloatCounter
        implements Counter
    {
		/**
		 * @param float $value
		 */
        public function __construct(
			float $value = self::zero
		)
        {
            $this->setValue( $value );
        }

        // Variable
        private float $value = 0;

			// constants
        const one = 1.0;
		
        const zero = 0.0;

		
        // Accessor
		/**
		 * @return float
		 */
        public final function getValue(): float
        {
            return $this->value;
        }
	
		/**
		 * @param float $value
		 * @return void
		 */
        public final function setValue( float $value ): void
        {
            $this->value = $value;
        }

        /**
         * @return void
         */
        public final function increment(): void
        {
            $this->increase( self::one );
        }
	
		/**
		 * @param float $value
		 * @return void
		 */
        public final function increase( float $value ): void
        {
            $this->setValue( $this->getValue() + $value );
        }

        /**
         * @return void
         */
        public final function decrement(): void
        {
            $this->decrease( self::one );
        }
	
		/**
		 * @param float $withValue
		 * @return void
		 */
        public final function decrease( float $withValue ): void
        {
            $this->setValue($this->getValue() - $withValue );
        }
    }
?>