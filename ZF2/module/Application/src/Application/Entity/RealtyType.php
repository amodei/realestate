<?php

namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 *  Entity for Realty Type.
 *
 * @ORM\Entity
 * @ORM\Table(name="realty_type")
 *
 * @author Nikolay Kopyl <nikolaykopyl@gmail.com>
 */
class RealtyType
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;


    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $name;


    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer", nullable=false)
     */
    protected $state;



    /**
     * @ORM\OneToMany(targetEntity="Application\Entity\Realty", mappedBy="realtyType", cascade={"persist"})
     */
    protected $realty;

    /**
     * Realty constructor.
     */
    public function __construct()
    {
        $this->realty = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add realty
     *
     * @param \Application\Entity\Realty $realty
     * @return RealtyType
     */
    public function addRealty(\Application\Entity\Realty  $realty)
    {
        $this->realty[]=  $realty;
        $realty->setRealtyType($this);

        return $this;

    }


    /**
     * Remove realty
     *
     * @param \Application\Entity\Realty $realty
     */
    public function removeRealty(\Application\Entity\Realty  $realty)
    {
        $this->realty->removeElement($realty);
    }

    /**
     * @return ArrayCollection
     */
    public function getRealty()
    {
        return $this->realty;
    }

    /**
     * @return ArrayCollection
     */
    public function setRealty()
    {
        return $this->realty;
    }




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
     * Set name
     *
     * @param string $name
     * @return RealtyType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set state
     *
     * @param integer $state
     * @return Districts
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
    }






    /**
     * @param $data
     */
    public function exchangeArray($data)
    {
        foreach ($data as $key => $val)
        {
            if (property_exists($this, $key)){
                $this->$key = ($val !== null) ? $val : null;
            }
        }
    }

    /**
     * Helper function
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }


}
