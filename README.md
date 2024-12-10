# Water Level Monitoring System

A system to monitor river water levels in Selangor based on data from JPS Selangor.

Check it out live: [Water Level Monitoring System](https://water-level.onrender.com/)

---

## 🚨 Notice: Deprecated Project

Due to limitations with hosting on Render.com's free plan (e.g., server shutdown after 15 minutes of inactivity and slow restarts), this project has been rewritten using the Next.js framework and deployed to Vercel for better performance and reliability.

New Repository: [Next.js Version](https://github.com/luqman-haqeem/water-level)

---

## 💻 Tech Stack

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)

![Mysql](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

---

## 🚀 Getting Started

### Prerequisites

Ensure you have the following installed before starting:

-   PHP 7.4 or higher

-   Composer

-   A database server (Mysql is recommended)

-   Node.js and npm (optional, for frontend tasks)

Refer to the [Laravel Server Requirements](https://laravel.com/docs/5.4/installation#server-requirements) for more details.

---

### Installation

1. Clone the repository:

```bash

git clone <repo-link>

```

2. Navigate to the project directory:

```bash

cd <project-name>

```

3. Install dependencies:

```bash

composer install

```

4. Copy the example environment file and update it with your configuration:

```bash

cp .env.example .env

```

5. Generate a new application key:

```bash

php artisan key:generate

```

6. Set up the database:

-   Update the `.env` file with your database credentials.

-   Run the migrations to create the necessary tables:

```bash

php artisan migrate

```

7. Seed the database with sample data (optional):

```bash

php artisan db:seed

```

8. Start the development server:

```bash

php artisan serve

```

The application will be available at [http://localhost:8000](http://localhost:8000).

---

### Database Seeding

The database seeding process creates sample data, including users, stations, districts, and cameras.

To seed the database:

```bash

php  artisan  db:seed

```
