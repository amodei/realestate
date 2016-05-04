<?php
namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 *  Entity for City.
 *
 * @ORM\Entity
 * @ORM\Table(name="city")
 *
 * @author Nikolay Kopyl <nikolaykopyl@gmail.com>
 */
class City
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $state;


    /**
     * @ORM\OneToMany(targetEntity="Application\Entity\Districts", mappedBy="city", cascade={"persist"})
     */
    protected $districts;


    /**
     * City constructor.
     */
    public function __construct()
    {
        $this->districts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add district
     *
     * @param \Application\Entity\Districts $districts
     * @return City
     */
    public function addDistricts(\Application\Entity\Districts  $districts)
    {
        $this->districts[]=  $districts;
        $districts->setCity($this);

        return $this;

    }


    /**
     * Remove districts
     *
     * @param \Application\Entity\Districts $districts
     */
    public function removeDistricts(\Application\Entity\Districts  $districts)
    {
        $this->districts->removeElement($districts);
    }

    /**
     * @return ArrayCollection
     */
    public function getDistrict()
    {
        return $this->districts;
    }

    /**
     * @return ArrayCollection
     */
    public function setDistrict()
    {
        return $this->districts;
    }


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set id.
     *
     * @param int $id
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = (int)$id;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Set name.
     *
     * @param string $name
     *
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get state.
     *
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set state.
     *
     * @param int $state
     *
     * @return void
     */
    public function setState($state)
    {
        $this->text = $state;
    }



    /**
     * Helper function.
     */
    public function exchangeArray($data)
    {
        foreach ($data as $key => $val) {
            if (property_exists($this, $key)) {
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