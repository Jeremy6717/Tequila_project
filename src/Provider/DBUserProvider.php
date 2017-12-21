<?php

namespace Provider;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Doctrine\Common\Persistence\ObjectRepository;


//Get the login
class DBUserProvider implements UserProviderInterface {
    
    private $repository;
    
    public function __construct(ObjectRepository $repository) {
        
        $this->repository = $repository;
    }

    public function loadUserByUsername($username) {

        $user =$this->repository->findOneByUsername ($username);

        if(!$user){
            throw new UsernameNotFoundException;
        }
        return $user;
    } 
    
    public function refreshUser(UserInterface $user) {
        
        if (!$this->supportsClass(get_class($user))){
            throw new UnsupportedUserException();
        }
        
        return $this->loadUserByUsername ($user->getUsername());

    }
    
    public function supportsClass($class) {
        return $class === \Models\UserModel::class;
    }
    
}
