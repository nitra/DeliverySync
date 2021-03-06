<?php
namespace Nitra\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Nitra\DeliveryBundle\Entity\Client
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="Nitra\DeliveryBundle\Repository\ClientRepository")
 */
// UniqueEntity не используем потому что используем SoftDeletable
// @UniqueEntity(fields="name", message="Клиент с таким названием уже существует")
class Client
{

    use ORMBehaviors\Timestampable\Timestampable,
        ORMBehaviors\SoftDeletable\SoftDeletable;

    use \Nitra\NitraThemeBundle\Traits\ValidForDelete;    

    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(message="Не указано название клиента")
     */
    private $name;

    /**
     * @var string $token
     * @ORM\Column(name="token", type="string", length=50, nullable = true)
     */
    private $token;
    
    /**
     * @ORM\ManyToMany(targetEntity="Delivery", inversedBy="clients")
     * @ORM\JoinTable(name="client_delivery")
     */
    private $deliveries;
            
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->deliveries = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Entity to string
     * @return string 
     */
    public function __toString()
    {
        return (string)$this->getName();
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
     * @return Client
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
     * Set token
     *
     * @param string $token
     * @return Client
     */
    public function setToken($token)
    {
        $this->token = $token;
    
        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set user
     *
     * @param \Nitra\ManagerBundle\Entity\Manager $user
     * @return Client
     */
    public function setUser(\Nitra\ManagerBundle\Entity\Manager $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Nitra\ManagerBundle\Entity\Manager 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add deliveries
     *
     * @param \Nitra\DeliveryBundle\Entity\Delivery $deliveries
     * @return Client
     */
    public function addDeliverie(\Nitra\DeliveryBundle\Entity\Delivery $deliveries)
    {
        $this->deliveries[] = $deliveries;
    
        return $this;
    }

    /**
     * Remove deliveries
     *
     * @param \Nitra\DeliveryBundle\Entity\Delivery $deliveries
     */
    public function removeDeliverie(\Nitra\DeliveryBundle\Entity\Delivery $deliveries)
    {
        $this->deliveries->removeElement($deliveries);
    }

    /**
     * Get deliveries
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDeliveries()
    {
        return $this->deliveries;
    }
}