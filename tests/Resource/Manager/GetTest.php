<?php

declare(strict_types = 1);

namespace Speicher210\KontaktIO\Test\Resource\Manger;

use Speicher210\KontaktIO\Model\Manager as ManagerModel;
use Speicher210\KontaktIO\Resource\Manager;
use Speicher210\KontaktIO\Test\Resource\AbstractResourceTest;

class GetTest extends AbstractResourceTest
{
    /**
     * {@inheritdoc}
     */
    protected function getClassUnderTest(): string
    {
        return Manager::class;
    }

    public function testGetManager()
    {
        $managerId = '1e824479-defb-4c46-951e-76eccccb8f86';

        $clientMock = $this->getClientMock(['get']);
        $responseMock = $this->getClientResponseMock($this->getTestFixture('.json'));
        $clientMock
            ->expects($this->once())
            ->method('get')
            ->with('/manager/' . $managerId)
            ->willReturn($responseMock);

        /** @var Manager $resource */
        $resource = $this->getResourceToTest($clientMock);
        $actual = $resource->getManager($managerId);

        $expected = new ManagerModel();
        $expected
            ->setId($managerId)
            ->setUniqueId('my_unique_id')
            ->setFirstName('First')
            ->setLastName('Last')
            ->setEmail('test@email.com')
            ->setRole(ManagerModel::ROLE_SUPERUSER);

        $this->assertEquals($expected, $actual);
    }

    public function testGetMyManager()
    {
        $manager = new ManagerModel();
        $resourceMock = $this
            ->getMockBuilder(Manager::class)
            ->disableOriginalConstructor()
            ->setMethods(['getManager'])
            ->getMock();

        $resourceMock->expects($this->once())->method('getManager')->with('me')->willReturn($manager);

        $this->assertSame($manager, $resourceMock->getMyManager());
    }
}
