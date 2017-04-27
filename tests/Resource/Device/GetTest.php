<?php

declare(strict_types = 1);

namespace Speicher210\KontaktIO\Test\Resource\Device;

use Speicher210\KontaktIO\Model\Device as DeviceModel;
use Speicher210\KontaktIO\Resource\Device;
use Speicher210\KontaktIO\Test\Resource\AbstractResourceTest;

class GetTest extends AbstractResourceTest
{
    /**
     * {@inheritdoc}
     */
    protected function getClassUnderTest(): string
    {
        return Device::class;
    }

    public function testGetDeviceReturnsDeviceObject(): void
    {
        $deviceUniqueId = 'abc1';

        $clientMock = $this->getClientMock(['get']);
        $responseMock = $this->getClientResponseMock($this->getTestFixture('.json'));
        $clientMock
            ->expects(self::once())
            ->method('get')
            ->with('/device/' . $deviceUniqueId)
            ->willReturn($responseMock);

        /** @var Device $resource */
        $resource = $this->getResourceToTest($clientMock);
        $actual = $resource->getDevice($deviceUniqueId);

        $expected = new DeviceModel('cf0de0d0-fcee-4400-9e7e-b5ed6f54e7ae', $deviceUniqueId);
        $expected
            ->setNamespace('namespace1')
            ->setInstanceId('instanceId1')
            ->setDeviceType(DeviceModel::DEVICE_TYPE_BEACON)
            ->setSpecification(DeviceModel::SPECIFICATION_STANDARD)
            ->setProximity('aa6455d4-d9c5-4b45-9d4e-57b8853c417c')
            ->setMajor(1)
            ->setMinor(520)
            ->setName('sp210')
            ->setModel(DeviceModel::MODEL_SMART_BEACON)
            ->setInterval(350)
            ->setTxPower(3)
            ->setUrl('a2e140b6f827459d9cd777649eff320e')
            ->setFirmware('3.1')
            ->setProfiles([DeviceModel::PROFILE_IBEACON]);

        self::assertEquals($expected, $actual);
    }

    public function testGetDeviceCredentials(): void
    {
        $deviceUniqueId = 'abc1';

        $clientMock = $this->getClientMock(['get']);
        $responseMock = $this->getClientResponseMock($this->getTestFixture('.json'));
        $clientMock
            ->expects(self::once())
            ->method('get')
            ->with('/device/' . $deviceUniqueId . '/credentials')
            ->willReturn($responseMock);

        /** @var Device $resource */
        $resource = $this->getResourceToTest($clientMock);
        $actual = $resource->getDeviceCredentials($deviceUniqueId);

        self::assertEquals('pa$$w0rd', $actual->password());
        self::assertEquals('m$$5terPa$$w0rd', $actual->masterPassword());
    }
}
