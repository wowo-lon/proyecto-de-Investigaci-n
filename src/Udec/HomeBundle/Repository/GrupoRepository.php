<?php

namespace Udec\HomeBundle\Repository;
/**
 * GrupoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GrupoRepository extends \Doctrine\ORM\EntityRepository
{
	public function listaUsuarios() {

	    $query = $this->getEntityManager()->createQuery(
	    'SELECT u FROM UdecHomeBundle:User u, UdecHomeBundle:Grupo g WHERE u.id <> g.idDocente')->getResult();

	    return $query;
	}
}
