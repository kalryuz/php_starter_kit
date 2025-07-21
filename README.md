# 🚀 PHP Starter Kit

A simple and structured PHP system designed for **students** and **beginners** to learn how to build clean and modular web applications with PHP.

This starter kit integrates modern UI and JS tools to help you quickly build real-world systems.

---

## 📘 Project Description

This project helps new PHP developers learn the structure of a PHP system and how to integrate commonly used components.

It includes the following integrations:

- ✅ **AdminLTE 4** — A responsive, modern admin dashboard UI.
- ✅ **DataTables** — For displaying searchable, sortable, and paginated data.
- ✅ **SweetAlert2** — For beautiful alert and confirmation popups.
- ✅ **Session Flash Messages** — To show user feedback like success or error.
- ✅ **Helper Functions** — For things like `base_url()`, redirection, alerts, etc.

You can use this as a starting point for projects like:

- Inventory management
- School/student systems
- Admin dashboards
- CRUD-based applications

---

## ✅ Requirements

Before starting, make sure you have:

- [XAMPP](https://www.apachefriends.org/) **or** [Laragon](https://laragon.org/)
- PHP **8.0 or higher**
- MySQL or MariaDB
- Web browser (Chrome, Firefox, etc.)

---

## ⚙️ Installation Instructions

### 📁 1. Clone or Download the Project

Clone via Git (if Git is installed):

```bash
git clone https://github.com/kalryuz/php_starter_kit.git

🗂 Project Folder Structure
php_starter_kit/
├── assets/                 # All static assets (CSS, JS, images)
│   ├── css/                # Custom stylesheets
│   ├── js/                 # Custom JavaScript files
│   └── vendor/             # Third-party libraries (AdminLTE, DataTables, etc.)
│
├── config/                 # Configuration files
│   └── db.php              # Database connection setup
│
├── database/
│   └── php_starter_kit.sql # SQL file to import into phpMyAdmin
│
├── functions/              # Reusable helper functions
│   └── helper.php          # base_url(), alert(), redirect(), etc.
│
├── includes/               # Common layout components
│   ├── header.php          # HTML header, navigation bar
│   ├── footer.php          # HTML footer
│   └── sidebar.php         # (Optional) Sidebar menu
│
├── pages/                  # Page-specific logic and views
│   ├── dashboard.php       # Example dashboard page
│   ├── users.php           # Example user listing page
│   └── add_user.php        # Example form page
│
├── index.php               # Project entry point
├── .htaccess               # (Optional) Apache URL rewrite settings
└── README.md               # Project documentation
