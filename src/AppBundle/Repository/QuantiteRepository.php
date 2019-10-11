<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Ingredient;
use AppBundle\Entity\Recette;
use Doctrine\ORM\Query\Expr\Join;


class QuantiteRepository extends \Doctrine\ORM\EntityRepository
{

    public function getQuantitéByIngredients(Recette $recette)
    {
        $qb = $this->createQueryBuilder('q');
            //Je sélectionne, pour la recette choisi, les éléments de "Quantite"
       return $qb->select('q')
            ->where('q.fk_recette = :recetteId')
            ->setParameter('recetteId', $recette->getId())
            ->getQuery()
            ->getResult();
    }

}

