# HOW TO INSTALL
 - run composer install
 - create database and setup in the .env file
 - php artisan key:generate
 
# Generate data
 - run php artisan migrate:fresh --seed 
 - It will generate tables(stores, products, urls, store_circuits) and seed data (2 stores and 10 products using ProductFactory&StoreFactory) 
 - Also ProductObserver triggers URL generating for each products

# HOW TO RUN
 - php artisan serve
