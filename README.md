**Running SHARPLY docker container**

Ask for the .env file before running the below commands, if you don't have it already

You must have Docker Dekstop installed on your machine.

Clone the **main** branch of this repo.

Using a terminal, cd into the project folder and run the following commands in succession:

**Build and start the app container**
1. *docker-compose build && docker-compose up -d*

**Run the necessary migrations and seeders for testing**
2. After the container has been built and started sucessfully,
   enter the command: 
   1. *docker-compose exec sharply_app bash*
   2. *php artisan migrate*
   3. *php artisan db:seed*

You can now access the endpoints using the base_url as: **localhost:8000**