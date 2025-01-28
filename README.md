## Purpose
This project is a RESTful API for task management built with Laravel. It enables users to manage tasks effectively by providing endpoints for creating, reading, updating, and deleting tasks. Authentication is implemented using Laravel Sanctum, ensuring secure access to the API.

## Key Features
- CRUD operations for managing tasks:
- List all tasks (GET /tasks)
- Create a new task (POST /tasks)
- Update an existing task (PUT /tasks/{id})
- Delete a task (DELETE /tasks/{id})
- Input validation for all endpoints.
- Authentication using Laravel Sanctum.

### How to Set Up and Run the Project Locally
- Prerequisites
- PHP 8.2
- Composer
- MySQL (or any database supported by Laravel)
- Laravel CLI
- Postman (or any API testing tool) for testing the API

## Step 1: Clone the repository
Clone the repository and then locate the directory the project

## Step 2: Install the dependecies
Open the project and then enter command php artisan install to install the dependecies

## Step 3: Import the SQL file add phpmyadmin
Open phpmyadmin and create database, after that import the sql file that located in database folder

## Step 4: Migrate the database
Run the database migrations by entering php artisan migrate

## Step 4: Run the project
Run the project by enter command php artisan serve and test the API
