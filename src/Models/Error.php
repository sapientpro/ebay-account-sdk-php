<?php

namespace SapientPro\EbayAccountSDK\Models;

/**
 * A container that defines the elements of error and warning messages.
 */
class Error implements EbayModelInterface
{
    /**
     * The category type for this error or warning.
     * It is a string that can have one of three values:
     * <ul><li><code>Application</code>:
     * Indicates an exception or error occurred in the application code or at runtime.
     * Examples include catching an exception in a service's business logic, system failures,
     * or request errors from a dependency.
     *
     * </li><li><code>Business</code>:
     * Used when your service or a dependent service refused to continue processing on the resource
     * because of a business rule violation such as
     * "Seller does not ship item to Antarctica" or "Buyer ineligible to purchase an alcoholic item".
     * Business errors are not syntactical input errors.
     *
     * </li><li><code>Request</code>:
     * Used when there is anything wrong with the request,
     * such as authentication, syntactical errors, rate limiting or missing headers, bad HTTP header values, and so on.
     * </li></ul>
     */
    public string $category;

    /**
     * Name of the domain, or primary system, of the service or application where the error occurred.
     */
    public string $domain;

    /**
     * A positive integer that uniquely identifies the specific error condition that occurred.
     * Your application can use error codes as identifiers in your customized error-handling algorithms.
     */
    public int $errorId;

    /**
     * Identifies specific request elements associated with the error, if any.
     * inputRefId's response is format specific.
     * For JSON, use <i>JSONPath</i> notation.
     *
     * @var string[]
     */
    public array $inputRefIds;

    /**
     * A more detailed explanation of the error than given in the <code>message</code> error field.
     */
    public string $longMessage;

    /**
     * Information on how to correct the problem, in the end user's terms and language where applicable.
     * Its value is at most 50 characters long.
     * If applicable, the value is localized in the end user's requested locale.
     */
    public string $message;

    /**
     * Identifies specific response elements associated with the error, if any.
     * Path format is the same as <code>inputRefId</code>.
     * @var string[]
     */
    public array $outputRefIds;

    /**
     * This optional list of name/value pairs that contain context-specific <code>ErrorParameter</code> objects,
     * with each item in the list being a parameter (or input field name) that caused an error condition.
     * Each <code>ErrorParameter</code> object consists of two fields, a <code>name</code> and a <code>value</code>.
     * @var ErrorParameter[]
     */
    public array $parameters;

    /**
     * If present, indicates the subsystem in which the error occurred.
     */
    public string $subdomain;
}
