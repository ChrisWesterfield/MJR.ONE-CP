<?php

namespace Mjr\Library\EntitiesBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Mjr\Library\EntitiesBundle\Entity\Web\WebDomain;
use Mjr\Library\EntitiesBundle\Traits\ActiveTrait;
use Mjr\Library\EntitiesBundle\Traits\IdTrait;
use Mjr\Library\EntitiesBundle\Traits\LogableTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemGroupTrait;
use Mjr\Library\EntitiesBundle\Traits\SystemUserTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="directive_snippets")
 * @ORM\Entity()
 * @Gedmo\Loggable
 * @copyright by the MJR.ONE
 * @link https://www.mjr.one
 * @license Mozilla 2 Public License
 * @package Mjr\Library\EntitiesBundle\Entity
 * @author Chris Westerfield <chris@mjr.one>
 */
class DirectiveSnippets
{
    use IdTrait;
    use SystemUserTrait;
    use SystemGroupTrait;
    use ActiveTrait;
    use LogableTrait;
    /**
     * @ORM\Column(name="name", length=100, type="string", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Name;
    /**
     * @ORM\Column(name="type", length=50, type="string", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Type;
    /**
     * @ORM\Column(name="snippet", type="text", nullable=false)
     * @var string
     * @Gedmo\Versioned
     */
    protected $Snippet;
    /**
     * @ORM\Column(name="customer_viewable", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $CustomerViewable;
    /**
     * @ORM\Column(name="required_php_snippet", type="boolean", nullable=false, options={"default"=false})
     * @var boolean
     * @Gedmo\Versioned
     */
    protected $RequiredPhpSnippet;
    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\DirectiveSnippets", inversedBy="ChildDirectiveSnippets", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="directive_snippets_id", referencedColumnName="id")
     * @var DirectiveSnippets
     */
    protected $MasterDirectiveSnippets;
    /**
     * @ORM\OneToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\DirectiveSnippets", mappedBy="MasterDirectiveSnippets", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $ChildDirectiveSnippets;

    /**
     * @ORM\ManyToMany(targetEntity="Mjr\Library\EntitiesBundle\Entity\Web\WebDomain", mappedBy="WebServerDirectives", fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $WebSites;

    /**
     * DirectiveSnippets constructor.
     */
    public function __construct()
    {
        $this->ChildDirectiveSnippets = new ArrayCollection();
        $this->WebSites  = new ArrayCollection();
    }

    /**
     * @param DirectiveSnippets $snippet
     * @return $this
     */
    public function addChildDirectiveSnippet(DirectiveSnippets $snippet)
    {
        if(!$this->hasChildDirectiveSnippet($snippet))
        {
            $this->ChildDirectiveSnippets->add($snippet);
        }
        return $this;
    }

    /**
     * @param DirectiveSnippets $snippet
     * @return bool
     */
    public function hasChildDirectiveSnippet(DirectiveSnippets $snippet)
    {
        return $this->ChildDirectiveSnippets->contains($snippet);
    }

    /**
     * @return ArrayCollection
     */
    public function getChildDirectiveSnippets()
    {
        return $this->ChildDirectiveSnippets;
    }

    /**
     * @param DirectiveSnippets $snippet
     * @return $this
     */
    public function removeChildDirectiveSnippet(DirectiveSnippets $snippet)
    {
        if($this->hasChildDirectiveSnippet($snippet))
        {
            $this->ChildDirectiveSnippets->removeElement($snippet);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     * @return $this
     */
    public function setName($Name)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param string $Type
     * @return $this
     */
    public function setType($Type)
    {
        $this->Type = $Type;
        return $this;
    }

    /**
     * @return string
     */
    public function getSnippet()
    {
        return $this->Snippet;
    }

    /**
     * @param string $Snippet
     * @return $this
     */
    public function setSnippet($Snippet)
    {
        $this->Snippet = $Snippet;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCustomerViewable()
    {
        return $this->CustomerViewable;
    }

    /**
     * @param boolean $CustomerViewable
     * @return $this
     */
    public function setCustomerViewable($CustomerViewable)
    {
        $this->CustomerViewable = $CustomerViewable;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRequiredPhpSnippet()
    {
        return $this->RequiredPhpSnippet;
    }

    /**
     * @param boolean $RequiredPhpSnippet
     * @return $this
     */
    public function setRequiredPhpSnippet($RequiredPhpSnippet)
    {
        $this->RequiredPhpSnippet = $RequiredPhpSnippet;
        return $this;
    }

    /**
     * @return DirectiveSnippets
     */
    public function getMasterDirectiveSnippets()
    {
        return $this->MasterDirectiveSnippets;
    }

    /**
     * @param DirectiveSnippets $MasterDirectiveSnippets
     * @return $this
     */
    public function setMasterDirectiveSnippets($MasterDirectiveSnippets)
    {
        $this->MasterDirectiveSnippets = $MasterDirectiveSnippets;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getWebSites()
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
}