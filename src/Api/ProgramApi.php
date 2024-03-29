<?php

namespace SapientPro\EbayAccountSDK\Api;

use SapientPro\EbayAccountSDK\ApiException;
use SapientPro\EbayAccountSDK\Client\EbayClient;
use SapientPro\EbayAccountSDK\Client\EbayRequest;
use SapientPro\EbayAccountSDK\Client\Serializer;
use SapientPro\EbayAccountSDK\Configuration;
use SapientPro\EbayAccountSDK\HeaderSelector;
use SapientPro\EbayAccountSDK\Models\Program;
use SapientPro\EbayAccountSDK\Models\Programs;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ProgramApi implements ApiInterface
{
    /** @ignore */
    private EbayClient $ebayClient;

    /** @ignore */
    private EbayRequest $ebayRequest;

    /** @ignore */
    private Configuration $config;

    /**
     * @ignore
     */
    public function __construct(Configuration $config)
    {
        $this->config = $config;

        $serializer = new Serializer();
        $client = new Client();

        $this->ebayClient = new EbayClient($client, $serializer);
        $this->ebayRequest = new EbayRequest(
            new HeaderSelector(),
            $this->config,
            $serializer
        );
    }

    /**
     * @ignore
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /** @ignore */
    public function setEbayClient(EbayClient $ebayClient): void
    {
        $this->ebayClient = $ebayClient;
    }

    /**
     * Operation getOptedInPrograms
     *
     *
     * @return Programs
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getOptedInPrograms(): Programs
    {
        $response = $this->getOptedInProgramsWithHttpInfo();

        return $response['data'];
    }

    /**
     * Operation getOptedInProgramsWithHttpInfo
     *
     *
     * @return array of Programs, HTTP status code, HTTP response headers
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getOptedInProgramsWithHttpInfo(): array
    {
        $request = $this->getOptedInProgramsRequest();

        return $this->ebayClient->sendRequest($request, returnType: Programs::class);
    }

    /**
     * Create request for operation 'getOptedInPrograms'
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getOptedInProgramsRequest(): Request
    {
        $resourcePath = '/program/get_opted_in_programs';

        return $this->ebayRequest->getRequest($resourcePath);
    }

    /**
     * Operation optInToProgram
     *
     * @param  Program  $body  Program being opted-in to. (required)
     *
     * @return void
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function optInToProgram(Program $body): void
    {
        $this->optInToProgramWithHttpInfo($body);
    }

    /**
     * Operation optInToProgramWithHttpInfo
     *
     * @param  Program  $body  Program being opted-in to. (required)
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function optInToProgramWithHttpInfo(Program $body): array
    {
        $request = $this->optInToProgramRequest($body);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'optInToProgram'
     *
     * @param  Program  $body  Program being opted-in to. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function optInToProgramRequest(Program $body): Request
    {
        $resourcePath = '/program/opt_in';

        return $this->ebayRequest->postRequest($resourcePath, $body);
    }

    /**
     * Operation optOutOfProgram
     *
     * @param  Program  $body  Program being opted-out of. (required)
     *
     * @return void
     * @throws ApiException on non-2xx response
     */
    public function optOutOfProgram(Program $body): void
    {
        $this->optOutOfProgramWithHttpInfo($body);
    }

    /**
     * Operation optOutOfProgramWithHttpInfo
     *
     * @param  Program  $body  Program being opted-out of. (required)
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function optOutOfProgramWithHttpInfo(Program $body): array
    {
        $request = $this->optOutOfProgramRequest($body);

        return $this->ebayClient->sendRequest($request);
    }

    /**
     * Create request for operation 'optOutOfProgram'
     *
     * @param  Program  $body  Program being opted-out of. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function optOutOfProgramRequest(Program $body): Request
    {
        $resourcePath = '/program/opt_out';

        return $this->ebayRequest->postRequest($resourcePath, $body);
    }
}
