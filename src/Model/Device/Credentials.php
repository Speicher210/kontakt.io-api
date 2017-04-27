<?php

declare(strict_types = 1);

namespace Speicher210\KontaktIO\Model\Device;

use JMS\Serializer\Annotation as JMS;

final class Credentials
{
    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("password")
     */
    private $password;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("masterPassword")
     */
    private $masterPassword;

    public function __construct(string $password, string $masterPassword)
    {
        $this->password = $password;
        $this->masterPassword = $masterPassword;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function masterPassword(): string
    {
        return $this->masterPassword;
    }
}
