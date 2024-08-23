# ReadyCMS PHP SDK

The ReadyCMS PHP SDK allows developers to easily integrate with the ReadyCMS API v3. This SDK simplifies the process of interacting with the ReadyCMS API by providing a set of intuitive methods to manage users, products, orders, and more.

## Table of Contents

- [Installation](#installation)
- [Getting Started](#getting-started)
- [Usage](#usage)
  - [Authentication](#authentication)
  - [User Management](#user-management)
  - [Product Management](#product-management)
  - [Orders Management](#orders-management)
  - [Categories and Tags Management](#categories-and-tags-management)
  - [Error Handling](#error-handling)
- [Advanced Features](#advanced-features)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)

## Installation

You can install the SDK via Composer. Run the following command in your project directory:

```bash
composer require readycms/readycms-php-sdk
```

## Getting Started

To get started, you need to instantiate the `Client` class with your ReadyCMS API base URL and API key. You can then use the provided methods to interact with the API.

```php
require 'vendor/autoload.php';

use ReadyCMS\Client\Client;
use ReadyCMS\Endpoints\UserEndpoint;

$client = new Client('https://api.readycms.com', 'your-api-key');
$userEndpoint = new UserEndpoint($client);

// Example: Fetch all users
$users = $userEndpoint->listUsers();
print_r($users);
```

## Usage

### Authentication

All requests to the ReadyCMS API require an API key. You can obtain your API key from the ReadyCMS dashboard. When creating the `Client` instance, pass your API key to the constructor:

```php
$client = new Client('https://api.readycms.com', 'your-api-key');
```

### User Management

The SDK provides methods to manage users in your ReadyCMS platform.

#### List Users

```php
$users = $userEndpoint->listUsers();
print_r($users);
```

#### Create a New User

```php
$newUser = [
    'email' => 'newuser@example.com',
    'name' => 'New User',
    // Additional fields
];

$response = $userEndpoint->createUser($newUser);
print_r($response);
```

### Product Management

The SDK also supports product management:

#### List Products

```php
$productEndpoint = new ProductEndpoint($client);
$products = $productEndpoint->listProducts();
print_r($products);
```

#### Create a New Product

```php
$newProduct = [
    'name' => 'New Product',
    'price' => 29.99,
    // Additional fields
];

$response = $productEndpoint->createProduct($newProduct);
print_r($response);
```

### Orders Management

The SDK provides comprehensive methods to manage orders:

#### List Orders

```php
$ordersEndpoint = new OrdersEndpoint($client);
$orders = $ordersEndpoint->getOrders(['status' => 'completed']);
print_r($orders);
```

#### Create a New Order

```php
$newOrder = [
    'user_id' => 123,
    'products' => [
        ['id' => 456, 'quantity' => 2],
        ['id' => 789, 'quantity' => 1],
    ],
    'total_price' => 99.99,
];

$response = $ordersEndpoint->createOrder($newOrder);
print_r($response);
```

### Categories and Tags Management

The SDK supports both product and custom categories and tags:

#### List Categories

```php
$categoriesEndpoint = new CategoriesEndpoint($client);
$categories = $categoriesEndpoint->getCategories(['content_slug' => 'products', 'content_type' => 'ecommerce']);
print_r($categories);
```

#### List Tags

```php
$tagsEndpoint = new TagsEndpoint($client);
$tags = $tagsEndpoint->getTags(['content_slug' => 'products', 'content_type' => 'ecommerce']);
print_r($tags);
```

## Error Handling

The SDK includes robust error handling using custom exceptions. Errors encountered during API requests will throw an `HttpException` with relevant details, including the HTTP status code, error message, and additional details.

### Example

```php
try {
    $response = $userEndpoint->listUsers();
} catch (HttpException $e) {
    echo createErrorResponse($e->getMessage(), $e->getStatusCode(), $e->getErrorCode(), $e->getDetails());
}
```

## Advanced Features

- **Pagination**: Easily handle paginated results using built-in methods.
- **Batch Processing**: Support for batch operations with custom endpoint classes.

## Testing

To run the tests for this SDK, use PHPUnit:

```bash
./vendor/bin/phpunit
```

## Contributing

Contributions are welcome! Please read the [contributing guidelines](CONTRIBUTING.md) before submitting a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
