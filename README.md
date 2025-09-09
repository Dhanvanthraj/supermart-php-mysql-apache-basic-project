# Supermart Management System

A modern web-based retail management system built with PHP, MySQL, and Bootstrap 5.

## Features

- **Dashboard**: Modern, responsive dashboard with quick access to all features
- **Inventory Management**
  - Add, edit, and delete items
  - Track item details including price, manufacturing date, expiry date
  - Monitor stock quantities
  - Manage supplier information

- **Customer Management**
  - Maintain customer database
  - Add new customers
  - Edit customer information
  - View customer details

- **Order Processing**
  - Create and manage orders
  - Track order status
  - Link orders with customers

- **Payment Tracking**
  - Record and manage payments
  - Track payment status
  - Maintain payment history

## Technologies Used

- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Frontend**: 
  - HTML5
  - CSS3
  - Bootstrap 5.3.0
  - Font Awesome 6.4.0
- **Server**: Apache (WAMP/XAMPP)

## Installation

1. Install WAMP or XAMPP on your system
2. Clone this repository to your www/htdocs folder
3. Create a new MySQL database named 'supermart'
4. Import the database schema (contact administrator for the SQL file)
5. Update database credentials in `db.php`:
   ```php
   $host = 'localhost';
   $user = 'supermart';
   $pass = 'supermart123';
   $db = 'supermart';
   ```
6. Access the application through your web browser at `http://localhost/supermart`

## Project Structure

```
supermart/
├── add_customer.php    # Add new customer form
├── add_item.php       # Add new item form
├── customers.php      # Customer management
├── dashboard.php      # Main dashboard
├── db.php            # Database connection
├── edit_customer.php  # Edit customer details
├── edit_item.php     # Edit item details
├── items.php         # Inventory management
├── login.php         # User authentication
└── README.md         # Project documentation
```

## UI Features

- Modern gradient backgrounds
- Responsive card layouts
- Interactive hover effects
- Clean and intuitive forms
- Consistent styling across pages
- Mobile-friendly design

## Security Features

- Prepared SQL statements to prevent SQL injection
- Input validation and sanitization
- Session-based authentication
- Secure password handling

## Contributors

- Dhanvanthraj

## License

This project is proprietary and confidential. Unauthorized copying or distribution is prohibited.
