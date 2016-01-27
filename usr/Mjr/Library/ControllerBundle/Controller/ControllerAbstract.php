<?php


    namespace  Mjr\Library\ControllerBundle\Controller;

    use Doctrine\Common\Cache\RedisCache;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Response;

    /**
     * Class ControllerAbstract
     * @package Mjr\Library\ControllerBundle\Controller
     * @author Chris Westerfield <chris@MJR.ONE>
     * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
     * @copyright MJR.ONE Group
     * @link http://www.MJR.ONE
     */
    abstract class ControllerAbstract extends Controller
    {
        /**
         * is user a user?
         * @return bool
         */
        protected function isUser()
        {
            if($this->getUser()!==null)
            {
                $this->denyAccessUnlessGranted('ROLE_USER', null, 'Unable to access this page!');
                return true;
            }
            return false;
        }

        /**
         * is User fully authenticated?
         */
        protected function isAuthenticated()
        {
            if (
                    !$this->get('security.authorization_checker')
                        ->isGranted('IS_AUTHENTICATED_FULLY')
            )
            {
                throw $this->createAccessDeniedException();
            }
        }

        /**
         * returns the current user
         * @return mixed
         */
        protected function getCurrentUser()
        {
            return $this->get('security.token_storage')->getToken()->getUser();
        }

        /**
         * is User a reseller
         * @return bool
         */
        protected function isReseller()
        {
            return $this->get('security.authorization_checker')->isGranted('ROLE_RESELLER');
        }

        /**
         * checks if User has access to current Object (Customer Account)
         * @param $object
         * @return bool
         */
        protected function isObjectAllowed($object)
        {
            return true;
        }

        /**
         * is Admin User
         * @return bool
         */
        protected function isAdmin()
        {
            return $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN');
        }

        /**
         * is Support User
         * @return bool
         */
        protected function isSupport()
        {
            return $this->get('security.authorization_checker')->isGranted('ROLE_SUPPORT');
        }

        /**
         * is Root User
         * @return bool
         */
        protected function isRoot()
        {
            return $this->get('security.authorization_checker')->isGranted('ROLE_ROOT');
        }

        /**
         * @return Redis
         */
        protected function getCache()
        {
            return $this->container->get('scn_redis.default');
        }

        /**
         * clears the cache for a key or all
         * @param null $key
         */
        protected function clearDoctrineCache($key=null)
        {
            /**
             * @var RedisCache $cacheDriver
             */
            $cacheDriver = $this->getDoctrine()->getManager()->getConfiguration()->getResultCacheImpl();
            if(!empty($key))
            {
                if(is_object($key))
                {
                    $key = get_class($key).'#'.$key->getId();
                }
                $cacheDriver->delete($key);
            }
            else
            {
                $cacheDriver->deleteAll();
            }
        }

        /**
         * returns standarized Json Response Envelope
         * Structure:
         * array(
         *      'timestamp'=>Unix Time Stamp*
         *      'date'=>MONTH/DAY/YEAR*
         *      'time'=>Hour:Minute:Seconds*
         *      'success'=>boolean true*
         *      'payload'=>Your Payload
         * )
         * * can be overriten by parameters
         * @param array $payload            payload
         * @param bool $success             success of the operation true=yes, false=no success
         * @param integer|null $timestamp   timestamp of action. If null the current time stamp is used
         * @return array                    Json Envelope
         */
        protected function getJsonResponseEnvelope(array $payload,$success=true,$timestamp=null)
        {
            if(empty($timestamp))
            {
                $timestamp = time();
            }
            return array(
                'timestamp'=>$timestamp,
                'date'=>date('m/d/Y',$timestamp),
                'time'=>date('H:i:s',$timestamp),
                'success'=>true,
                'payload'=>$payload
            );
        }

        /**
         * return Json Response
         * @param $return
         *
         * @return \Symfony\Component\HttpFoundation\Response
         */
        protected function returnJson($return)
        {
            $response = new Response(json_encode($return));
            $response->headers->set('Content-Type','application/json');
            return $response;
        }
    }