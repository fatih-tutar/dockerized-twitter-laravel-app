# Laravel Twitter App

This project is a Laravel application dockerized with MySQL database. The main focus of the project is on setting up and running the application using Docker, rather than replicating all features of Twitter.

## Features

- **User Registration:** Allows users to register for an account.
- **User Login:** Provides authentication for registered users.
- **Tweet Listing:** Displays a list of tweets from users.
- **Tweet Creation:** Enables users to create new tweets.

## Technologies and Tools

- **Laravel:** PHP-based web application framework. (Authentication system utilized)
- **MySQL:** Database management system.
- **PhpMyAdmin:** Web-based interface for managing MySQL databases.
- **Docker:** Containerization for easier deployment and portability.
- **Vite:** Frontend development

## Running the Project

1. **Docker Installation:** Install Docker Desktop on your computer.
   
2. **Downloading the Project:** Clone the project using Terminal or Git bash:
   ```bash
   git clone <repository-link>
   cd <project-directory>
3. Running with Docker:
    ```bash
    docker-compose up -d --build
4. Accessing the Application:

    - Application: http://localhost:9000/
    - PhpMyAdmin: http://localhost:9001/

5. Adding Dummy Data (Optional):
    ```
    docker-compose exec laravel-app php artisan db:seed
    ```
6. Stopping the Application:
    ```
    docker-compose down
    ```
## Developer
This project is developed to enhance backend skills, with frontend design being a secondary focus.