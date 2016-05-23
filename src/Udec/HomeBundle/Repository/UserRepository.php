<?php

namespace Udec\HomeBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityRepository;

class UserRepository extends \Doctrine\ORM\EntityRepository implements UserLoaderInterface
{
	public function loadUserByUsername($username)
    {
        return $this->createQueryBuilder('u')
            ->where('u.username = :username OR u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function listaUsuarios() {

	    $query = $this->getEntityManager()->createQuery(
	    'SELECT u FROM UdecHomeBundle:User u, UdecHomeBundle:Grupo g WHERE u <> g.lider')->getResult();

	    return $query;
	}
}