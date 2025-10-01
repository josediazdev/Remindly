# Remindly - Task Manager

A modern, web-based task management application built with Laravel and CSS. Remindly helps you organize and track your daily tasks with a clean, intuitive interface.

## 🚀 Features

- **User Authentication**: Secure login and registration system
- **Task Management**: Create, edit, delete, and organize your tasks
- **Task Status Tracking**: Mark tasks as in-process or completed
- **Due Date Management**: Set and track due dates for your tasks
- **User Profiles**: Manage your personal information and settings
- **Responsive Design**: Works seamlessly on desktop and mobile devices
- **Pagination**: Efficiently browse through large numbers of tasks
- **Modern UI**: Clean, modern interface with CSS styling

## 📋 Task Features

Each task includes:
- **Title**: Clear, concise task name
- **Description**: Detailed information about the task
- **Due Date**: When the task needs to be completed
- **Completion Date**: Automatic timestamp when marked complete

## 🛠️ Tech Stack

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Blade templates with Bootstrap CSS + custom styling
- **Database**: SQLite (default) or MySQL/PostgreSQL
- **Build Tools**: Vite, Laravel Vite Plugin
- **Icons**: Bootstrap Icons (CDN)
- **Authentication**: Laravel Breeze (built-in)
- **CSS Framework**: Bootstrap 5.3.2 (CDN) + custom CSS overrides

## 🎨 UI Components

### Bootstrap Icons
The application uses **Bootstrap Icons** for a consistent and modern icon set:
- **Calendar icons** for due dates
- **Edit icons** for task modification
- **Plus icons** for creating new tasks
- **File icons** for task management
- Icons are loaded via CDN for optimal performance
- All icons are semantic and accessible

### Styling Architecture
- **Bootstrap 5.3.2**: Base CSS framework loaded via CDN
- **Custom CSS Overrides**: Modern design system with futuristic color palette
- **CSS Variables**: Consistent theming with CSS custom properties
- **Glass Effects**: Modern glassmorphism design elements
- **Responsive Design**: Bootstrap's responsive grid + custom breakpoints
- **Modern UI**: Neon accents and space-themed interface over Bootstrap base

## 📋 Prerequisites

Before you begin, ensure you have the following installed:
- Composer (PHP dependency manager)
- Node.js and npm (for frontend assets)
- Git

## ⚡ Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/remindly.git
   cd remindly
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment Configuration**
   ```bash
   cp .env.example .env
   ```

   Update your `.env` file with appropriate settings:
   ```env
   APP_NAME="Remindly"
   APP_ENV=local
   APP_KEY=base64:your-generated-key
   APP_DEBUG=true
   APP_URL=http://localhost:8000

   DB_CONNECTION=sqlite
   # For production, you might want to use MySQL:
   # DB_CONNECTION=mysql
   # DB_HOST=127.0.0.1
   # DB_PORT=3306
   # DB_DATABASE=remindly
   # DB_USERNAME=your_username
   # DB_PASSWORD=your_password
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Run database migrations**
   ```bash
   php artisan migrate
   ```

7. **Build frontend assets**
   ```bash
   npm run build
   ```
   For development with hot reload:
   ```bash
   npm run dev
   ```

## 🚀 Running the Application

### Development Mode
```bash
php artisan serve
```
The application will be available at `http://localhost:8000`

### With Hot Reload (recommended for development)
```bash
# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Vite dev server
npm run dev

# Terminal 3 (optional): Queue worker
php artisan queue:work
```

## 📖 Usage

1. **Register** a new account or **login** if you already have one
2. **Create tasks** using the "New Task" button
3. **Edit tasks** by clicking the edit icon on any task card
4. **Mark tasks as complete** by updating their status
5. **Manage your profile** through the profile section

## 🗃️ Database Schema

### Users Table
- `id`: Primary key
- `first_name`: User's first name
- `last_name`: User's last name
- `email`: User's email address (unique)
- `password`: Hashed password
- Standard Laravel timestamps

### Tasks Table
- `id`: Primary key
- `user_id`: Foreign key to users table
- `title`: Task title (required)
- `description`: Task description (required)
- `due_date`: When the task should be completed
- `status`: Current status (in_process/completed)
- `completed_at`: Timestamp when task was completed
- Standard Laravel timestamps

## 🎨 Customization

### Styling
The application uses CSS for styling. You can customize the appearance by:
- Modifying CSS classes in the Blade templates
- Adding custom CSS in `resources/css/app.css`

### Adding New Features
- Create new migrations for database changes
- Add new routes in `routes/web.php`
- Create controllers in `app/Http/Controllers/`
- Build views in `resources/views/`

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- [Laravel](https://laravel.com/) - The PHP framework
- [Bootstrap Icons](https://icons.getbootstrap.com/) - For the icons


**Happy task managing! 🎯**
