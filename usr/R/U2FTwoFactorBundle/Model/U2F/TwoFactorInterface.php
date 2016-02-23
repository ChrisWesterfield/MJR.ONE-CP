<?php

namespace R\U2FTwoFactorBundle\Model\U2F;
use Mjr\Library\EntitiesBundle\Entity\User\YubiKey;

/**
 * Interface: TwoFactorInterface
 *
 */
interface TwoFactorInterface
{

    /**
     * isU2FAuthEnabled
     * @return boolean
     **/
    public function isU2FAuthEnabled();

    /**
     * getU2FKeys
     * @return array
     **/
    public function getU2FKeys();

    /**
     * addU2FKey
     * @param YubiKey $key
     * @return void
     **/
    public function addU2FKey(YubiKey $key);

    /**
     * removeU2FKey
     * @param YubiKey $key
     * @return void
     **/
    public function removeU2FKey(YubiKey $key);
}
