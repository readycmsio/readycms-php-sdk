![ReadyCMS Logo](https://cdn.readycms.io/web/img/readycms-logo.png)

# ReadyCMS PHP SDK

The ReadyCMS PHP SDK allows developers to easily integrate with the ReadyCMS API. This SDK simplifies the process of interacting with the ReadyCMS API by providing a set of intuitive methods to manage users, products, orders, and more.

[![GitHub](https://img.shields.io/github/stars/readycmsio/readycms-php-sdk?style=social)](https://github.com/readycmsio/readycms-php-sdk)

## Table of Contents

- [Installation](#installation)
- [Getting Started](#getting-started)
- [Usage](#usage)
  - [Authentication](#authentication)
  - [User Management](#user-management)
  - [Product Management](#product-management)
  - [Error Handling](#error-handling)
  - [Caching](#caching)
  - [Middleware](#middleware)
- [Code Samples](#code-samples)
- [FAQ](#faq)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)
- [Connect with Us](#connect-with-us)


## Installation

You can install the SDK via Composer. Run the following command in your project directory:

```bash
composer require readycms/readycms-php-sdk
 ```
 
## Getting Started

To get started, you need to instantiate the `Client` class with your ReadyCMS API key and version. You can then use the provided methods to interact with the API.

```php
require 'vendor/autoload.php';
```
use ReadyCMS\Client\Client;
use ReadyCMS\Endpoints\UsersEndpoint;

$client = new Client('your-api-key-here', 'v3');
$userEndpoint = new UsersEndpoint($client);

// Example: Fetch all users
$users = $userEndpoint->getUsers();
print_r($users);



### Usage - Authentication
   

All requests to the ReadyCMS API require an API key. You can obtain your API key from the ReadyCMS dashboard. When creating the `Client` instance, pass your API key to the constructor:

```php
$client = new Client('your-api-key-here', 'v3');
```


### Usage - User Management
 
### User Management

The SDK provides methods to manage users in your ReadyCMS platform.

#### List Users

```php
$users = $userEndpoint->getUsers();
print_r($users);
```

### Usage - Product Management

```markdown
### Product Management

The SDK also supports product management:

#### List Products

```php
$productEndpoint = new ProductsEndpoint($client);
$products = $productEndpoint->listProducts();
printr($products);
```

### Usage - Error Handling

```markdown
### Error Handling

The SDK includes robust error handling using custom exceptions. Errors encountered during API requests will throw an `HttpException` with relevant details, including the HTTP status code, error message, and additional details.

#### Example

```php
try {
    $response = $userEndpoint->listUsers();
} catch (HttpException $e) {
    echo createErrorResponse($e->getMessage(), $e->getStatusCode(), $e->getErrorCode(), $e->getDetails());
} catch (Exception $e) {
    echo "General Error: " . $e->getMessage();
}
```


### Usage - Caching

```markdown
### Caching

The SDK includes a built-in caching mechanism using the Symfony Cache component. You can control the cache duration (TTL) and specify a custom cache directory:

```php
$client = new Client('your-api-key-here', 'v3', 3600, '/path/to/custom/cache');
```


### Usage - Middleware

```markdown
### Middleware

You can add custom middleware to the SDK to modify requests or responses, log requests, or implement custom authentication. Middleware is added during the `Client` initialization:

```php
$loggingMiddleware = Middleware::tap(
    function (RequestInterface $request) use ($logger) {
        $logger->info('Sending request: ' . $request->getMethod() . ' ' . $request->getUri());
    },
    function (ResponseInterface $response) use ($logger) {
        $logger->info('Received response: ' . $response->getStatusCode());
    }
);

$client = new Client('your-api-key-here', 'v3', 3600, null, [$loggingMiddleware]);
```


### Code Samples

```markdown
## Code Samples

To help you get started with the ReadyCMS PHP SDK, we’ve provided several code samples:

- **[Basic Usage](examples/basic-usage.php)**: Learn how to initialize the client and make a simple API call.
- **[Error Handling](examples/error-handling.php)**: Understand how to handle exceptions thrown by the SDK.
- **[Middleware Usage](examples/middleware-usage.php)**: See how to add custom middleware for logging and other purposes.
- **[Caching Example](examples/caching.php)**: Learn how to use the built-in caching mechanism.
- **[Rate Limiting Handling](examples/rate-limiting.php)**: Understand how the SDK handles API rate limits.



## FAQ (Frequently Asked Questions)

### 1. How do I install the ReadyCMS PHP SDK?

You can install the SDK via Composer by running the following command:

```bash
composer require readycms/readycms-php-sdk
```

### 2. What is the minimum PHP version required?

The ReadyCMS PHP SDK requires PHP 7.2 or higher.

### 3. How do I authenticate my requests?

All requests to the ReadyCMS API require an API key. You can pass this key when creating the `Client` instance:

```php
$client = new Client('your-api-key-here', 'v3');
```

### 4. How does caching work in the SDK?

The SDK includes a built-in caching mechanism using the Symfony Cache component. You can control the cache duration (TTL) and specify a custom cache directory:

```php
$client = new Client('your-api-key-here', 'v3', 3600, '/path/to/custom/cache');
```

Cached responses are stored in the specified directory and are automatically invalidated after the specified TTL.

### 5. How can I handle rate limiting?

If your requests hit the API rate limit, the SDK will automatically handle the retries based on the `Retry-After` header returned by the server.


### Contributing

```markdown
## Contributing

Contributions are welcome! Please read the [contributing guidelines](CONTRIBUTING.md) before submitting a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Connect with Us

Stay connected and keep up-to-date with the latest news, updates, and more:

- **Website**: [ReadyCMS](https://www.readycms.io/en/)
- **GitHub**: [ReadyCMS GitHub](https://github.com/readycmsio/readycms-php-sdk)
- **Twitter**: [@ReadyCMS](https://twitter.com/readycms)
- **LinkedIn**: [ReadyCMS LinkedIn](https://www.linkedin.com/company/readycms)
