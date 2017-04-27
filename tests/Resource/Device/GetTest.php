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
        $deviceUniqueId = '1mMw';

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

        $expected = new DeviceModel($deviceUniqueId);
        $expected
            ->setId('b6128ce9-acae-4898-952b-2bbf7136635f')
            ->setNamespace('f7826da6bc5b71e0893e')
            ->setInstanceId('316d4d77696f')
            ->setDeviceType(DeviceModel::DEVICE_TYPE_BEACON)
            ->setSpecification(DeviceModel::SPECIFICATION_STANDARD)
            ->setProximity('f7826da6-4fa2-4e98-8024-bc5b71e0893e')
            ->setMajor(4516)
            ->setMinor(1554)
            ->setName('Beacon')
            ->setModel(DeviceModel::MODEL_SMART_BEACON)
            ->setInterval(100)
            ->setTxPower(5)
            ->setUrl('026b6f6e74616b742e696f')
            ->setFirmware('4.1')
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
