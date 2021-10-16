<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserManagerService
{

    private EntityManager $entityManager;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;

    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException|\Doctrine\ORM\ORMException
     */
    public function new(string $username, string $userpassword): User
    {
        $user = new User();
        $user->setEmail($username);

        $user->setPassword($this->passwordHasher->hashPassword(
            $user,
            $userpassword
        ));
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}
