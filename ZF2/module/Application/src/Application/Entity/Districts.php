<?php
namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * Districts
 *
 * @ORM\Table(name="districts", indexes={@ORM\Index(name="IDX_91B3EE6427F5416E", columns={"city_id"})})
 * @ORM\Entity
 */

class Districts
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
     * @ORM\ManyToOne(targetEntity="Application\Entity\City", inversedBy="districts", cascade={"persist"})
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id", unique=false, nullable=false)
     */
    protected $city;


    /**
     * @ORM\OneToMany(targetEntity="Application\Entity\Realty", mappedBy="districts", cascade={"persist"})
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
     * @return Districts
     */
    public function addRealty(\Application\Entity\Realty  $realty)
    {
        $this->realty[]=  $realty;
        $realty->setDistrict($this);

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
     * @return Districts
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
     * Set city
     *
     * @param \Application\Entity\City $city
     * @return Districts
     */
    public function setCity(\Application\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \Application\Entity\City
     */
    public function getCity()
    {
        return $this->city;
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