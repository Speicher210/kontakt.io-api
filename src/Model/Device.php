<?php

declare(strict_types = 1);

namespace Speicher210\KontaktIO\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Model representing a device.
 */
final class Device
{
    public const PROXIMITY_IMMEDIATE = 'IMMEDIATE';
    public const PROXIMITY_NEAR = 'NEAR';
    public const PROXIMITY_FAR = 'FAR';

    public const DEVICE_TYPE_BEACON = 'BEACON';
    public const DEVICE_TYPE_CLOUD_BEACON = 'CLOUD_BEACON';

    public const PROFILE_IBEACON = 'IBEACON';
    public const PROFILE_EDDYSTONE = 'EDDYSTONE';

    public const SPECIFICATION_STANDARD = 'STANDARD';
    public const SPECIFICATION_SENSOR = 'SENSOR';
    public const SPECIFICATION_TOUGH = 'TOUGH';

    public const MODEL_CARD_BEACON = 'CARD_BEACON';
    public const MODEL_CLOUD_BEACON = 'CLOUD_BEACON';
    public const MODEL_EXTERNAL = 'EXTERNAL';
    public const MODEL_GATEWAY = 'GATEWAY';
    public const MODEL_SENSOR_BEACON = 'SENSOR_BEACON';
    public const MODEL_SMART_BEACON = 'SMART_BEACON';
    public const MODEL_USB_BEACON = 'USB_BEACON';

    /**
     * @param string $id Device ID.
     * @param string $uniqueId Device unique ID.
     */
    public function __construct(string $id, string $uniqueId)
    {
        $this->id = $id;
        $this->uniqueId = $uniqueId;
    }

    /**
     * Device ID.
     *
     * This is an UUID.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("id")
     */
    private $id;

    /**
     * Device unique ID.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("uniqueId")
     */
    private $uniqueId;

    /**
     * Eddystone namespace.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("namespace")
     */
    private $namespace;

    /**
     * Eddystone ID.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("instanceId")
     */
    private $instanceId;

    /**
     * Device type.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("deviceType")
     */
    private $deviceType;

    /**
     * Specification.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("specification")
     */
    private $specification;

    /**
     * Proximity UUID.
     *
     * The UUID of the device.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("proximity")
     */
    private $proximity;

    /**
     * Major.
     *
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("major")
     */
    private $major;

    /**
     * Minor.
     *
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("minor")
     */
    private $minor;

    /**
     * Device name.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     */
    private $name;

    /**
     * Device alias.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("alias")
     */
    private $alias;

    /**
     * The model.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("model")
     */
    private $model;

    /**
     * Advertising interval range (20 - 10240 milliseconds).
     *
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("interval")
     */
    private $interval;

    /**
     * Transmission power (0 - 7).
     *
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("txPower")
     */
    private $txPower;

    /**
     * Device URL.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("url")
     */
    private $url;

    /**
     * Firmware version of the device
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("firmware")
     */
    private $firmware;

    /**
     * Device profile.
     *
     * @var array
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("profiles")
     */
    private $profiles;

    /**
     * Get the ID.
     *
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Get the unique ID.
     *
     * @return string
     */
    public function uniqueId()
    {
        return $this->uniqueId;
    }

    /**
     * Get the namespace.
     *
     * @return string
     */
    public function namespace()
    {
        return $this->namespace;
    }

    /**
     * Set the namespace.
     *
     * @param string $namespace The namespace.
     * @return Device
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * Get the instance ID.
     *
     * @return string
     */
    public function instanceId()
    {
        return $this->instanceId;
    }

    /**
     * Set the instance ID.
     *
     * @param string $instanceId The instance ID.
     * @return Device
     */
    public function setInstanceId($instanceId)
    {
        $this->instanceId = $instanceId;

        return $this;
    }

    /**
     * Get the device type.
     *
     * @return string
     */
    public function deviceType()
    {
        return $this->deviceType;
    }

    /**
     * Set the device type.
     *
     * @param string $deviceType The device type.
     * @return Device
     */
    public function setDeviceType($deviceType)
    {
        $this->deviceType = $deviceType;

        return $this;
    }

    /**
     * Get the specifications.
     *
     * @return string
     */
    public function specification()
    {
        return $this->specification;
    }

    /**
     * Set the specifications.
     *
     * @param string $specification The specifications.
     * @return Device
     */
    public function setSpecification($specification)
    {
        $this->specification = $specification;

        return $this;
    }

    /**
     * Get the proximity.
     *
     * @return string
     */
    public function proximity(): string
    {
        return $this->proximity;
    }

    /**
     * Set the proximity UUID.
     *
     * @param string $proximity The proximity UUID.
     * @return Device
     */
    public function setProximity(string $proximity)
    {
        $this->proximity = $proximity;

        return $this;
    }

    /**
     * Get the major.
     *
     * @return integer
     */
    public function major(): int
    {
        return $this->major;
    }

    /**
     * Set the major.
     *
     * @param integer $major The major.
     * @return Device
     */
    public function setMajor(int $major)
    {
        $this->major = $major;

        return $this;
    }

    /**
     * Get the minor.
     *
     * @return integer
     */
    public function minor(): int
    {
        return $this->minor;
    }

    /**
     * Set the minor.
     *
     * @param integer $minor The minor.
     * @return Device
     */
    public function setMinor(int $minor)
    {
        $this->minor = $minor;

        return $this;
    }

    /**
     * Get the name.
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Set the name.
     *
     * @param string $name The name.
     * @return Device
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the alias.
     *
     * @return string
     */
    public function alias(): ?string
    {
        return $this->alias;
    }

    /**
     * Set the alias.
     *
     * @param string $alias The alias.
     * @return Device
     */
    public function setAlias(?string $alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get the model.
     *
     * @return string
     */
    public function model(): string
    {
        return $this->model;
    }

    /**
     * Set the model.
     *
     * @param string $model
     * @return Device
     */
    public function setModel(string $model): Device
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Get the broadcast interval in milliseconds.
     *
     * @return integer
     */
    public function interval(): int
    {
        return $this->interval;
    }

    /**
     * Set the broadcast interval.
     *
     * @param integer $interval The interval in milliseconds.
     * @return Device
     */
    public function setInterval(int $interval)
    {
        $this->interval = $interval;

        return $this;
    }

    /**
     * Get the TX power.
     *
     * @return integer
     */
    public function txPower(): int
    {
        return $this->txPower;
    }

    /**
     * Set the TX power.
     *
     * @param integer $txPower
     * @return Device
     */
    public function setTxPower($txPower)
    {
        $this->txPower = $txPower;

        return $this;
    }

    /**
     * Get the URL.
     *
     * @return string
     */
    public function url(): ?string
    {
        return $this->url;
    }

    /**
     * Set the URL.
     *
     * @param string $url The URL.
     * @return Device
     */
    public function setUrl(?string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the firmware version.
     *
     * @return string
     */
    public function firmware(): ?string
    {
        return $this->firmware;
    }

    /**
     * Set the firmware.
     *
     * @param string $firmware
     * @return Device
     */
    public function setFirmware(string $firmware)
    {
        $this->firmware = $firmware;
        return $this;
    }

    /**
     * Get the profiles.
     *
     * @return array
     */
    public function profiles(): ?array
    {
        return $this->profiles;
    }

    /**
     * Set the profiles.
     *
     * @param array|null $profiles
     * @return Device
     */
    public function setProfiles(?array $profiles)
    {
        $this->profiles = $profiles;

        return $this;
    }
}
