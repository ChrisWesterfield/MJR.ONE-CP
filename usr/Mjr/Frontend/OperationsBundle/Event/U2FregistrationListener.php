<?php

    namespace Mjr\Frontend\OperationsBundle\Event;

    use Mjr\Library\EntitiesBundle\Entity\User\YubiKey;
    use R\U2FTwoFactorBundle\Event\RegisterEvent;
    use Symfony\Component\EventDispatcher\EventSubscriberInterface;

    class U2FregistrationListener implements EventSubscriberInterface
    {
        // ..
        /**
         * getSubscribedEvents
         * @return array
         **/
        public static function getSubscribedEvents()
        {
            return array(
                'ru2_f_two_factor.register' => 'onRegister',
            );
        }

        /**
         * onRegister
         * @param RegisterEvent $event
         * @return void
         **/
        public function onRegister(RegisterEvent $event)
        {
            $user = $event->getUser($event);
            $registrationData = $event->getRegistration();
            $newKey = new YubiKey();
            $newKey->fromRegistrationData($registrationData);
            $newKey->setUser($user);
            $newKey->setName($event->getKeyName());

            // persist the new key

            // generate new response, here we redirect the user to the fos user
            // profile
            $response = new RedirectResponse($this->router->generate('fos_user_profile_show'));
            $event->setResponse($response);
        }
    }