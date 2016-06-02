<?php

namespace Speicher210\KontaktIO\Test\Resource\Device;

use Speicher210\KontaktIO\Model\Device as DeviceModel;
use Speicher210\KontaktIO\Resource\Device;
use Speicher210\KontaktIO\Test\Resource\AbstractResourceTest;

class UpdateTest extends AbstractResourceTest
{

    /**
     * {@inheritdoc}
     */
    protected function getClassUnderTest()
    {
        return Device::class;
    }

    public function testUpdateDevice()
    {
        $deviceUniqueId = 'abc1';
        $deviceType = DeviceModel::DEVICE_TYPE_BEACON;

        $clientMock = $this->getClientMock(array('post'));
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
                        $this->assertArrayHasKey('uniqueId', $values['form_params']);
                        $this->assertArrayHasKey('deviceType', $values['form_params']);

                        $this->assertEquals($deviceUniqueId, $values['form_params']['uniqueId']);
                        $this->assertEquals($deviceType, $values['form_params']['deviceType']);

                        return true;
                    }
                )
            )
            ->willReturn($responseMock);

        /** @var Device $resource */
        $resource = $this->getResourceToTest($clientMock);
        $values = array(
            'uniqueId' => 'gets overwritten from method argument',
            'deviceType' => 'also gets overwritten from method argument',
            'alias' => 'alias value',
        );
        $actual = $resource->update($deviceUniqueId, $deviceType, $values);

        $this->assertTrue($actual);
    }
}
