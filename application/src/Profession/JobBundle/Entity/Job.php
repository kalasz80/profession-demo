<?php

namespace Profession\JobBundle\Entity;

use Profession\JobBundle\Entity\Orientation;

/**
 * Job
 */
class Job
{
    const STATUS_ACTIVE = 'aktív';
    const STATUS_READY  = 'kész';
    const STATUS_NEW    = 'friss';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $position;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var \DateTime
     */
    protected $activated;

    /**
     * @var string
     */
    protected $sellerEmail;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var \Profession\JobBundle\Entity\Orientation
     */
    protected $orientation;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set position
     *
     * @param string $position
     * @return Job
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Job
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set activated
     *
     * @param \DateTime $activated
     * @return Job
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;

        return $this;
    }

    /**
     * Get activated
     *
     * @return \DateTime 
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * Set sellerEmail
     *
     * @param string $sellerEmail
     * @return Job
     */
    public function setSellerEmail($sellerEmail)
    {
        $this->sellerEmail = $sellerEmail;

        return $this;
    }

    /**
     * Get sellerEmail
     *
     * @return string 
     */
    public function getSellerEmail()
    {
        return $this->sellerEmail;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Job
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set orientation
     *
     * @param \Profession\JobBundle\Entity\Orientation $orientation
     * @return Job
     */
    public function setOrientation(Orientation $orientation = null)
    {
        $this->orientation = $orientation;

        return $this;
    }

    /**
     * Get orientation
     *
     * @return \Profession\JobBundle\Entity\Orientation 
     */
    public function getOrientation()
    {
        return $this->orientation;
    }
}
