<?php

namespace Mjr\Library\EntitiesBundle\Entity\Web;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Mjr\Library\EntitiesBundle\Entity\Xmpp\Domain;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;

/**
 * @ORM\Table(name="web_certificate")
 * @ORM\Entity( )
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity\Web
 * @author Chris Westerfield <chris@mjr.one>
 */
class Certificate
{
    use IdTrait;
    use LogableTrait;
    use ActiveTrait;
    /**
     * @ORM\Column(name="state", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $State;
    /**
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $City;
    /**
     * @ORM\Column(name="organisation", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Organisation;
    /**
     * @ORM\Column(name="organisation_unit", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $OrganisationUnit;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\System\Country", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="iso", nullable=false)
     */
    protected $Country;
    /**
     * @ORM\Column(name="domain", type="string", length=255, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Domain;
    /**
     * @ORM\Column(name="request", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Request;
    /**
     * @ORM\Column(name="cert", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Cert;
    /**
     * @ORM\Column(name="bundle", type="text", nullable=true)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Bundle;
    /**
     * @ORM\Column(name="key", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Key;
    /**
     * @ORM\Column(name="action", type="string", length=16, nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Action;
    /**
     * @ORM\Column(name="wild_card", type="boolean",  nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $WildCard;
    /**
     * @ORM\Column(name="global_certificate", type="boolean",  nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $GlobalCertificate;

    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", mappedBy="SslCertificate", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $WebSites;

    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Xmpp\Domain", mappedBy="Certificate", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $XmppDomains;

    /**
     * Certificate constructor.
     */
    public function __construct()
    {
        $this->WebSites = new ArrayCollection();
        $this->XmppDomains = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->State;
    }

    /**
     * @param string $State
     * @return $this
     */
    public function setState($State)
    {
        $this->State = $State;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->City;
    }

    /**
     * @param string $City
     * @return $this
     */
    public function setCity($City)
    {
        $this->City = $City;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrganisation()
    {
        return $this->Organisation;
    }

    /**
     * @param string $Organisation
     * @return $this
     */
    public function setOrganisation($Organisation)
    {
        $this->Organisation = $Organisation;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrganisationUnit()
    {
        return $this->OrganisationUnit;
    }

    /**
     * @param string $OrganisationUnit
     * @return $this
     */
    public function setOrganisationUnit($OrganisationUnit)
    {
        $this->OrganisationUnit = $OrganisationUnit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->Country;
    }

    /**
     * @param mixed $Country
     * @return $this
     */
    public function setCountry($Country)
    {
        $this->Country = $Country;
        return $this;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->Domain;
    }

    /**
     * @param string $Domain
     * @return $this
     */
    public function setDomain($Domain)
    {
        $this->Domain = $Domain;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequest()
    {
        return $this->Request;
    }

    /**
     * @param string $Request
     * @return $this
     */
    public function setRequest($Request)
    {
        $this->Request = $Request;
        return $this;
    }

    /**
     * @return string
     */
    public function getCert()
    {
        return $this->Cert;
    }

    /**
     * @param string $Cert
     * @return $this
     */
    public function setCert($Cert)
    {
        $this->Cert = $Cert;
        return $this;
    }

    /**
     * @return string
     */
    public function getBundle()
    {
        return $this->Bundle;
    }

    /**
     * @param string $Bundle
     * @return $this
     */
    public function setBundle($Bundle)
    {
        $this->Bundle = $Bundle;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->Key;
    }

    /**
     * @param string $Key
     * @return $this
     */
    public function setKey($Key)
    {
        $this->Key = $Key;
        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->Action;
    }

    /**
     * @param string $Action
     * @return $this
     */
    public function setAction($Action)
    {
        $this->Action = $Action;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isWildCard()
    {
        return $this->WildCard;
    }

    /**
     * @param boolean $WildCard
     * @return $this
     */
    public function setWildCard($WildCard)
    {
        $this->WildCard = $WildCard;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isGlobalCertificate()
    {
        return $this->GlobalCertificate;
    }

    /**
     * @param boolean $GlobalCertificate
     * @return $this
     */
    public function setGlobalCertificate($GlobalCertificate)
    {
        $this->GlobalCertificate = $GlobalCertificate;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getWebsites()
    {
        return $this->WebSites;
    }

    /**
     * @param WebDomain $domain
     * @return bool
     */
    public function hasWebSite(WebDomain $domain)
    {
        return $this->WebSites->contains($domain);
    }

    /**
     * @param WebDomain $domain
     * @return $this
     */
    public function addWebSite(WebDomain $domain)
    {
        if(!$this->hasWebSite($domain))
        {
            $this->WebSites->add($domain);
        }
        return $this;
    }

    /**
     * @param WebDomain $domain
     * @return $this
     */
    public function removeWebSite(WebDomain $domain)
    {
        if($this->hasWebSite($domain))
        {
            $this->WebSites->removeElement($domain);
        }
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getXmppDomains()
    {
        return $this->XmppDomains;
    }

    /**
     * @param Domain $domain
     * @return bool
     */
    public function hasXmppDomain(Domain $domain)
    {
        return $this->XmppDomains->contains($domain);
    }

    /**
     * @param Domain $domain
     * @return $this
     */
    public function addXmppDomain(Domain $domain)
    {
        if(!$this->hasXmppDomain($domain))
        {
            $this->XmppDomains->add($domain);
        }
        return $this;
    }

    /**
     * @param Domain $domain
     * @return $this
     */
    public function removeXmppDomain(Domain $domain)
    {
        if($this->hasXmppDomain($domain))
        {
            $this->XmppDomains->removeElement($domain);
        }
        return $this;
    }
}