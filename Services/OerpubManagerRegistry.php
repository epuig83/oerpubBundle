<?php

namespace oerpub\oerpubBundle\Services;

use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class OerpubManagerRegistry
{
    protected $managerRegistry;
    protected $container;
    protected $recipient;
    protected $manager;

    public function __construct(ManagerRegistry $managerRegistry, Container $container)
    {
        $this->container = $container;
        $this->recipient = $this->container->getParameter( 'class_manager' );
        $this->managerRegistry = $managerRegistry;
        $this->manager = $this->managerRegistry->getManagerForClass($this->recipient);

    }

    public function getManager() {
        return $this->manager;
    }

    public function saveAction($newCreateData,$newModifyData,$content,$id) {
        $entity = $this->manager->getRepository($this->recipient)->find($id);
        $entity->setCreateDatetime(new \DateTime($newCreateData));
        $entity->setModifyDatetime(new \DateTime($newModifyData));
        $entity->setContent($content);
        $this->save($entity);
    }

    public function save($entity) {
        $this->manager->persist($entity);
        $this->manager->flush();
    }


}