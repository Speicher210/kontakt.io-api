<?php

declare(strict_types = 1);

namespace Speicher210\KontaktIO\Model\Device;

use Speicher210\KontaktIO\Model\Device\Update\Physical;

final class Update
{
    private $uniqueId;

    private $physical;

    public function __construct(string $uniqueId, ?Physical $physical)
    {
        $this->uniqueId = $uniqueId;
        $this->physical = $physical;
    }

    public function uniqueId(): string
    {
        return $this->uniqueId;
    }

    public function physical(): Physical
    {
        return $this->physical;
    }
}
