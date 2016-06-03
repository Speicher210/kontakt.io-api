<?php

namespace Speicher210\KontaktIO\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Model representing a manager.
 */
class Manager
{
    const ROLE_SUPERUSER = 'SUPERUSER';
    const ROLE_ADMIN = 'ADMIN';
    const ROLE_OPERATOR = 'OPERATOR';

    /**
     * The manager ID.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("id")
     */
    protected $id;

    /**
     * The manager unique ID.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("uniqueId")
     */
    protected $uniqueId;

    /**
     * First name.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("firstName")
     */
    protected $firstName;

    /**
     * Last name.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("lastName")
     */
    protected $lastName;

    /**
     * Manager role. One of the ROLE_* constants.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("role")
     */
    protected $role;

    /**
     * Email address.
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("email")
     */
    protected $email;

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
     * @return Manager
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
     * @return Manager
     */
    public function setUniqueId($uniqueId)
    {
        $this->uniqueId = $uniqueId;

        return $this;
    }

    /**
     * Get the first name.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the first name.
     *
     * @param string $firstName The first name.
     * @return Manager
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the last name.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the last name.
     *
     * @param string $lastName The last name.
     * @return Manager
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the role.
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the role.
     *
     * @param string $role The role. One of the ROLE_* constants.
     * @return Manager
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the email address.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the email address.
     *
     * @param string $email The email address.
     * @return Manager
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
