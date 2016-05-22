<?php

namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Realty
 *
 * @ORM\Table(name="realty", indexes={@ORM\Index(name="IDX_91B3EE6427F5416E", columns={"district_id"})})
 * @ORM\Entity
 */

class Realty
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
     * @ORM\Column(type="string", length=40, nullable=false)
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=false)
     */
    protected $description;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $photo;

    /**
     * @var integer
     * @ORM\Column(name="price",type="integer", nullable=false)
     */
    protected $price;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $address;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $area;

    /**
     * @var integer
     * @ORM\Column(name="countRooms", type="integer", nullable=false)
     */
    protected $countRooms;


    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Districts", inversedBy="realty", cascade={"persist"})
     * @ORM\JoinColumn(name="district_id", referencedColumnName="id", unique=false, nullable=false)
     */
    protected $districts;



    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\RealtyType", inversedBy="realty", cascade={"persist"})
     * @ORM\JoinColumn(name="realtyTypeId", referencedColumnName="id", unique=false, nullable=false)
     */
    protected $realtyType;


    /**
     * @ORM\ManyToOne(targetEntity="MyUser\Entity\User", inversedBy="realty", cascade={"persist"})
     * @ORM\JoinColumn(name="userId", referencedColumnName="id", unique=false, nullable=false)
     */
    protected $userId;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $created;

    /**
    * @var int
    * @ORM\Column(type="integer", nullable=true)
    */
    protected $state;

    /**
     * @var integer
     * @ORM\Column(name="areaLive",type="integer", nullable=false)
     */
    protected $areaLive;

    /**
     * @var integer
     * @ORM\Column(name="areaKitchen",type="integer", nullable=false)
     */
    protected $areaKitchen;

    /**
     * @var integer
     * @ORM\Column(name="floor",type="integer", nullable=false)
     */
    protected $floor;

    /**
     * @var integer
     * @ORM\Column(name="allFloor",type="integer", nullable=false)
     */
    protected $allFloor;

    /**
     * @var integer
     * @ORM\Column(name="subway",type="integer", nullable=false)
     */
    protected $subway;


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
     * @return Realty
     */
    public function setName($name)
    {
        $this->type = $name;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getName()
    {
        return $this->type;
    }


    /**
     * Set type
     *
     * @param string $type
     * @return Realty
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }


     /**
     * Set description.
     *
     * @param string $description
     *
     * @return Realty
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Realty
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }


    /**
     * Set price
     *
     * @param integer $price
     * @return Realty
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }


    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set address.
     *
     * @param string $address
     *
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Get address.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }



    /**
     * Set area.
     *
     * @param string $area
     *
     * @return void
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * Get area.
     *
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }



    /**
     * Set countRooms
     *
     * @param integer $countRooms
     * @return Realty
     */
    public function setCountRooms($countRooms)
    {
        $this->countRooms = $countRooms;

        return $this;
    }


    /**
     * Get countRooms
     *
     * @return integer
     */
    public function getCountRooms()
    {
        return $this->countRooms;
    }

    /**
     * Set district
     *
     * @param \Application\Entity\Districts $districts
     * @return Realty
     */
    public function setDistrict(\Application\Entity\Districts $districts = null)
    {
        $this->districts = $districts;

        return $this;
    }

    /**
     * Get district
     *
     * @return \Application\Entity\Districts
     */
    public function getDistrict()
    {
        return $this->districts;
    }

    /**
     * Set realty type
     *
     * @param \Application\Entity\RealtyType $realtyType
     * @return Realty
     */
    public function setRealtyType(\Application\Entity\RealtyType $realtyType = null)
    {
        $this->realtyType = $realtyType;

        return $this;
    }

    /**
     * Get district
     *
     * @return \Application\Entity\RealtyType
     */
    public function getRealtyType()
    {
        return $this->realtyType;
    }

    /**
     * Set realty type
     *
     * @param \MyUser\Entity\User $userId
     * @return Realty
     */
    public function setUser(\MyUser\Entity\User $userId = null)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get district
     *
     * @return \MyUser\Entity\User
     */
    public function getUser()
    {
        return $this->userId;
    }


    /**
     * Get created.
     * @return int
     *
     */
    public function  getCreated()
    {
        return $this->created;
    }

    /**
     * Set created.
     * @param $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }


    /**
     * Get State.
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set State.
     * @param $state
     *
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
    * Set price
    *
    * @param integer $areaLive
    * @return Realty
    */
    public function setAreaLive($areaLive)
    {
        $this->areaLive = $areaLive;

        return $this;
    }


    /**
     * Get price
     *
     * @return integer
     */
    public function getAreaLive()
    {
        return $this->areaLive;
    }

    /**
     * Set price
     *
     * @param integer $areaKitchen
     * @return Realty
     */
    public function setAreaKitchen($areaKitchen)
    {
        $this->areaKitchen = $areaKitchen;

        return $this;
    }


    /**
     * Get price
     *
     * @return integer
     */
    public function getAreaKitchen()
    {
        return $this->areaKitchen;
    }

    /**
     * Set price
     *
     * @param integer $floor
     * @return Realty
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;

        return $this;
    }


    /**
     * Get price
     *
     * @return integer
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Set price
     *
     * @param integer $allFloor
     * @return Realty
     */
    public function setFloorAll($allFloor)
    {
        $this->allFloor = $allFloor;

        return $this;
    }


    /**
     * Get price
     *
     * @return integer
     */
    public function getFloorAll()
    {
        return $this->allFloor;
    }

    /**
     * Set price
     *
     * @param integer $subway
     * @return Realty
     */
    public function setSubway($subway)
    {
        $this->subway = $subway;

        return $this;
    }


    /**
     * Get price
     *
     * @return integer
     */
    public function getSubway()
    {
        return $this->subway;
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