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
        private string $url = "https://www.xml-sitemaps.com/urllist.txt";

        private ?string $test_example = null;
        private ?SitemapGenerator $generator;

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
            $this->setGenerator(
                new SitemapGenerator()
            );

            $this->setTestExample(
                file_get_contents(
                    $this->getUrl()
                )
            );

            echo "RUNNING TEST - CODE ===> \r\n";
            $array = explode( PHP_EOL,
                              $this->getTestExample() );

            echo "Test: \r\n";

            $idx = null;
            $size = count( $array );

            for( $idx = 0;
                 $idx < $size;
                 $idx++ )
            {
                $current = $array[$idx];
                $this->getGenerator()
                     ->create( $current );
            }

            echo "ROW FORMAT ====> \r\n";
            $this->getGenerator()
                 ->getBuffer()
                 ->clear();

            $this->getGenerator()
                 ->createListOfUrls($array);

            print_r(
                $this->getGenerator()
                     ->getWriter()
                     ->write()
            );

            echo "END ===>";
            echo "\r\n";

            print_r($this->getGenerator()->getBuffer()->length());
            echo "\r\n";

            $v = $this->getGenerator()->findUrlInSet("https://www.xml-sitemaps.com/forum/index.php/board,8.0.html");

            if( $v )
            {
                echo "true\r\n";
            }
            else
            {
                echo "false \r\n";
            }

			return 0;
		}

        /**
         * @return string
         */
        public function getUrl(): string
        {
            return $this->url;
        }

        /**
         * @param string $url
         */
        public function setUrl( string $url ): void
        {
            $this->url = $url;
        }

        /**
         * @return SitemapGenerator|null
         */
        public function getGenerator(): ?SitemapGenerator
        {
            return $this->generator;
        }

        /**
         * @param SitemapGenerator|null $generator
         */
        public function setGenerator( ?SitemapGenerator $generator ): void
        {
            $this->generator = $generator;
        }

        /**
         * @return string|null
         */
        public function getTestExample(): ?string
        {
            return $this->test_example;
        }

        /**
         * @param string|null $test_example
         */
        public function setTestExample(?string $test_example): void
        {
            $this->test_example = $test_example;
        }
	}
?>