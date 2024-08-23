<?php

namespace ReadyCMS\Exceptions;

use Exception;
 
/*
-----------------------------------------------
HttpException Class Documentation
-----------------------------------------------

-- Overview

HttpException is an extension of the base Exception class in PHP, specifically tailored for handling HTTP-related errors. This class facilitates more detailed error reporting by including an HTTP status code, a custom error code, and additional details about the error.

-- Constructor Parameters

$message: The error message (required).
$statusCode: The HTTP status code associated with this error. Defaults to 400 (Bad Request).
$errorCode: A custom error code for further specifying the type of error. This is helpful for mapping errors to more specific descriptions or documentation.
$details: Additional details about the error, such as contextual information or data relevant to the error.

-- Methods

getStatusCode(): Returns the HTTP status code.
getErrorCode(): Returns the custom error code in lowercase.
getDetails(): Returns additional details about the error.

-- Usage Example

Using HttpException in an API context:

try {
    // Some code that may throw an HTTP-related exception

} catch (HttpException $e) {
    // Generate a structured JSON response for the error
    http_response_code($e->getStatusCode());
    $errorResponse = [
        'error' => [
            'code' => $e->getErrorCode(),
            'message' => $e->getMessage(),
            'details' => $e->getDetails()
        ]
    ];
    echo json_encode($errorResponse);
    exit;
}

-- Best Practices

Use HttpException for errors specifically related to HTTP requests and responses. For example, when a request cannot be fulfilled due to missing data, invalid parameters, or authorization issues.
Define standard custom error codes that can be easily mapped to specific error scenarios. This aids in debugging and provides clearer communication to API consumers.
Include as much detail as necessary in the details parameter to help understand the context of the error, but be cautious of exposing sensitive information.

-- Notes

When catching HttpException, ensure that the HTTP response code is set correctly using http_response_code().
HttpException can be extended to include additional functionality, like logging errors, if needed.

*/
class HttpException extends Exception
{
    private $statusCode;
    private $details;
    private $errorCode;
// Custom error code

    public function __construct($message, $statusCode = 400, $errorCode = '', $details = [])
    {
        parent::__construct($message);
        $this->statusCode = $statusCode;
        $this->errorCode = $errorCode;
        $this->details = $details;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getErrorCode()
    {
        return strtolower($this->errorCode);
    }

    public function getDetails()
    {
        return $this->details;
    }
}


/*
-----------------------------------------------
Documentation for createErrorResponse Function
-----------------------------------------------

-- Overview

The createErrorResponse function is designed to generate a standardized JSON response format for errors in web applications or APIs. This function ensures consistency in how errors are reported and makes it easier for clients to handle these errors.

-- Parameters

$message (string): The human-readable error message.
$statusCode (integer): The HTTP status code associated with the error. This should be a valid HTTP status code (e.g., 400 for Bad Request, 404 for Not Found).
$errorCode (string, optional): A custom error code to further specify the type of error. Default is an empty string.
$additionalDetails (array, optional): An array of additional details about the error. Default is an empty array.

-- Functionality

Sets the HTTP response code using http_response_code().
Constructs a structured error response in JSON format with keys for the error code, custom error code, message, and additional details.
Encodes the error response array as a JSON string for output.

*/
function createErrorResponse($message, $statusCode, $errorCode = '', $additionalDetails = [])
{
    http_response_code($statusCode);
    $errorResponse = [
        'error' => [
            'code' => $statusCode,
            'error_code' => $errorCode, // Custom error code
            'message' => $message,
        ]
    ];
    if (!empty($additionalDetails)) {
        $errorResponse['error']['details'] = $additionalDetails;
    }

    return json_encode($errorResponse);
}
