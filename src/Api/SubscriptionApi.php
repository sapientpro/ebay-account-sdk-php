<?php

namespace SapientPro\EbayAccountSDK\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\EbayRequest;
use SapientPro\EbayAccountSDK\Client\Serializer;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Models\SubscriptionResponse;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   SapientPro
 * @link     https://sapient.pro/
 */
class SubscriptionApi implements ApiInterface
{
    protected ClientInterface $client;

    protected Configuration $config;

    protected EbayClient $ebayClient;

    protected EbayRequest $ebayRequest;

    public function __construct(
        EbayClient $ebayClient = null,
        EbayRequest $ebayRequest = null,
        ClientInterface $client = null,
        Configuration $config = null,
    ) {
        $serializer = new Serializer();
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->ebayClient = $ebayClient ?: new EbayClient($this->client, $serializer);
        $this->ebayRequest = $ebayRequest ?: new EbayRequest(new HeaderSelector(), $this->config, $serializer);
    }

    /**
     * Operation getSubscription
     *
     * This method retrieves a list of subscriptions associated with the seller account.
     *
     * @param  string|null  $limit
     * @param  string|null  $continuationToken
     * @return SubscriptionResponse
     * @throws ApiException on non-2xx response
     */
    public function getSubscription(
        string $limit = null,
        string $continuationToken = null
    ): SubscriptionResponse {
        $response = $this->getSubscriptionWithHttpInfo($limit, $continuationToken);

        return $response['data'];
    }

    /**
     * @param  string|null  $limit
     * @param  string|null  $continuationToken
     * @return array
     * @throws ApiException on non-2xx response
     */
    public function getSubscriptionWithHttpInfo(
        string $limit = null,
        string $continuationToken = null
    ): array {
        $returnType = SubscriptionResponse::class;
        $request = $this->getSubscriptionRequest($limit, $continuationToken);

        return $this->ebayClient->sendRequest($request, $returnType);
    }

    /**
     * @param  string|null  $limit
     * @param  string|null  $continuationToken
     * @return Request
     */
    public function getSubscriptionRequest(
        string $limit = null,
        string $continuationToken = null
    ): Request {
        $resourcePath = '/subscription';
        $queryParams = null;

        if (null !== $limit) {
            $queryParams['limit'] = Serializer::toQueryValue($limit);
        }
        if (null !== $continuationToken) {
            $queryParams['continuation-token'] = Serializer::toQueryValue($continuationToken);
        }

        return $this->ebayRequest->getRequest($resourcePath, $queryParams);
    }
}