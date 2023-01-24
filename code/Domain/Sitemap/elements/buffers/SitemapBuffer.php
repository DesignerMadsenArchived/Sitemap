<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain\Sitemap\elements\buffers;

	use IoJaegers\Sitemap\Domain\Sitemap\elements\entries\SitemapEntry;
    use IoJaegers\Sitemap\Domain\Sitemap\settings\SitemapSetting;


    /**
	 * 
	 */
	class SitemapBuffer
	{
		// constructors
        /**
         * @param SitemapSetting|null $setting
         */
        public function __construct(
			?SitemapSetting $setting
		)
		{
            $this->setSettings( $setting );
            $this->setEntries( array() );

            $this->setState(
                new SitemapBufferState( $this )
            );

            $this->getState()
                 ->calculate();
		}

		// Variables
		private ?array $entries = null;
        private ?SitemapSetting $settings = null;
        private ?SitemapBufferState $state;

        const zero = 0;


        // Execute
        /**
         * @param string $url
         * @return bool
         */
        public function create(
			string $url
		): bool
        {
            $url = SitemapEntry::create( $url );

            if( is_null( $url ) )
            {
                return false;
            }

            $this->appendToBuffer( $url );
            $this->updateState();

            return true;
        }


        /**
         * @param array $urls
         * @return int|bool
         */
        public function createFrom(
			array $urls
		): int|bool
        {
            $sizeOfArray = count( $urls );
            $idx = null;

            for( $idx = self::zero;
                 $idx < $sizeOfArray;
                 $idx ++ )
            {
                $current = $urls[$idx];

                $url = SitemapEntry::create( $current );

                if( is_null( $url ) )
                {
                    return $idx;
                }

                $this->appendToBuffer( $url );
            }

            $this->updateState();

            return true;
        }


        /**
         * @param SitemapEntry $entry
         * @return void
         */
        protected final function appendToBuffer(
			SitemapEntry $entry
		): void
        {
            array_push($this->entries, $entry );
        }

        /**
         * @param int $urlPosition
         * @return string
         */
        public function read(
			int $urlPosition
		): string
        {
            return $this->getEntryAtIndex( $urlPosition )
                        ->toString();
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
         * @return void
         */
        public function clear(): void
        {
            unset( $this->entries );
            $this->entries = array();
        }

        /**
         * @param $url
         * @return bool
         */
        public function existUrl(
			$url
		): bool
        {
            $size = $this->getState()->getSizeOfBuffer()->getValue();
            $index = null;
            $result = false;

            for( $index = self::zero;
                 $index< $size;
                 $index++ )
            {
                $entry = $this->getEntryAtIndex( $index );
                $url_parsed = parse_url( $url );

                if( $url_parsed[ 'path' ] == $entry->getUrlPath() )
                {
                    $result = true;
                }
            }

            return $result;
        }

        /**
         * @param int $index
         * @return SitemapEntry
         */
        public function getEntryAtIndex(
			int $index
		): SitemapEntry
        {
            return $this->getEntries()[$index];
        }

        /**
         * @return int
         */
        public function length(): int
        {
            return $this->getState()
                        ->getSizeOfBuffer()
                        ->getValue();
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
        public function setSettings(
			?SitemapSetting $settings
		): void
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
        public function setState(
			?SitemapBufferState $state
		): void
        {
            $this->state = $state;
        }
	}
?>