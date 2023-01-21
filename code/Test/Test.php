<?php
	/**
	 *
	 */
	namespace IoJaegers\Sitemap\Test;
	
	use IoJaegers\Sitemap\Domain\Sitemap\SitemapGenerator;

    /**
	 *
	 */
	class Test
	{
		/**
		 * @return int
		 */
		public static function run(): int
		{
			$test = new Test();
			return $test->runTest();
		}
		
		/**
		 * @return int
		 */
		public function runTest(): int
		{
            echo "running test \r\n";
            $generator = new SitemapGenerator();
            print_r( $generator );

            echo "\r\n";

			return 0;
		}
	}
?>