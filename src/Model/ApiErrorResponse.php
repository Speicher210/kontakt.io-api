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
     * Set the error ID.
     *
     * @param string $id The error ID.
     * @return ApiErrorResponse
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set the status.
     *
     * @param integer $status The status.
     * @return ApiErrorResponse
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
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
     * Set the cause.
     * @param string $cause
     * @return ApiErrorResponse
     */
    public function setCause($cause)
    {
        $this->cause = $cause;

        return $this;
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
     * Set the message.
     *
     * @param string $message The message.
     * @return ApiErrorResponse
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
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

    /**
     * Set the details.
     *
     * @param array $details The details.
     * @return ApiErrorResponse
     */
    public function setDetails(array $details = null)
    {
        $this->details = $details;

        return $this;
    }
}
