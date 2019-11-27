<?php

namespace App\Services;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;


class GospelAlbumManager
{
    public function __construct(ObjectManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function maxId()
    {
        $res = $this->entityManager->createQuery('SELECT max(id) FROM App\Entity\GospelAlbum id')->getResult();
        return $res;
    }
    public function getAllGospelAlbum()
    {
        $res = $this->entityManager->createQuery('SELECT gam FROM App\Entity\GospelAlbum gam order by gam.id desc') 
              ->getResult();
              return $res;
      /*  
      for more view _____ ->setMaxResults(7)
        $res2 = $this->entityManager->createQuery('SELECT actu FROM App\Entity\Actualities actu  where actu.type=1 order by actu.id desc')->getResult();
        $i=0;
        foreach ($res2 as $key) {
            $i++;
        }

        $size=sizeof($res);
        $count=$i-$size;
        return [$res, $size, $count];*/
    }
    public function removePhoto($id)
    {
           $res = $this->entityManager->createQuery("DELETE  FROM App\Entity\GospelAlbum gam where gam.id ='$id' ")->getResult();
            $filesystem = new Filesystem();
            $filesystem->remove(['symlink', 'uploads/gospel/album/'.$id.'', 'image']);
    }
}
