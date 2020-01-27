<?php


namespace App\EventListener;


use App\Entity\User;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

class UserChangedNotifier implements LoggerAwareInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Sets a logger instance on the object.
     *
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger)
    {
        // TODO: Implement setLogger() method.
        $this->logger = $logger;
    }

    public function postUpdate(User $user, LifecycleEventArgs $event)
    {
        $entity = $event->getObject();
        if (!$entity instanceof User)
            return;
        $this->logger->info('Modification de : Nom: '.$user->getFirstname().'; Prénom: '.$entity->getFirstname());
    }
}