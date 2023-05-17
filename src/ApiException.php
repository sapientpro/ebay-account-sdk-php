<?php

namespace SapientPro\EbayAccountSDK;

use Exception;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ApiException extends Exception
{
    /**
     * The HTTP body of the server response either as Json or string.
     *
     * @var mixed
     */
    protected mixed $responseBody;

    /**
     * The HTTP header of the server response.
     *
     * @var string[]|null
     */
    protected ?array $responseHeaders;

    /**
     * Constructor
     *
     * @param  string  $message  Error message
     * @param  int  $code  HTTP status code
     * @param  array|null  $responseHeaders  HTTP response header
     * @param  mixed  $responseBody  HTTP decoded body of the server response either as \stdClass or string
     */
    public function __construct(
        string $message = "",
        int $code = 0,
        ?array $responseHeaders = [],
        mixed $responseBody = null
    ) {
        parent::__construct($message, $code);
        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;
    }

    /**
     * Gets the HTTP response header
     *
     * @return string[]|null HTTP response header
     */
    public function getResponseHeaders(): ?array
    {
        return $this->responseHeaders;
    }

    /**
     * Gets the HTTP body of the server response either as Json or string
     *
     * @return mixed HTTP body of the server response either as \stdClass or string
     */
    public function getResponseBody(): mixed
    {
        return $this->responseBody;
    }
}
