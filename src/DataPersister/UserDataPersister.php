<?php

    namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserDataPersister implements ContextAwareDataPersisterInterface{

        public function __construct(
            private EntityManagerInterface $em,

        ){}

        public function supports($data, array $context = []): bool
        {
            if($data instanceof User){
                return true;
            }
            else{
                return false;
            }
        }

        public function persist($data, array $context = [])
        {
            $this->em->persist($data);
            $this->em->flush();
        }

        public function remove($data, array $context = [])
        {
            
        }
}