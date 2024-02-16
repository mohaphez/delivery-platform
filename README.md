# Delivery Management Platform

This project is a scalable SaaS-style platform designed to assist fuel delivery companies in managing their operations efficiently. The platform is built using Laravel, a PHP framework, and utilizes the Filament package for the admin panel, Stancl/Tenancy for multi-tenancy support, and Vue.js for the client panel.

## Features:

- **Multi-Tenancy:** The platform supports multi-tenancy to ensure data segregation and security between different fuel delivery companies. Each company has its own dedicated space within the platform.

- **User Management:**
    - Users can log in, access the system, and create orders for clients.
    - Clients have the ability to create orders for fuel delivery to their addresses.

- **Order Management:**
    - Represents the amount of fuel to be delivered to the client's address.
    - Orders are created and saved by users.

- **Modular Structure:**
    - The project is organized into modules, each focusing on specific functionalities.
    - Modules use services and repositories for efficient code organization and separation of concerns.

- **Vue.js Components:**
    - The client panel is built using Vue.js components, ensuring a smooth and responsive user experience.

- **Testing:**
    - Some modules include feature tests to ensure code quality and reliability.

- **Themes:**
    - The platform supports a multi-theme structure, providing flexibility in the visual appearance.

- **Filament Admin Panel:**
    - Utilizes Filament for the admin panel, offering a powerful and customizable interface for managing system users and entities.

## Deployment:
### Development Environment (Sail Docker):

- Clone the repository:

```bash
git clone https://github.com/your-username/fuel-delivery-platform.git
cd fuel-delivery-platform
```

- Copy the .env.example file:

```bash
cp .env.example .env
```

- Edit the .env file and configure the database and other necessary settings.

Run the Laravel Sail containers:

```bash
sail up -d
```

- Install dependencies and migrate the database:

```bash
sail composer install
sail artisan migrate --seed
```

Access the application at http://localhost.


## CI/CD:
- For production deployment, use the Dockerized version of the application.
- Ensure the production environment variables are configured in the .env file.

## Additional Information:

- **Tenancy Management:**
    - The Stancl/Tenancy package is used for efficient tenancy management, separating databases, caches, and events for each tenant.

- **Filament Admin Panel:**
    - Filament is used for the admin panel, providing a rich and extensible interface for managing system users, entities, and configurations.
    - Advantages include a customizable dashboard, user management, entity management, and a built-in role and permission system.
