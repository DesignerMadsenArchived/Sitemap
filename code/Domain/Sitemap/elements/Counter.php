<?php
    /**
     *
     */
    namespace IoJaegers\Sitemap\Domain\Sitemap\elements;


    /**
     *
     */
    class Counter
    {
        /**
         * @param int $value
         */
        public function __construct( int $value = 0 )
        {
            $this->setValue( $value );
        }

        // Variable
        private int $value = 0;

        // Accessor
        /**
         * @return int
         */
        public function getValue(): int
        {
            return $this->value;
        }

        /**
         * @param int $value
         */
        public function setValue( int $value ): void
        {
            $this->value = $value;
        }

        /**
         * @return void
         */
        public function increment(): void
        {
            $this->increase( 1 );
        }

        /**
         * @param int $value
         * @return void
         */
        public function increase( int $value ): void
        {
            $this->setValue( $this->getValue() + $value );
        }

        /**
         * @return void
         */
        public function decrement(): void
        {
            $this->decrease( 1 );
        }

        /**
         * @param int $withValue
         * @return void
         */
        public function decrease( int $withValue ): void
        {
            $this->setValue($this->getValue() - $withValue);
        }
    }
?>