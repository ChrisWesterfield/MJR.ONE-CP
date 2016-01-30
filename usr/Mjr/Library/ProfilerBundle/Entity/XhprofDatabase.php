<?php

namespace Mjr\Library\ProfilerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="system_profiler")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity()
 * @package Mjr\Library\ProfilerBundle\Entities
 * @author Chris Westerfield <chris@MJR.ONE>
 * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
 * @copyright MJR.ONE Group
 * @link http://www.MJR.ONE
 */
class XhprofDatabase
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var integer
     */
    protected $id;
    /**
     * @ORM\Column(name="url",type="string", length=255, nullable=true)
     * @var string
     */
    protected $url;
    /**
     * @ORM\Column(name="c_url",type="string", length=255, nullable=true)
     * @var string
     */
    protected $canonicalUrl;
    /**
     * @ORM\Column(name="server_name",type="string", length=64, nullable=true)
     * @var string
     */
    protected $serverName;
    /**
     * @ORM\Column(name="type",type="integer", nullable=true)
     * @var string
     */
    protected $type;

    /**
     * @ORM\Column(name="perfdata",type="blob", nullable=true)
     * @var string
     */
    protected $perfData;

    /**
     * @ORM\Column(name="cookie",type="blob", nullable=true)
     * @var string
     */
    protected $cookie;

    /**
     * @ORM\Column(name="post",type="blob", nullable=true)
     * @var string
     */
    protected $post;

    /**
     * @ORM\Column(name="get",type="blob", nullable=true)
     * @var string
     */
    protected $get;

    /**
     * @ORM\Column(name="pmu",type="integer", nullable=true)
     * @var string
     */
    protected $pmu;

    /**
     * @ORM\Column(name="wt",type="integer", nullable=true)
     * @var string
     */
    protected $wt;

    /**
     * @ORM\Column(name="cpu",type="integer", nullable=true)
     * @var string
     */
    protected $cpu;

    /**
     * @ORM\Column(name="server_id",type="string", length=250, nullable=false, options={"default" = "t11"})
     * @var string
     */
    protected $serverId;

    /**
     * @ORM\Column(name="aggregateCalls_include",type="string", length=255, nullable=true)
     * @var string
     */
    protected $aggregateCallsInclude;

    /**
     * @ORM\Column(name="timestamp",type="integer", nullable=true)
     * @var string
     */
    protected $timestamp;

    /**
     * @ORM\Column(name="raw", type="text", nullable=true)
     * @var string
     */
    protected $raw;

    public function __construct()
    {
        $this->timestamp = time();
    }
    /**
     * Get id.
     *
     * @return id.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get url.
     *
     * @return url.
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set url.
     *
     * @param url the value to set.
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get canonicalUrl.
     *
     * @return canonicalUrl.
     */
    public function getCanonicalUrl()
    {
        return $this->canonicalUrl;
    }

    /**
     * Set canonicalUrl.
     *
     * @param canonicalUrl the value to set.
     *
     * @return $this
     */
    public function setCanonicalUrl($canonicalUrl)
    {
        $this->canonicalUrl = $canonicalUrl;
        return $this;
    }

    /**
     * Get serverName.
     *
     * @return serverName.
     */
    public function getServerName()
    {
        return $this->serverName;
    }

    /**
     * Set serverName.
     *
     * @param serverName the value to set.
     *
     * @return $this
     */
    public function setServerName($serverName)
    {
        $this->serverName = $serverName;
        return $this;
    }

    /**
     * Get perfData.
     *
     * @return perfData.
     */
    public function getPerfData()
    {
        return $this->perfData;
    }

    /**
     * Set perfData.
     *
     * @param perfData the value to set.
     *
     * @return $this
     */
    public function setPerfData($perfData)
    {
        $this->perfData = $perfData;
        return $this;
    }

    /**
     * Get cookie.
     *
     * @return cookie.
     */
    public function getCookie()
    {
        return $this->cookie;
    }

    /**
     * Set cookie.
     *
     * @param cookie the value to set.
     *
     * @return $this
     */
    public function setCookie($cookie)
    {
        $this->cookie = $cookie;
        return $this;
    }

    /**
     * Get post.
     *
     * @return post.
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set post.
     *
     * @param post the value to set.
     *
     * @return $this
     */
    public function setPost($post)
    {
        $this->post = $post;
        return $this;
    }

    /**
     * Get get.
     *
     * @return get.
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * Set get.
     *
     * @param get the value to set.
     *
     * @return $this
     */
    public function setGet($get)
    {
        $this->get = $get;
        return $this;
    }

    /**
     * Get pmu.
     *
     * @return pmu.
     */
    public function getPmu()
    {
        return $this->pmu;
    }

    /**
     * Set pmu.
     *
     * @param pmu the value to set.
     *
     * @return $this
     */
    public function setPmu($pmu)
    {
        $this->pmu = $pmu;
        return $this;
    }

    /**
     * Get wt.
     *
     * @return wt.
     */
    public function getWt()
    {
        return $this->wt;
    }

    /**
     * Set wt.
     *
     * @param wt the value to set.
     *
     * @return $this
     */
    public function setWt($wt)
    {
        $this->wt = $wt;
        return $this;
    }

    /**
     * Get cpu.
     *
     * @return cpu.
     */
    public function getCpu()
    {
        return $this->cpu;
    }

    /**
     * Set cpu.
     *
     * @param cpu the value to set.
     *
     * @return $this
     */
    public function setCpu($cpu)
    {
        $this->cpu = $cpu;
        return $this;
    }

    /**
     * Get serverId.
     *
     * @return serverId.
     */
    public function getServerId()
    {
        return $this->serverId;
    }

    /**
     * Set serverId.
     *
     * @param serverId the value to set.
     *
     * @return $this
     */
    public function setServerId($serverId)
    {
        $this->serverId = $serverId;
        return $this;
    }

    /**
     * Get type.
     *
     * @return type.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type.
     *
     * @param type the value to set.
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get timestamp.
     *
     * @return timestamp.
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set timestamp.
     *
     * @param timestamp \DateTime value to set.
     *
     * @return $this
     */
    public function setTimestamp($timestamp)
    {
        if($timestamp instanceof \DateTime)
        {
            $timestamp = $timestamp->getTimestamp();
        }
        $this->timestamp = $timestamp;
        return $this;
    }

    public function __toString()
    {
        return $this->getId();
    }

    /**
     * @ORM\PrePersist
     */
    public function beforePersist()
    {
        $this->setTimestamp(time());
    }

    /**
     * Get aggregateCallsInclude.
     *
     * @return aggregateCallsInclude.
     */
    public function getAggregateCallsInclude()
    {
        return $this->aggregateCallsInclude;
    }

    /**
     * Set aggregateCallsInclude.
     *
     * @param aggregateCallsInclude the value to set.
     *
     * @return $this
     */
    public function setAggregateCallsInclude($aggregateCallsInclude)
    {
        $this->aggregateCallsInclude = $aggregateCallsInclude;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * @param mixed $raw
     */
    public function setRaw($raw)
    {
        $this->raw = $raw;
    }


}