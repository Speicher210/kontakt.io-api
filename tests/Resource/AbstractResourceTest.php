<?php

namespace Speicher210\KontaktIO\Test\Resource;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Speicher210\KontaktIO\AbstractResource;
use Speicher210\KontaktIO\Client;

/**
 * Abstract class to test resource classes.
 */
abstract class AbstractResourceTest extends TestCase
{
    /**
     * The temporary directory for the serializer cache.
     *
     * @var string
     */
    private static $serializerTempDirectory;

    /**
     * {@inheritdoc}
     */
    public static function setUpBeforeClass()
    {
        if (self::$serializerTempDirectory === null) {
            self::$serializerTempDirectory = sys_get_temp_dir() . '/' . uniqid('sp210_kontakio_api_test', true);
        }
    }

    /**
     * Get the class name under test.
     *
     * @return string
     */
    abstract protected function getClassUnderTest();

    /**
     * Get a client mock.
     *
     * @param array $clientMethods The methods to mock.
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getClientMock(array $clientMethods)
    {
        return $this
            ->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->setMethods($clientMethods)
            ->getMock();
    }

    /**
     * Get a client response mock.
     *
     * @param string $body The response body.
     * @param integer $statusCode The HTTP response status code.
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getClientResponseMock($body, $statusCode = null)
    {
        $mock = $this
            ->getMockBuilder(ResponseInterface::class)
            ->setMethods(array('getBody', 'getStatusCode'))
            ->getMockForAbstractClass();

        $mock->expects($this->any())->method('getBody')->with()->willReturn($body);
        $mock->expects($this->any())->method('getStatusCode')->with()->willReturn($statusCode);

        return $mock;
    }

    /**
     * Get the service to test with the mocked transport.
     *
     * @param \PHPUnit_Framework_MockObject_MockObject $clientMock The client mock.
     * @return AbstractResource
     */
    protected function getResourceToTest(\PHPUnit_Framework_MockObject_MockObject $clientMock)
    {
        AnnotationRegistry::registerLoader('class_exists');
        $serializer = SerializerBuilder::create()
            ->setCacheDir(self::$serializerTempDirectory)
            ->build();

        $class = $this->getClassUnderTest();

        return new $class($clientMock, $serializer);
    }

    /**
     * @param string $suffix Suffix to identify the file to read.
     * @return string
     */
    protected function getTestFixture($suffix)
    {
        $reflection = new \ReflectionObject($this);
        $fixturesDirectory = dirname($reflection->getFileName()) . '/Fixtures/';

        return file_get_contents($fixturesDirectory . $this->getName() . $suffix);
    }
}
