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

    public function testUpdateDevice()
    {
        $deviceUniqueId = 'abc1';
        $deviceType = DeviceModel::DEVICE_TYPE_BEACON;
        $major = 123;
        $minor = 456;

        $clientMock = $this->getClientMock(['post']);
        $responseMock = $this->getClientResponseMock('Update successful.', 200);
        $clientMock
            ->expects($this->once())
            ->method('post')
            ->with(
                '/device/update',
                $this->callback(
                    function ($values) use ($deviceUniqueId, $deviceType) {
                        $this->assertArrayHasKey('headers', $values);
                        $this->assertArrayHasKey('Content-Type', $values['headers']);
                        $this->assertSame('application/x-www-form-urlencoded', $values['headers']['Content-Type']);

                        $this->assertArrayHasKey('form_params', $values);
                        $expectedFormParams = [
                            'id' => '',
                            'uniqueId' => 'abc1',
                            'deviceType' => 'BEACON',
                            'major' => 123,
                            'minor' => 456,
                            'alias' => 'alias value'
                        ];

                        $this->assertSame($expectedFormParams, $values['form_params']);

                        return true;
                    }
                )
            )
            ->willReturn($responseMock);

        /** @var Device $resource */
        $resource = $this->getResourceToTest($clientMock);
        $values = new DeviceModel('', 'uniqueId'); // values get overwritten from method argument
        $values->setDeviceType('deviceType'); // gets overwritten from method argument
        $values->setAlias('alias value');
        $values->setMajor($major);
        $values->setMinor($minor);
        $actual = $resource->update($deviceUniqueId, $deviceType, $values);

        $this->assertTrue($actual);
    }
}
