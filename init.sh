# install logger
composer require logger

# install Doctrine
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle

# user bundle
composer require msgphp/user-bundle

# check for vulnerabilities
symfony check:security

# Set Initial data
php bin/console doctrine:migrations:migrate
php bin/console app:default-data