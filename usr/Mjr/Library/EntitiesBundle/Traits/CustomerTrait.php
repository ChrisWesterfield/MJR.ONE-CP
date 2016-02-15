<?php


namespace Mjr\Library\EntitiesBundle\Traits;
use Doctrine\ORM\Mapping as ORM;

trait CustomerTrait
{
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\Customer\Main", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $Customer;

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->Customer;
    }

    /**
     * @param mixed $Customer
     * @return $this
     */
    public function setCustomer($Customer)
    {
        $this->Customer = $Customer;
        return $this;
    }


}