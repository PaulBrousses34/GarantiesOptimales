<?php

namespace App\EventListener;

use Doctrine\Persistence\Event\LifecycleEventArgs;

class TimeStampEvent
{
    // This method is executed prePersist of forms
    public function prePersist(LifecycleEventArgs $args)
    {
        //$args is the object concerned by the evenement
        // if it's modified and flushed, it's intercepted there
        $entity = $args->getObject();

        //If it's an entity with a createdAt property
        if (property_exists($entity, 'DateTelechargement')) {

            //Associate the new date time to the entity
            $entity->setDateTelechargement(new \DateTime('now'));
        }
    }
}