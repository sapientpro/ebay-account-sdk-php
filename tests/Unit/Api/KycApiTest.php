<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayAccountSDK\Api\KycApi;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\MocksClient;

/**
 * @package  SapientPro\EbayAccountSDK\Tests
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class KycApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testGetKYC(): void
    {
        $client = $this->prepareClientMock(204);
        $api = $this->createApi(KycApi::class, $client);

        $result = $api->getKYCWithHttpInfo();

        $this->assertEquals(204, $result['code']);
    }
}
