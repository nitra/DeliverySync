<?php

namespace Nitra\ManagerBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * RoleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RoleRepository extends EntityRepository
{
    /**
     * возвращает список ролей для формы групп
     * @return type список ролей
     */
    public function getRolesToChoice()
    {
        $result= $this->createQueryBuilder('r')
                        ->select('r.name, r.description')
                        ->orderBy('r.description')
                        ->getQuery()
                        ->getArrayResult();
        $roles = array();
        foreach ($result as $role)
        {
            $roles[$role['name']] = $role['description'];
        }
        return $roles;
    }
}