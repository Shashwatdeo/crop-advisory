# Crop Advisory System

A comprehensive web application for farmers to receive crop suggestions, pest alerts, and weather information to improve their agricultural practices.

## Features

### For Farmers
- **Crop Suggestions**: Get personalized crop recommendations based on:
  - Current weather conditions
  - Soil type
  - Region
  - Season
  - Water requirements
  - Temperature range

- **Weather Information**:
  - Real-time weather data
  - Temperature forecasts
  - Humidity levels
  - Weather alerts and warnings

- **Pest Management**:
  - Pest identification
  - Treatment recommendations
  - Preventive measures
  - Alert system for pest outbreaks

### For Administrators
- **Dashboard**:
  - Overview of registered farmers
  - Active crop suggestions
  - Recent pest alerts
  - Weather warnings

- **User Management**:
  - View all registered users
  - Manage user roles and permissions
  - User status monitoring

- **Crop Management**:
  - Add/Edit/Delete crops
  - Set crop parameters
  - Manage crop database

- **Crop Suggestions Management**:
  - View all crop suggestions
  - Track suggestion history
  - Monitor suggestion accuracy
  - Manage suggestion parameters
  - View farmer feedback

- **Alert System**:
  - Create weather alerts
  - Issue pest warnings
  - Manage alert severity levels
  - Track alert status

## Project Structure

```
crop-advisory/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── CropController.php
│   │   │   │   ├── PestController.php
│   │   │   │   ├── UserController.php
│   │   │   │   └── WeatherController.php
│   │   │   ├── Auth/
│   │   │   ├── CropSuggestionController.php
│   │   │   ├── PestController.php
│   │   │   └── WeatherController.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── Crop.php
│   │   ├── Pest.php
│   │   ├── User.php
│   │   └── WeatherAlert.php
│   └── Services/
│       └── WeatherService.php
├── database/
│   ├── migrations/
│   └── seeders/
│       └── CropSeeder.php
├── resources/
│   └── views/
│       ├── admin/
│       │   ├── crops/
│       │   ├── dashboard.blade.php
│       │   ├── layout.blade.php
│       │   ├── pests/
│       │   ├── users/
│       │   └── weather/
│       ├── auth/
│       ├── crop_suggestions/
│       ├── pests/
│       └── weather/
└── routes/
    └── web.php
```

## Technology Stack

- **Backend**: Laravel 10.x
- **Frontend**: 
  - Blade Templates
  - Tailwind CSS
  - Alpine.js
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **Weather API**: OpenWeather API

## Installation

1. Clone the repository:
```bash
git clone https://github.com/yourusername/crop-advisory.git
cd crop-advisory
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Configure environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Set up database:
```bash
php artisan migrate
php artisan db:seed
```

5. Start the development server:
```bash
php artisan serve
npm run dev
```

## Configuration

1. Set up your database credentials in `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crop_advisory
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

2. Configure OpenWeather API:
```
OPENWEATHER_API_KEY=your_api_key
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For support, email support@cropadvisory.com or create an issue in the repository.

