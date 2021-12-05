php artisan cache:clear 
php artisan config:clear

#Run Database Migrations

php artisan migrate:fresh --force

# Run Seeds

php artisan db:seed --force