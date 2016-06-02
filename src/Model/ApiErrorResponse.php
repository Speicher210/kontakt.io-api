<?php

namespace Speicher210\KontaktIO\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class representing an API error response.
 */
class ApiErrorResponse
{
    /**
     * API error id.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("id")
     */
    protected $id;

    /**
     * Response status.
     *
     * @var integer
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("status")
     */
    protected $status;

    /**
     * API error cause.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("cause")
     */
    protected $cause;

    /**
     * API error message.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("message")
     */
    protected $message;

    /**
     * API error details.
     *
     * @var array|null
     *
     * @JMS\Type("array")
     * @JMS\SerializedName("details")
     */
    protected $details;

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
     * Get the status.
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the cause.
     *
     * @return string
     */
    public function getCause()
    {
        return $this->cause;
    }

    /**
     * Get the error message.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get the details.
     *
     * @return array|null
     */
    public function getDetails()
    {
        return $this->details;
    }
}
