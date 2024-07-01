# diwali-sale-campaign
Diwali sale api with some custom discount rules for online product

GitHub Repository Link: https://github.com/tywari/diwali-sale-campaign

Instructions to Run the Project Locally:

Clone the repository using git clone https://github.com/your-username/diwali-sale-campaign.git
Run composer install to install the required dependencies
Run php artisan migrate to create the necessary database tables
Run php artisan serve to start the development server
Use a tool like Postman or cURL to send API requests to http://localhost:8000/api/diwali-sale
API Endpoints:

POST /api/diwali-sale - Accepts an array of product prices as input and returns the discounted and payable items based on the rules.

# Implementation:

I've created a new Laravel project and implemented the necessary API endpoint to handle the rules. Here's an overview of the implementation:

# Models:
`Product.php` A simple model to represent a product with a price attribute.
Controllers:

# Controllers

`DiwaliSaleController.php` - Handles the API request and applies the rules to calculate the discounted and payable items.

# Services:

`DiwaliSaleService.php` - A service class that encapsulates the business logic for applying the rules.

# Rules:

`RuleOne.php`, `RuleTwo.php`, and `RuleThree.php` - Each rule is implemented as a separate class that extends an abstract Rule class. The rules are applied in sequence to calculate the discounted and payable items.

# Tests:

DiwaliSaleTest.php - A test class that covers the API endpoint and the rules.

# Command to execute the Test Results
`php artisan test --filter=DiwaliSaleTest`

# Api Details
```
curl -X POST \
  http://localhost/api/diwali-sale \
  -H 'Content-Type: application/json' \
  -d '{
    "products": [10, 20, 30, 40, 50, 60],
    "rule": "rule_one"
}'
```