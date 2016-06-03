<?php

namespace Speicher210\KontaktIO\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Model representing a device.
 */
class Device
{
    const PROXIMITY_IMMEDIATE = 'IMMEDIATE';
    const PROXIMITY_NEAR = 'NEAR';
    const PROXIMITY_FAR = 'FAR';

    const DEVICE_TYPE_BEACON = 'BEACON';
    const DEVICE_TYPE_CLOUD_BEACON = 'CLOUD_BEACON';

    const PROFILE_IBEACON = 'IBEACON';
    const PROFILE_EDDYSTONE = 'EDDYSTONE';

    const SPECIFICATION_STANDARD = 'STANDARD';
    const SPECIFICATION_SENSOR = 'SENSOR';
    const SPECIFICATION_TOUGH = 'TOUGH';

    /**
     * Device ID.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("id")
     */
    protected $id;

    /**
     * Device unique ID.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("uniqueId")
     */
    protected $uniqueId;

    /**
     * Eddystone namespace.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("namespace")
     */
    protected $namespace;

    /**
     * Eddystone Id.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("instanceId")
     */
    protected $instanceId;

    /**
     * Device type.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("deviceType")
     */
    protected $deviceType;

    /**
     * Specification.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("specification")
     */
    protected $specification;

    /**
     * Proximity UUID.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("proximity")
     */
    protected $proximity;

    /**
     * Major.
     *
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("major")
     */
    protected $major;

    /**
     * Minor.
     *
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("minor")
     */
    protected $minor;

    /**
     * Device name.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     */
    protected $name;

    /**
     * Device alias.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("alias")
     */
    protected $alias;

    /**
     * Advertising interval range (20 - 10240 milliseconds).
     *
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("interval")
     */
    protected $interval;

    /**
     * Transmission power (0 - 7).
     *
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("txPower")
     */
    protected $txPower;

    /**
     * Device URL.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("url")
     */
    protected $url;

    /**
     * Device profile.
     *
     * @var array
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("profiles")
     */
    protected $profiles;

    /**
     * Get the ID.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the ID.
     *
     * @param string $id The ID.
     * @return Device
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the unique ID.
     *
     * @return string
     */
    public function getUniqueId()
    {
        return $this->uniqueId;
    }

    /**
     * Set the unique ID.
     *
     * @param string $uniqueId The unique ID.
     * @return Device
     */
    public function setUniqueId($uniqueId)
    {
        $this->uniqueId = $uniqueId;

        return $this;
    }

    /**
     * Get the namespace.
     *
     * @return string
     */
    public function getNamespace()
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
    public function getInstanceId()
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
    public function getDeviceType()
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
    public function getSpecification()
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
    public function getProximity()
    {
        return $this->proximity;
    }

    /**
     * Set the proximity UUID.
     *
     * @param string $proximity The proximity UUID.
     * @return Device
     */
    public function setProximity($proximity)
    {
        $this->proximity = $proximity;

        return $this;
    }

    /**
     * Get the major.
     *
     * @return integer
     */
    public function getMajor()
    {
        return $this->major;
    }

    /**
     * Set the major.
     *
     * @param integer $major The major.
     * @return Device
     */
    public function setMajor($major)
    {
        $this->major = $major;

        return $this;
    }

    /**
     * Get the minor.
     *
     * @return integer
     */
    public function getMinor()
    {
        return $this->minor;
    }

    /**
     * Set the minor.
     *
     * @param integer $minor The minor.
     * @return Device
     */
    public function setMinor($minor)
    {
        $this->minor = $minor;

        return $this;
    }

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
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
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set the alias.
     *
     * @param string $alias The alias.
     * @return Device
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get the broadcast interval in milliseconds.
     *
     * @return integer
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * Set the broadcast interval.
     *
     * @param integer $interval The interval in milliseconds.
     * @return Device
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;

        return $this;
    }

    /**
     * Get the TX power.
     *
     * @return integer
     */
    public function getTxPower()
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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the URL.
     *
     * @param string $url The URL.
     * @return Device
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the profiles.
     *
     * @return array
     */
    public function getProfiles()
    {
        return $this->profiles;
    }

    /**
     * Set the profiles.
     *
     * @param array|null $profiles
     * @return Device
     */
    public function setProfiles(array $profiles = null)
    {
        $this->profiles = $profiles;

        return $this;
    }
}
