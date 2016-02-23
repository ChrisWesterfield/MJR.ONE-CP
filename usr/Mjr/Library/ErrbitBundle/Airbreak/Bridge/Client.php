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
use Airbrake\Client as BaseClient;
class Client extends BaseClient
{
    /**
     * Class constructor
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        parent::__construct($configuration);
    }
}