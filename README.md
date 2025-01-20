# Domain Monitor

Domain Monitor is a Laravel-based application that verifies any domain is online and responding and alerts you if it goes offline.

## Requirements

- PHP >= 7.3
- Composer
- Laravel >= 8.0
- MySQL or PostgreSQL

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/domain-monitor.git
    ```

2. Navigate to the project directory:
    ```bash
    cd domain-monitor
    ```

3. Install dependencies:
    ```bash
    composer install
    ```

4. Copy the `.env.example` file to `.env` and configure your environment variables:
    ```bash
    cp .env.example .env
    ```

5. Generate an application key:
    ```bash
    php artisan key:generate
    ```

6. Run the database migrations:
    ```bash
    php artisan migrate
    ```

7. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage

1. Register an account or log in.
2. Add your domain names to the monitoring list.
3. Set up notification preferences.
4. Generates an alert when the domain does not respond

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request.

## License

This project is licensed under the GNU GENERAL PUBLIC LICENSE. See the [LICENSE](LICENSE) file for details.

## Contact

For any inquiries or support, please contact [hello@andrewcraigmorgan.co.uk](mailto:hello@andrewcraigmorgan.co.uk).
