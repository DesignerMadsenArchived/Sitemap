<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Domain\Timestamp;
	
	
	/**
	 * 
	 */
	class Timestamp
	{
		/**
		 * @var TimestampType|null
		 */
		private ?TimestampType $type = null;
		
		/**
		 * @return TimestampType|null
		 */
		public function getType(): ?TimestampType
		{
			return $this->type;
		}
		
		/**
		 * @param TimestampType|null $type
		 */
		public function setType( ?TimestampType $type ): void
		{
			$this->type = $type;
		}
	}
?>