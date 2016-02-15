<?php
/*
 * This file is part of the EoAirbrakeBundle package.
 *
 * (c) Eymen Gunay <eymen@egunay.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Mjr\Library\ErrbitBundle\Airbreak\Bridge;

use Airbrake\Configuration as BaseConfiguration;
class Configuration extends BaseConfiguration
{
    /**
     * Class constructor
     *
     * @param string $apiKey
     * @param array|\stdClass $async
     * @param $env
     * @param $host
     * @param $secure
     * @internal param Configuration $configuration
     */
    public function __construct($apiKey, $async, $env, $host, $secure)
    {
        parent::__construct($apiKey, array(
            'async'           => $async,
            'environmentName' => $env,
            'host'            => $host,
            'secure'          => $secure,
            'port'            => $secure ? 443 : 80
        ));
    }
}