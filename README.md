# HOW TO INSTALL
 - run composer install
 - create database and setup in the .env file
 
# Generate data
 - run php artisan migrate to generate tables
 - run php artisan db:seed  
 - It will generate 2 stores and 10 products with ProductFactory&StoreFactory (also ProductObserver triggers URL generating for each products)

# HOW TO RUN
 - php artisan serve
