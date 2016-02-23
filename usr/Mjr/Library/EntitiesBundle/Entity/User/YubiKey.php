<?php

namespace Mjr\Library\EntitiesBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use R\U2FTwoFactorBundle\Model\U2F\TwoFactorKeyInterface;

/**
 * Class U2FKey
 * @ORM\Entity
 * @ORM\Table(name="frontend_users_u2f_keys",
 * uniqueConstraints={@ORM\UniqueConstraint(name="user_unique",columns={"user_id",
 * "key_handle"})})
 */
class YubiKey implements TwoFactorKeyInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     **/
    public $keyHandle;

    /**
     * @ORM\Column(type="string")
     * @var string
     **/
    public $publicKey;

    /**
     * @ORM\Column(type="string")
     * @var string
     **/
    public $certificate;

    /**
     * @ORM\Column(type="string")
     * @var int
     **/
    public $counter;

    /**
     * @ORM\ManyToOne(targetEntity="Mjr\Library\EntitiesBundle\Entity\User\User", inversedBy="u2fKeys")
     * @var User
     **/
    protected $user;

    /**
     * @ORM\Column(type="string")
     * @var string
     **/
    protected $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getKeyHandle()
    {
        return $this->keyHandle;
    }

    /**
     * @param string $keyHandle
     * @return $this
     */
    public function setKeyHandle($keyHandle)
    {
        $this->keyHandle = $keyHandle;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * @param string $publicKey
     * @return $this
     */
    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getCertificate()
    {
        return $this->certificate;
    }

    /**
     * @param string $certificate
     * @return $this
     */
    public function setCertificate($certificate)
    {
        $this->certificate = $certificate;
        return $this;
    }

    /**
     * @return int
     */
    public function getCounter()
    {
        return $this->counter;
    }

    /**
     * @param int $counter
     * @return $this
     */
    public function setCounter($counter)
    {
        $this->counter = $counter;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


}