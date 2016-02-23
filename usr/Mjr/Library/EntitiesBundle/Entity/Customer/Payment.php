<?php


namespace Mjr\Library\EntitiesBundle\Entity\Customer;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\serializeTrait;


/**
 * @ORM\Table(name="customer_payment")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Customer
 * @author Chris Westerfield <chris@mjr.one>
 */
class Payment
{
    use serializeTrait;
    use LogableTrait;
    use IdTrait;
    /**
     * @ORM\ManyToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\Main", inversedBy="billingAddress", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="billing_customer_id", referencedColumnName="id")
     * @var Main
     */
    /**
     * @ORM\ManyToOne(targetEntity="\Mjr\Library\EntitiesBundle\Entity\Customer\Main", inversedBy="payment", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * @var Main
     */
    protected $Customer;
    /**
     * @ORM\Column(name="account_holder", type="string", length=80, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $accountHolder;
    /**
     * @ORM\Column(name="number", type="string", length=80, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $number;
    /**
     * @ORM\Column(name="bic", type="string", length=80, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $bic;
    /**
     * @ORM\Column(name="pay_pal_email", type="string", length=255, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $payPalEmail;
    /**
     * @ORM\Column(name="ccard", type="string", length=80, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $ccard;
    /**
     * @ORM\Column(name="secret", type="string", length=80, nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $secret;
    /**
     * @ORM\Column(name="valid_month", type="integer",nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $validMonth;
    /**
     * @ORM\Column(name="valid_year", type="integer",nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $validYear;

    /**
     * @return Main
     */
    public function getCustomer()
    {
        return $this->Customer;
    }

    /**
     * @param Main $Customer
     * @return $this
     */
    public function setCustomer($Customer)
    {
        $this->Customer = $Customer;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountHolder()
    {
        return $this->accountHolder;
    }

    /**
     * @param string $accountHolder
     * @return $this
     */
    public function setAccountHolder($accountHolder)
    {
        $this->accountHolder = $accountHolder;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param string $bic
     * @return $this
     */
    public function setBic($bic)
    {
        $this->bic = $bic;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayPalEmail()
    {
        return $this->payPalEmail;
    }

    /**
     * @param string $payPalEmail
     * @return $this
     */
    public function setPayPalEmail($payPalEmail)
    {
        $this->payPalEmail = $payPalEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getCcard()
    {
        return $this->ccard;
    }

    /**
     * @param string $ccard
     * @return $this
     */
    public function setCcard($ccard)
    {
        $this->ccard = $ccard;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param string $secret
     * @return $this
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
    }

    /**
     * @return string
     */
    public function getValidMonth()
    {
        return $this->validMonth;
    }

    /**
     * @param string $validMonth
     * @return $this
     */
    public function setValidMonth($validMonth)
    {
        $this->validMonth = $validMonth;
        return $this;
    }

    /**
     * @return string
     */
    public function getValidYear()
    {
        return $this->validYear;
    }

    /**
     * @param string $validYear
     * @return $this
     */
    public function setValidYear($validYear)
    {
        $this->validYear = $validYear;
        return $this;
    }
}