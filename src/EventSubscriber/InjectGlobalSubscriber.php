<?php

namespace App\EventSubscriber;

use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Twig\Environment;

class InjectGlobalSubscriber implements EventSubscriberInterface
{
    /**
     * @var \Twig\Environment
     */
    private $twig;
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $manager;


    public function __construct( Environment $twig, EntityManagerInterface $manager ) {
        $this->twig    = $twig;
        $this->manager = $manager;
    }


    public function onKernelRequest(RequestEvent $event)
    {
        $categoryGlobal = $this->manager->getRepository(Categorie::class)->findAll();
        $this->twig->addGlobal( 'allCategory', $categoryGlobal);
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.request' => 'onKernelRequest',
        ];
    }
}
