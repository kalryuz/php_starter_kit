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

### 1. Clone or Download the Project

Clone via Git (if Git is installed):

```bash
git clone https://github.com/kalryuz/php_starter_kit.git
```
## 📁 Project Folder Structure

```bash
php_starter_kit/
├── admin/                  # Example crud module from this starter kit
│   ├── create.php          # Create module
│   ├── edit.php            # Edit module
│   └── manage.php          # Read & Delete module
│
├── assets/                 # Template css, js and image
│   └── css/                # All css file 
│   └── img/                # This folder use to save ur image in system 
│   └── js/                 # All javascript file 
│
├── function/               # All function in this system
│   └── func.admin.php      # This file to handle CRUD from file /admin
│   └── func.auth.php       # To handle login authentication
│   └── func.logout.php     # To handle logout
│   └── upload_image.php    # This file to handle upload function
│
├── includes/               # All file use in structure system
│   └── config.php          # To handle connection to database
│   └── initialize.php      # All custom function for this structure.
│   └── message.php         # To display sweetalert in page.
│
├── template/               # Common layout components
│   ├── header.php          # HTML header & top navigation bar
│   ├── footer.php          # HTML footer
│   └── sidebar.php         # Sidebar menu
│
├── dashboard.php           # Dashboard for system after login
├── index.php               # Login page & first enpoint to this system
├── seed-admin.php          # This file use to seed first data for use this system
└── php_starter_kit.sql     # This file use to import to database for default starter kit table
```
