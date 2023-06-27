<?php

namespace SapientPro\EbayAccountSDK\Tests\Unit\Api;

use PHPUnit\Framework\TestCase;
use SapientPro\EbayAccountSDK\Api\ProgramApi;
use SapientPro\EbayAccountSDK\Models\Program;
use SapientPro\EbayAccountSDK\Models\Programs;
use SapientPro\EbayAccountSDK\Enums\ProgramTypeEnum;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\CreatesApiClass;
use SapientPro\EbayAccountSDK\Tests\Unit\Concerns\MocksClient;

/**
 * ProgramApiTest Class Doc Comment
 *
 * @category Class
 * @package  SapientPro\EbayAccountSDK\Tests
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ProgramApiTest extends TestCase
{
    use MocksClient;
    use CreatesApiClass;

    public function testGetOptedInPrograms(): void
    {
        $mockResponseBody = <<<JSON
{
    "programs": [
        {
            "programType": "OUT_OF_STOCK_CONTROL"
        },
        {
            "programType": "SELLING_POLICY_MANAGEMENT"
        }
    ]
}
JSON;

        $expectedResponse = Programs::fromArray([
            'programs' => [
                Program::fromArray([
                    'programType' => ProgramTypeEnum::OUT_OF_STOCK_CONTROL,
                ]),
                Program::fromArray(
                    [
                        'programType' => ProgramTypeEnum::SELLING_POLICY_MANAGEMENT,
                    ]
                )
            ]
        ]);

        $client = $this->prepareClientMock(200, $mockResponseBody);
        $api = $this->createApi(ProgramApi::class, $client);

        $result = $api->getOptedInPrograms();

        $this->assertEquals($expectedResponse, $result);
    }

    public function testOptInToProgram()
    {
        $body = Program::fromArray([
            'programType' => ProgramTypeEnum::OUT_OF_STOCK_CONTROL,
        ]);

        $client = $this->prepareClientMock(200);
        $api = $this->createApi(ProgramApi::class, $client);

        $result = $api->optInToProgramWithHttpInfo($body);

        $this->assertEquals(['code' => 200], $result);
    }

    public function testOptOutOfProgram(): void
    {
        $body = Program::fromArray([
            'programType' => ProgramTypeEnum::OUT_OF_STOCK_CONTROL,
        ]);

        $client = $this->prepareClientMock(200);
        $api = $this->createApi(ProgramApi::class, $client);

        $result = $api->optOutOfProgramWithHttpInfo($body);

        $this->assertEquals(['code' => 200], $result);
    }
}
