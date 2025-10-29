# Laravel Solid Clean Architecture

A professional demonstration project applying **SOLID principles** and **Clean Architecture** in a **Laravel 12** application — built to showcase maintainable, testable, and scalable backend design patterns.

---

## 🧱 Overview

This repository demonstrates how to structure a Laravel application following **SOLID principles** and **Clean Code** practices.  
It focuses on separation of concerns, dependency inversion, and testable components using a repository-service pattern.

### 🎯 Purpose

- To serve as a **reference architecture** for Laravel developers who want to write clean and professional backend code.
- To be used as a **public portfolio project** showcasing good practices and design discipline.

---

## ⚙️ Tech Stack

| Layer | Technology |
|-------|-------------|
| Backend Framework | Laravel 12 |
| Frontend | Inertia.js + Vue |
| Language | PHP 8.2 |
| Testing | PHPUnit |
| Static Analysis | PHPStan |
| Code Style | Laravel Pint |

---

## 🧩 Core Concepts Implemented

- **Repository Pattern** for data access abstraction  
- **Service Layer** for business logic isolation  
- **Dependency Injection** via Laravel Service Container  
- **Form Requests** for validation  
- **API Resources** for clean response formatting  
- **Custom Exceptions** for controlled error handling  
- **Policies and Authorization** (planned)  
- **Domain Events and Listeners** (planned)  
- **DTOs (Data Transfer Objects)** (planned)  
- **Automated Testing with PHPUnit** (planned)  

---

## 🏗️ Project Structure

```
app/
 ├── Http/
 │   ├── Controllers/
 │   │    └── ModuleController.php
 │   ├── Requests/
 │   │    ├── StoreModuleRequest.php
 │   │    └── UpdateModuleRequest.php
 │   ├── Resources/
 │        └── ModuleResource.php
 ├── Services/
 │   └── ModuleService.php
 ├── Interfaces/
 │   └── ModuleRepositoryInterface.php
 ├── Repositories/
 │   └── ModuleRepository.php
 ├── Providers/
 │   ├── AppServiceProvider.php
 │   └── RepositoryServiceProvider.php
 ├── Exceptions/
 │   └── ModuleNotFoundException.php
```

---

## 🚀 Getting Started

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/afadel151/solid-laravel.git
cd solid-laravel/final
```

### 2️⃣ Install Dependencies
```bash
composer install
npm install && npm run build
```

### 3️⃣ Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4️⃣ Run Migrations & Seeders
```bash
php artisan migrate --seed
```

### 5️⃣ Start the Server
```bash
php artisan serve
```

Visit: [http://localhost:8000](http://localhost:8000)

---

## 🧪 Testing

Run all automated tests with:
```bash
php artisan test
```

Or use PHPUnit directly:
```bash
vendor/bin/phpunit
```

---

## 🧼 Code Quality Tools

### 🧾 Pint (Code Formatter)
```bash
vendor/bin/pint
```

### 🔍 PHPStan (Static Analysis)
```bash
vendor/bin/phpstan analyse
```

---

## 🧠 Learning Outcomes

By studying this project, you’ll understand how to:

- Apply all **five SOLID principles** in a Laravel context  
- Implement **Repository-Service pattern** cleanly  
- Use **Dependency Injection** and **Interfaces** effectively  
- Build **maintainable validation & error handling** layers  
- Write **clean and expressive** Laravel code

---

## 🧰 Planned Enhancements

- ✅ Feature tests for repositories and services  
- ✅ DTOs for clean data transfer  
- ✅ Policy-based authorization  
- ✅ Events & Listeners for domain-level communication  
- ✅ API documentation via Swagger/OpenAPI  

---

## 📘 License

This project is open-sourced under the [MIT license](LICENSE).

---

## ✨ Author

**Akram**  
Laravel Developer & Software Engineer  
[LinkedIn](https://www.linkedin.com/in/akram-fadel-246129358/) • [GitHub](https://github.com/afadel151)

