# UShare Alpha Admin Dashboard

## Overview

UShare Alpha Admin Dashboard is a project designed for owners of multiple stores to manage subscriptions efficiently. It focuses on handling subscriptions for UShare Alpha services. The dashboard is tailored for administrators working in the stores, providing them with the tools necessary to manage bundles, cycles, and user subscriptions.

## Database Structure

The project comprises three main tables:

1. **Bundles Table**: Contains information about different bundles (e.g., 1GB, 5GB Mega).

2. **Cycle Table**: Manages cycles with start and end dates. Each cycle can have associated bundles.

3. **CycleBundles Table**: Connects bundles to cycles, allowing for easy management and modification of cycle requirements.

## User Roles and Permissions

The system implements a role-based access control system with the following roles:

- **Super Admin**: Has full access to the dashboard and can perform all actions.
- **Admin**: Has limited access compared to the Super Admin.
- **User**: Can select and manage subscriptions with restricted permissions.

Additionally, there is a special role named **show-archive** that allows users to view the archive of cycles before the current month.

## Subscription Management

The heart of the system lies in the **Subscriptions Table**, which includes widgets for statistics on approved and unapproved subscriptions. The table also displays the cost per process for approved subscriptions. Super Admins can create, delete, and edit users as needed.

## Dashboard Features

- **Bundles Management**: Create, edit, and delete bundles.
- **Cycle Management**: Define start and end dates for cycles and associate bundles with them.
- **Role Management**: Assign roles to administrators with specific permissions.
- **Subscription Widgets**: Track statistics on approved and unapproved subscriptions, including cost per process for approved subscriptions.
- **User Management**: Create, edit, and delete users with various filters and search functionality.



## requirements
1. "php": "^8.0.2",
2. "laravel/framework": "^9.19",

## Getting Started

1. Clone the repository: `git clone https://github.com/karim-boulad0/UshareFilament.git`
2. Install dependencies: `composer install`
3. Configure the database connection in the appropriate configuration file.
4. Run the application: `php artisan serve`
5.  got to http://127.0.0.1:8000/login page and you have two admins accounts 
 1-email : super@gmail.com , password : super123$%  
 2-email : admin@gmail.com , password : admin123$%  
6. got to http://127.0.0.1:8000/ link then go to roles section that exist in side bar and take the super admin the all  permessions and if you want to make new role you can 

