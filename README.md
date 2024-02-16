# Delivery Management Platform

This project is a scalable SaaS-style platform designed to assist delivery companies in managing their operations efficiently. The platform is built using Laravel, a PHP framework, and utilizes the Filament package for the admin panel, Stancl/Tenancy for multi-tenancy support, and Vue.js for the client panel.

## Features:

- **Multi-Tenancy:** The platform supports multi-tenancy to ensure data segregation and security between different delivery companies. Each company has its own dedicated space within the platform.

- **User Management:**
    - Users can log in, access the system, and create orders for clients.
    - Clients have the ability to create orders for delivery to their addresses.

- **Order Management:**
    - Represents the amount of item to be delivered to the client's address.
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
git clone https://github.com/mohaphez/delivery-platform.git
cd delivery-platform
```

- Install the project dependencies using Composer:

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs --no-scripts
```

- Copy the .env.example file:

```bash
cp .env.example .env
```

- Edit the .env file and configure the database and other necessary settings.

- Run the Laravel Sail containers:

```bash
./vendor/bin/sail up -d
```

- Generate the application key:

```bash
./vendor/bin/sail artisan key:generate
```

- Update the Composer dependencies (required):
```bash
./vendor/bin/sail composer update
```

- Migrate the database:

```bash
./vendor/bin/sail artisan module:migrate
./vendor/bin/sail artisan module:seed
./vendor/bin/sail artisan tenants:run module:seed
```

- Assign the role and permission to the default user:

```bash
./vendor/bin/sail artisan shield:generate --resource=RoleResource --option=permissions

./vendor/bin/sail artisan shield:super-admin

./vendor/bin/sail artisan tenants:run shield:generate --option="resource=RoleResource" --option="option=permissions"

./vendor/bin/sail artisan tenants:run shield:super-admin
```

- Install NPM dependencies and compile assets:

```bash
./vendor/bin/sail npm install && ./vendor/bin/sail npm run mars:install
```

- Run npm watch to compile assets:

```bash
./vendor/bin/sail npm run mars:dev
```
- Set domain and subdomains in the hosts file:

```bash
 127.0.0.1 center.test
 127.0.0.1 haio.center.test
 127.0.0.1 petro.center.test
 ```

### Access the Lord application manager panel at http://center.test/manager/login.

![image](https://github.com/mohaphez/delivery-platform/assets/20874565/32b39c5a-741b-425d-ac8b-f6991bf4d2dc)

### Access the client Haio application at http://haio.center.test.

![image](https://github.com/mohaphez/delivery-platform/assets/20874565/473fa4bd-6c06-4119-94b4-f8c5b5918732)

### Access the client Petro application at http://petro.center.test.

![image](https://github.com/mohaphez/delivery-platform/assets/20874565/971e5a61-644e-4958-b0a2-c86bf09c91f0)

### Access the Haio application agent panel at http://haio.center.test/agent/login.

![image](https://github.com/mohaphez/delivery-platform/assets/20874565/2aad8991-785a-4ab5-9859-8b98f6b8046b)

### Access the Petro application agent panel at http://petro.center.test/agent/login.

![image](https://github.com/mohaphez/delivery-platform/assets/20874565/175c8770-7f98-4089-8ace-922e1342899b)



### Default Credentials

- Admin User:
  - Username: admin@example.com
  - Password: password
- Agent User:
  - Username: agent@example.com
  - Password: password
- Client User:
  - Username: client@example.com
  - Password: password

## CI/CD:

- CI/CD are managed through GitHub Actions.
- The GitHub Actions workflow can be found in the `.github` folder.
- The workflow includes the following steps:

  1. **Test Stage:**
    - After each merge pull request, tests are automatically run to ensure code quality and reliability.
    - Any issues identified during testing will halt the deployment process.

  2. **Docker Image Creation:**
    - Upon successful testing, a Docker image is created for the latest version of the code.
    - The Dockerfile and configuration files for the staging environment are utilized during this process.

  3. **Docker Image Push:**
    - The newly created Docker image is then pushed to the Docker registry, making it accessible for deployment in production.

- This automated workflow ensures consistency, reliability, and efficiency in deploying the latest code changes to the production environment.

## Additional Information:

- **Tenancy Management:**
    - The Stancl/Tenancy package is used for efficient tenancy management, separating databases, caches, and events for each tenant.

- **Filament Admin Panel:**
    - Filament is used for the admin panel, providing a rich and extensible interface for managing system users, entities, and configurations.
    - Advantages include a customizable dashboard, user management, entity management, and a built-in role and permission system.


## Contact Me:

If you have any questions, suggestions, or just want to chat about this project or anything related, feel free to reach out. I'm always open to collaboration and discussions.

- **Email:** mohaphez[at]gmail.com

Looking forward to connecting with you!
