Composer install is mandatory to download all packages:
* `composer install`

Run through native PHP. PHP 7.1 is required:
* Command: `bin/console app:calculate-cubes-intersection-volume`
* Tests: `vendor/bin/phpunit`

Run through Docker container with PHP 7.1:
* Command: `docker run -it --rm --name nektria-test-container -v "$PWD":/usr/src/nektria-test -w /usr/src/nektria-test php:7.1-cli bin/console app:calculate-cubes-intersection-volume`
* Tests: `docker run -it --rm --name nektria-test-container -v "$PWD":/usr/src/nektria-test -w /usr/src/nektria-test php:7.1-cli vendor/bin/phpunit`