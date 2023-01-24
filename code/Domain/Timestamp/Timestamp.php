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
		public final function getType(): ?TimestampType
		{
			return $this->type;
		}
		
		/**
		 * @param TimestampType|null $type
		 */
		public final function setType( ?TimestampType $type ): void
		{
			$this->type = $type;
		}
	}
?>