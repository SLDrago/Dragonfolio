<p align="center">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

# DragonFolio

DragonFolio is a dynamic portfolio website built using Laravel and Bootstrap. It features CRUD operations and a secure login system implemented with Laravel Breeze.

## Getting Started

Follow these steps to set up and run the project on your local machine:

### Prerequisites

-   PHP installed on your machine
-   Composer (dependency manager for PHP)
-   Node.js and npm (Node Package Manager)

### Installation

1.  **Clone the project:**

    ```bash
    git clone <repository_url>
    ```

2.  **Navigate to the project directory:**

    ```bash
    cd DragonFolio
    ```

3.  **Install PHP dependencies:**

    ```bash
    composer install
    ```

4.  **Copy the environment file:**

    -   For Windows:

        ```bash
        copy .env.example .env
        ```

    -   For Unix/Linux/Mac:

        ```bash
        cp .env.example .env
        ```

5.  **Configure the environment:**

    Open the `.env` file and update the following fields:

    ```makefile
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

6.  **Generate application key:**

    ```bash
    php artisan key:generate
    ```

7.  **Install JavaScript dependencies and compile assets:**

    ```bash
    npm install && npm run dev
    ```

8.  **Run database migrations:**

    ```bash
    php artisan migrate
    ```

9.  **Seed the database (optional):**

    ```bash
    php artisan db:seed
    ```

10. **Start the Laravel development server:**

    ```bash
    php artisan serve
    ```

11. **Visit the URL shows in your terminal in your browser**

12. **Add missing IMG's to the 'public/storage/images/' by creating new folders**

    Modify the IMG locations as the images added to the folder.

## Contributing

Contributions are welcome! Feel free to submit pull requests or open issues for any bugs or feature requests.
