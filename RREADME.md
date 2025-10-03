# Project Name

A full-stack application built with **Laravel** for the backend and **Vue.js + Inertia.js** for the frontend.

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Project Structure](#project-structure)
- [Routes & API](#routes--api)
- [Security Considerations](#security-considerations)
- [Development & Contribution](#development--contribution)
- [License](#license)

---

## Introduction
This project is a full-stack system for managing [your project domain, e.g., shipping parcels].  
Laravel is used as the backend framework, while Vue.js with Inertia.js provides a SPA-like frontend experience.

## Features
- User authentication & management using Laravel Sanctum
- SPA frontend with Vue.js + Inertia.js
- Full CRUD operations
- Responsive design for desktop and mobile
- Notifications using IziToast
- Optional multilingual support

## Prerequisites
- PHP >= 8.2
- Composer
- Node.js >= 22
- MySQL
- npm or yarn

## Installation
### Backend
```bash
# Clone the repository
git clone <REPO_URL>
cd <project-folder>

# Install dependencies
composer install

# Set up environment file
cp .env.example .env

# Generate app key
php artisan key:generate
php artisan wayfinder:generate

# Run migrations and seeders
php artisan migrate --seed

# Start Laravel server
php artisan serve

#routes for test
## http://postal_broker.test/api/users  //post
    ### example data
    ### {
    ###   "full_name": "Majid Ataei",
    ###   "mobile": "09198412978",
    ###   "address": "123 Main St, City",
    ###   "zip_code": "5619877131"
    ### }

## http://postal_broker.test/api/shipments // get & post
    ###example data
    ### {
    ###   "sender_id": "3faf286a-6e0a-49f5-91aa-67d93410ebe1",
    ###   "receiver_id": "a31e63b8-b264-4879-9ad4-baab3e8b575f",
    ###   "service_type": "express",
    ###   "status": "pending",
    ###   "description": "This is a test shipment with multiple packages",
    ###   "packages": [
    ###     {
    ###       "weight": 2.5,
    ###       "length": 30,
    ###       "width": 20,
    ###       "height": 15,
    ###       "package_type": "fragile"
    ###     },
    ###     {
    ###       "weight": 1.2,
    ###       "length": 15,
    ###       "width": 10,
    ###       "height": 8,
    ###       "package_type": "document"
    ###     },
    ###     {
    ###       "weight": 0.8,
    ###       "length": 10,
    ###       "width": 8,
    ###       "height": 5,
    ###       "package_type": "valuable"
    ###     }
    ###   ]
    ### }


## Installation
### Frontend
npm install
npm run dev
