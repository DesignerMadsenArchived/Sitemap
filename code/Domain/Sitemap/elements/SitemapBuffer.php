<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain\Sitemap\elements;

	use IoJaegers\Sitemap\Domain\Sitemap\settings\SitemapSetting;


    /**
	 * 
	 */
	class SitemapBuffer
	{
		// constructors
		public function __construct( ?SitemapSetting $setting )
		{
            $this->setSettings( $setting );
            $this->setEntries( array() );

            $this->setState(
                new SitemapBufferState( $this )
            );

            $this->getState()->calculate();
		}
		
		
		// Variables
		private ?array $entries = null;
        private ?SitemapSetting $settings = null;
        private ?SitemapBufferState $state;

        const zero = 0;


        // Execute
        /**
         * @return bool
         */
        public function create(): bool
        {

            $this->updateState();
            return false;
        }

        /**
         * @param int $urlPosition
         * @return string
         */
        public function read( int $urlPosition ): string
        {
            return "";
        }

        /**
         * @return bool
         */
        public function delete(): bool
        {

            $this->updateState();
            return false;
        }

        /**
         * @return bool
         */
        public function update(): bool
        {

            $this->updateState();
            return false;
        }


        /**
         * @return int
         */
        public function length(): int
        {
            return $this->getState()
                        ->getSizeOfBuffer();
        }

        /**
         * @return bool
         */
        protected function updateState(): bool
        {
            $this->getState()
                 ->calculate();
            return false;
        }

		// Accessors
		/**
		 * @return array|null
		 */
		public function getEntries(): ?array
		{
			return $this->entries;
		}
		
		/**
		 * @param array|null $entries
		 */
		public function setEntries( ?array $entries ): void
		{
			$this->entries = $entries;
		}

        /**
         * @return bool
         */
        public function isEntriesEmpty(): bool
        {
            if( $this->isEntriesNull() )
            {
                return true;
            }

            return ( count( $this->entries ) == self::zero );
        }

        /**
         * @return bool
         */
        public function isEntriesNull(): bool
        {
            return is_null( $this->entries );
        }

        /**
         * @param SitemapSetting|null $settings
         */
        public function setSettings( ?SitemapSetting $settings ): void
        {
            $this->settings = $settings;
        }

        /**
         * @return SitemapSetting|null
         */
        public function getSettings(): ?SitemapSetting
        {
            return $this->settings;
        }

        /**
         * @return bool
         */
        public function isSettingsNull(): bool
        {
            return is_null( $this->settings );
        }

        /**
         * @return SitemapBufferState|null
         */
        public function getState(): ?SitemapBufferState
        {
            return $this->state;
        }

        /**
         * @param SitemapBufferState|null $state
         */
        public function setState( ?SitemapBufferState $state ): void
        {
            $this->state = $state;
        }
	}
?>