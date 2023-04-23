<div align="center">
  <a href="https://checkmywebsite.online">
   <img src="https://github.com/griMarina/Taitotalo-project/blob/main/public/img/favicon/apple-touch-icon.png" alt="logo">  
  </a>

<h3 align="center">Brand Shop</h3>
  <p align="center">
This project was created as a study project during my internship at Taitotalo.    <br />
    <br />
    <a href="https://checkmywebsite.online">View website</a>
    ·
    <a href="#description">Description</a>
    ·
    <a href="#built-with">Built with</a>
    ·
    <a href="#installing">Installing</a>
     ·
    <a href="#testing">Testing</a>
    ·
    <a href="#features">Features</a>
    ·
    <a href="https://github.com/griMarina/Taitotalo-project/wiki">Wiki</a>
  </p>
</div>

### Description

The Brand Shop is a web-based application that allows users to browse and purchase fashion items online. The system is designed to provide a user-friendly interface that is easy to navigate and provides an intuitive shopping experience. The platform is fully responsive and optimized for different screen sizes. 

### Built with 
* PHP
* HTML
* SCSS
* JS
* MySQL

It follows the Model-View-Controller (MVC) architecture to separate the presentation logic from the business logic.

### Installing
To run the Taitotalo Fashion Shop project on your local machine, you need to have the following software installed:

* MAMP or XAMPP for running a local web server
* PHP version 8.0 or higher
* MySQL database

#### Steps
1. Clone the repository to your local machine:
 ```bash
   git clone https://github.com/griMarina/Taitotalo-project.git
   ```
2. Start your local web server (e.g., MAMP or XAMPP).
3. Create a new database in your MySQL server for the project.
4. Import the database from the data-dump.sql file in the project's root/data directory. You can do this by running the following command from the project directory:
```bash
   mysql -u mysql_username -pmysql_password database_name < data-dump.sql
   ```
Replace mysql_username with your MySQL username and database_name with the name of the database you created in step 3. You will be prompted to enter your MySQL password.

5. Configure the database connection settings in the config.php file located in the app directory. Replace the DB_HOST, DB_NAME, DB_USER, and DB_PASS values with your MySQL server details.
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'database_name');
define('DB_USER', 'mysql_username');
define('DB_PASS', 'mysql_password');
   ```
6. Start your local web server and open the project in your web browser by navigating to http://localhost/.

### Testing
1. Make sure that Composer is installed on your system by running the command ```composer --version```. If Composer is installed, it will output the version, otherwise, you'll need to install it on your system.
2. Open the CLI and navigate to the folder containing your project, which you cloned from the GitHub repository.
3. Run the command ```composer install``` to install all the dependencies listed in the composer.json file, including PHPUnit.
4. After installing the dependencies, run the command ```composer test``` to run the tests.
5. If the tests pass successfully, you'll see a message indicating that the tests passed, otherwise, you'll see error messages indicating the test failures.

### Features
* **User authentication**: users can sign up, log in, and log out of the platform.
* **Product catalog**: users can browse the catalog of clothing items and accessories, view product details, and add items to their cart.
* **Shopping cart**: users can view their cart, modify the quantity of items, and remove items from the cart.
* **Checkout process**: users can proceed to checkout, enter their shipping and payment information, and place their order.
* **Order history**: users can view their order history and track the status of their orders.
* **Admin panel**: administrators can log in (username: `admin@admin.com` password: `dVYTRrT7tnkp8BP`) and access the admin panel, where they can manage the product catalog, orders, and users.


### Project Wiki
More information about the project, including its goals, requirements, architecture, and development process: [wiki](https://github.com/griMarina/Taitotalo-project/wiki)
