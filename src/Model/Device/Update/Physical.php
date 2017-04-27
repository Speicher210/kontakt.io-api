<?php

declare(strict_types = 1);

namespace Speicher210\KontaktIO\Model\Device\Update;

use JMS\Serializer\Annotation as JMS;

final class Physical
{
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
     * The UUID of the device.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("proximity")
     */
    private $proximity;

    /**
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("major")
     */
    private $major;

    /**
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("minor")
     */
    private $minor;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("packets")
     */
    private $packets;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("url")
     */
    private $url;

    /**
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("txPower")
     */
    private $txPower;

    public function __construct(
        string $deviceType,
        ?string $proximity,
        ?int $major,
        ?int $minor,
        ?array $packets,
        ?string $url,
        ?int $txPower
    ) {
        $this->deviceType = $deviceType;
        $this->proximity = $proximity;
        $this->major = $major;
        $this->minor = $minor;
        if ($packets !== null && \count($packets) > 0) {
            $this->packets = \implode(',', $packets);
        }
        $this->url = $url;
        $this->txPower = $txPower;
    }

    public function deviceType(): string
    {
        return $this->deviceType;
    }

    public function proximity(): ?string
    {
        return $this->proximity;
    }

    public function major(): ?int
    {
        return $this->major;
    }

    public function minor(): ?int
    {
        return $this->minor;
    }

    public function packets(): ?array
    {
        if ($this->packets !== null) {
            return \explode(',', $this->packets);
        }

        return null;
    }

    public function url(): ?string
    {
        return $this->url;
    }

    public function tyPower(): ?int
    {
        return $this->txPower;
    }
}
