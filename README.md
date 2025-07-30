# 🏢 Human Resources Management System (HRMS)

Sistem Manajemen Sumber Daya Manusia (HRMS) yang komprehensif dikembangkan untuk mengelola berbagai aspek operasional HR dalam sebuah organisasi dengan teknologi modern dan user-friendly interface.

## 🛠️ Tech Stack

<div align="center">

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)

</div>

## ✨ Features

- 👥 **Employee Management** - Comprehensive employee profiles and data management
- 📊 **Dashboard Analytics** - Real-time HR metrics and reporting
- 📅 **Leave Management** - Leave requests, approvals, and tracking system
- ⏰ **Attendance Tracking** - Time-in/time-out and attendance monitoring
- 💰 **Payroll Management** - Salary calculations and payroll processing
- 🎯 **Performance Evaluation** - Employee performance tracking and reviews
- 📋 **Department Management** - Organizational structure management
- 🔐 **Role-based Access** - Multi-level user permissions and security
- 📱 **Responsive Design** - Mobile-friendly interface
- 📈 **Reports & Analytics** - Detailed HR reports and insights

## 🚀 Quick Start

### Prerequisites

- PHP >= 8.0
- Composer
- MySQL
- Node.js & NPM (for frontend assets)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Whoishugos/HumanResources-Management.git
   cd HumanResources-Management
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Faker (for sample data)**
   ```bash
   composer require fakerphp/faker
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   Edit `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=humanresources_db
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run database migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed database (optional)**
   ```bash
   php artisan db:seed
   ```

8. **Install frontend dependencies**
   ```bash
   npm install
   npm run dev
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

10. **Access the application**
    Navigate to `http://127.0.0.1:8000`

## 📁 Project Structure

```
HumanResources-Management/
├── app/
│   ├── Http/Controllers/    # Application controllers
│   ├── Models/             # Eloquent models
│   └── Providers/          # Service providers
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/           # Database seeders
├── public/                # Public assets
├── resources/
│   ├── views/             # Blade templates
│   ├── css/               # Stylesheets
│   └── js/                # JavaScript files
├── routes/                # Application routes
└── storage/               # File storage
```

## 🔧 Configuration

### Database Setup
- Create MySQL database: `hrms_db`
- Update `.env` with your database credentials
- Run migrations to create tables

### Default Admin Account
After seeding, you can login with:
- **Email**: admin@hrms.com
- **Password**: password123

### Environment Variables
Key environment variables to configure:
```env
APP_NAME="HRMS"
APP_ENV=local
APP_KEY=base64:your-app-key
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hrms_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## 📋 Usage

### For HR Administrators
- Manage employee records and profiles
- Process leave requests and approvals
- Generate payroll and reports
- Monitor attendance and performance

### For Employees
- View personal dashboard
- Submit leave requests
- Check attendance records
- Access payroll information

### For Managers
- Review team performance
- Approve/reject leave requests
- Access departmental reports
- Manage team schedules

## 🔧 Troubleshooting

| Issue | Solution |
|-------|----------|
| Composer install fails | Check PHP version (>=8.0) and memory limit |
| Migration errors | Ensure database exists and credentials are correct |
| Permission denied | Set proper permissions: `chmod -R 755 storage bootstrap/cache` |
| Assets not loading | Run `npm run dev` or `npm run production` |

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

## 📞 Support

For support and questions:
- Create an [Issue](https://github.com/Whoishugos/HumanResources-Management/issues)
- Contact: [Your Email]

---

<div align="center">
  <strong>Built with ❤️ using Laravel Framework</strong>
</div>
