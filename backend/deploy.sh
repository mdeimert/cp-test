chmod -R 777 ./storage
chmod -Rf 777 ./storage/logs
chmod -Rf 777 ./storage/framework/views/
chmod -Rf 777 ./storage/framework/sessions/
chmod -Rf 777 ./storage/framework/cache/

composer install
composer dumpautoload
# npm install
# npm run prod

chmod -R 777 ./vendor
chmod -R 777 ./storage
chmod -R 777 ./public
chmod -Rf 777 ./storage/logs
chmod -Rf 777 ./storage/framework/views/
chmod -Rf 777 ./storage/framework/sessions/
chmod -Rf 777 ./storage/framework/cache/

php artisan config:clear
php artisan cache:clear

# Ensure migrations are run fresh
php artisan migrate:fresh --force

# Generate Key
php artisan key:generate

# Add Seed Data
php artisan db:seed --force

# Generate swagger
php artisan l5-swagger:generate

#images!
php artisan storage:link
echo 'Finished Initializing the server :)' 