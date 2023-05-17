<?php

namespace SapientPro\EbayAccountSDK;

use InvalidArgumentException;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Configuration
{
    private static self $defaultConfiguration;

    /**
     * Associative array to store API key(s)
     *
     * @var string[]
     */
    protected array $apiKeys = [];

    /**
     * Associative array to store API prefix (e.g. Bearer)
     *
     * @var string[]
     */
    protected array $apiKeyPrefixes = [];

    /**
     * Access token for OAuth
     *
     * @var string
     */
    protected string $accessToken = '';

    /**
     * Username for HTTP basic authentication
     *
     * @var string
     */
    protected string $username = '';

    /**
     * Password for HTTP basic authentication
     *
     * @var string
     */
    protected string $password = '';

    /**
     * The host
     *
     * @var string
     */
    protected string $host = 'https://api.ebay.com/sell/account/v1';

    /**
     * User agent of the HTTP request, set to "PHP-Swagger" by default
     *
     * @var string
     */
    protected string $userAgent = 'Swagger-Codegen/1.0.0/php';

    /**
     * Debug switch
     *
     * @var bool
     */
    protected bool $debug = false;

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected string $debugFile = 'php://output';

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected string $tempFolderPath;

    public function __construct()
    {
        $this->tempFolderPath = sys_get_temp_dir();
    }

    /**
     * Gets the essential information for debugging
     *
     * @return string The report for debugging
     */
    public static function toDebugReport(): string
    {
        $report = 'PHP SDK (SapientPro\EbayAccountSDK) Debug Report:' . PHP_EOL;
        $report .= '    OS: ' . php_uname() . PHP_EOL;
        $report .= '    PHP Version: ' . PHP_VERSION . PHP_EOL;
        $report .= '    OpenAPI Spec Version: v1.7.0' . PHP_EOL;
        $report .= '    Temp Folder Path: ' . self::getDefaultConfiguration()->getTempFolderPath() . PHP_EOL;

        return $report;
    }

    /**
     * Gets the temp folder path
     *
     * @return string Temp folder path
     */
    public function getTempFolderPath(): string
    {
        return $this->tempFolderPath;
    }

    /**
     * Sets the temp folder path
     *
     * @param  string  $tempFolderPath  Temp folder path
     *
     * @return $this
     */
    public function setTempFolderPath(string $tempFolderPath): self
    {
        $this->tempFolderPath = $tempFolderPath;

        return $this;
    }

    /**
     * Gets the default configuration instance
     *
     * @return Configuration
     */
    public static function getDefaultConfiguration(): self
    {
        if (!isset(self::$defaultConfiguration)) {
            self::$defaultConfiguration = new Configuration();
        }

        return self::$defaultConfiguration;
    }

    /**
     * Sets the default configuration instance
     *
     * @param  Configuration  $config  An instance of the Configuration Object
     *
     * @return void
     */
    public static function setDefaultConfiguration(Configuration $config): void
    {
        self::$defaultConfiguration = $config;
    }

    /**
     * Sets API key
     *
     * @param  string  $apiKeyIdentifier  API key identifier (authentication scheme)
     * @param  string  $key  API key or token
     *
     * @return $this
     */
    public function setApiKey(string $apiKeyIdentifier, string $key): self
    {
        $this->apiKeys[$apiKeyIdentifier] = $key;

        return $this;
    }

    /**
     * Sets the prefix for API key (e.g. Bearer)
     *
     * @param  string  $apiKeyIdentifier  API key identifier (authentication scheme)
     * @param  string  $prefix  API key prefix, e.g. Bearer
     *
     * @return $this
     */
    public function setApiKeyPrefix(string $apiKeyIdentifier, string $prefix): self
    {
        $this->apiKeyPrefixes[$apiKeyIdentifier] = $prefix;

        return $this;
    }

    /**
     * Gets the access token for OAuth
     *
     * @return string Access token for OAuth
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Sets the access token for OAuth
     *
     * @param  string  $accessToken  Token for OAuth
     *
     * @return $this
     */
    public function setAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * Gets the username for HTTP basic authentication
     *
     * @return string Username for HTTP basic authentication
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Sets the username for HTTP basic authentication
     *
     * @param  string  $username  Username for HTTP basic authentication
     *
     * @return $this
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Gets the password for HTTP basic authentication
     *
     * @return string Password for HTTP basic authentication
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Sets the password for HTTP basic authentication
     *
     * @param  string  $password  Password for HTTP basic authentication
     *
     * @return $this
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Gets the host
     *
     * @return string Host
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Sets the host
     *
     * @param  string  $host  Host
     *
     * @return $this
     */
    public function setHost(string $host): self
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Gets the user agent of the api client
     *
     * @return string user agent
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * Sets the user agent of the api client
     *
     * @param  string  $userAgent  the user agent of the api client
     *
     * @return $this
     * @throws InvalidArgumentException
     */
    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Gets the debug flag
     *
     * @return bool
     */
    public function getDebug(): bool
    {
        return $this->debug;
    }

    /**
     * Sets debug flag
     *
     * @param  bool  $debug  Debug flag
     *
     * @return $this
     */
    public function setDebug(bool $debug): self
    {
        $this->debug = $debug;

        return $this;
    }

    /**
     * Gets the debug file
     *
     * @return string
     */
    public function getDebugFile(): string
    {
        return $this->debugFile;
    }

    /**
     * Sets the debug file
     *
     * @param  string  $debugFile  Debug file
     *
     * @return $this
     */
    public function setDebugFile(string $debugFile): self
    {
        $this->debugFile = $debugFile;

        return $this;
    }

    /**
     * Get API key (with prefix if set)
     *
     * @param  string  $apiKeyIdentifier  name of apikey
     *
     * @return string|null API key with the prefix
     */
    public function getApiKeyWithPrefix(string $apiKeyIdentifier): ?string
    {
        $prefix = $this->getApiKeyPrefix($apiKeyIdentifier);
        $apiKey = $this->getApiKey($apiKeyIdentifier);

        if ($apiKey === null) {
            return null;
        }

        if ($prefix === null) {
            $keyWithPrefix = $apiKey;
        } else {
            $keyWithPrefix = $prefix . ' ' . $apiKey;
        }

        return $keyWithPrefix;
    }

    /**
     * Gets API key prefix
     *
     * @param  string  $apiKeyIdentifier  API key identifier (authentication scheme)
     *
     * @return string|null
     */
    public function getApiKeyPrefix(string $apiKeyIdentifier): ?string
    {
        return $this->apiKeyPrefixes[$apiKeyIdentifier] ?? null;
    }

    /**
     * Gets API key
     *
     * @param  string  $apiKeyIdentifier  API key identifier (authentication scheme)
     *
     * @return string|null API key or token
     */
    public function getApiKey(string $apiKeyIdentifier): ?string
    {
        return $this->apiKeys[$apiKeyIdentifier] ?? null;
    }
}
