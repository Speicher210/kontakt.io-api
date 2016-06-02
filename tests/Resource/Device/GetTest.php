<?php

namespace Speicher210\KontaktIO\Test\Resource\Device;

use Speicher210\KontaktIO\Model\Device as DeviceModel;
use Speicher210\KontaktIO\Resource\Device;
use Speicher210\KontaktIO\Test\Resource\AbstractResourceTest;

class GetTest extends AbstractResourceTest
{
    /**
     * {@inheritdoc}
     */
    protected function getClassUnderTest()
    {
        return Device::class;
    }

    public function testGetDeviceReturnsDeviceObject()
    {
        $deviceUniqueId = 'abc1';

        $clientMock = $this->getClientMock(array('get'));
        $responseMock = $this->getClientResponseMock($this->getTestFixture('.json'));
        $clientMock
            ->expects($this->once())
            ->method('get')
            ->with('/device/'.$deviceUniqueId)
            ->willReturn($responseMock);

        /** @var Device $resource */
        $resource = $this->getResourceToTest($clientMock);
        $actual = $resource->getDevice($deviceUniqueId);

        $expected = new DeviceModel();
        $expected
            ->setUniqueId($deviceUniqueId)
            ->setId('cf0de0d0-fcee-4400-9e7e-b5ed6f54e7ae')
            ->setNamespace('namespace1')
            ->setInstanceId('instanceid1')
            ->setDeviceType(DeviceModel::DEVICE_TYPE_BEACON)
            ->setSpecification(DeviceModel::SPECIFICATION_STANDARD)
            ->setProximity('aa6455d4-d9c5-4b45-9d4e-57b8853c417c')
            ->setMajor(1)
            ->setMinor(520)
            ->setName('sp210')
            ->setInterval(350)
            ->setTxPower(3)
            ->setUrl('a2e140b6f827459d9cd777649eff320e')
            ->setProfiles(array(DeviceModel::PROFILE_IBEACON))
        ;

        $this->assertEquals($expected, $actual);
    }
}
