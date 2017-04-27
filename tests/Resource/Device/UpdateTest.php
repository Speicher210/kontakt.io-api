<?php

declare(strict_types = 1);

namespace Speicher210\KontaktIO\Test\Resource\Device;

use Speicher210\KontaktIO\Model\Device as DeviceModel;
use Speicher210\KontaktIO\Resource\Device;
use Speicher210\KontaktIO\Test\Resource\AbstractResourceTest;

class UpdateTest extends AbstractResourceTest
{
    /**
     * {@inheritdoc}
     */
    protected function getClassUnderTest(): string
    {
        return Device::class;
    }

    public function testUpdateDevice(): void
    {
        $clientMock = $this->getClientMock(['post']);
        $responseMock = $this->getClientResponseMock('Update successful.', 200);
        $clientMock
            ->expects(self::once())
            ->method('post')
            ->with(
                '/config/create',
                self::callback(
                    function ($values) {
                        self::assertArrayHasKey('headers', $values);
                        self::assertArrayHasKey('Content-Type', $values['headers']);
                        self::assertSame('application/x-www-form-urlencoded', $values['headers']['Content-Type']);

                        self::assertArrayHasKey('form_params', $values);
                        $expectedFormParams = [
                            'uniqueId' => 'uniqueId',
                            'deviceType' => 'BEACON',
                            'major' => 123,
                            'minor' => 456,
                            'proximity' => '00000000-0000-0000-0000-000000000000',
                            'txPower' => 5,
                            'url' => '036578616d706c650074657374',
                            'packets' => 'IBEACON,EDDYSTONE_URL'
                        ];

                        self::assertEquals($expectedFormParams, $values['form_params']);

                        return true;
                    }
                )
            )
            ->willReturn($responseMock);

        /** @var Device $resource */
        $resource = $this->getResourceToTest($clientMock);

        $physical = new DeviceModel\Update\Physical(
            DeviceModel::DEVICE_TYPE_BEACON,
            '00000000-0000-0000-0000-000000000000',
            123,
            456,
            [DeviceModel::PACKET_IBEACON, DeviceModel::PACKET_EDDYSTONE_URL],
            '036578616d706c650074657374',
            5
        );
        $deviceUpdate = new DeviceModel\Update('uniqueId', $physical);

        $actual = $resource->update($deviceUpdate);

        self::assertTrue($actual);
    }
}
