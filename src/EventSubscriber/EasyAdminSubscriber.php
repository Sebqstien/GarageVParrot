<?php

namespace App\EventSubscriber;

use App\Entity\Ads;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityDeletedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{

    /**
     *
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            AfterEntityDeletedEvent::class => ['RemovePhysicalImages'],
        ];
    }

    public function RemovePhysicalImages(AfterEntityDeletedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Ads)) {
            return;
        }

        $images = $entity->getImages();

        foreach ($images as $image) {
            $nameFile = '/public/' .  $image->getPath();

            if (file_exists($nameFile)) {
                unlink($nameFile);
            }
        }
    }
}
