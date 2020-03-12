<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\VideoManagerTVProg;
use Symfony\Component\Security\Core\Security;


class TVProgController extends AbstractController
{


	public function __construct(Security $security)
    {
        $this->security = $security;
        //$this->formHandler = $formHandler;
        //$this->cfh=$cfh;
       // $this->entityManager = $entityManager;
        //$this->session = $session;
    }


    /**
     * @Route("/tv/prog", name="t_v_prog")
     */
    public function index()
    {
        return $this->render('tv_prog/index.html.twig');
    }

    /**
     * @Route("/today", name="today")
     */
    public function today(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }

        return $this->render('tv_prog/today.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosToday()[0],
            'pagination'=>$vmTVProg->getAllVideosToday()[1],
        ]);
    }

    /**
     * @Route("/teleradio", name="teleradio")
     */
    public function teleradio(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }

        return $this->render('tv_prog/teleradio.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosTeleradio()[0],
            'pagination'=>$vmTVProg->getAllVideosTeleradio()[1],
        ]);
    }

    /**
     * @Route("/bahaghari", name="bahaghari")
     */
    public function bahaghari(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }

        return $this->render('tv_prog/bahaghari.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosBahaghari()[0],
            'pagination'=>$vmTVProg->getAllVideosBahaghari()[1],
        ]);
    }

    /**
     * @Route("/worship", name="worship")
     */
    public function worship(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }

        return $this->render('tv_prog/worship.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosWorship()[0],
            'pagination'=>$vmTVProg->getAllVideosWorship()[1],
        ]);
    }

    /**
     * @Route("/manunodlo", name="manunodlo")
     */
    public function manunodlo(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/manunodlo.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosManunodlo()[0],
            'pagination'=>$vmTVProg->getAllVideosManunodlo()[1],
        ]);
    }

    /**
     * @Route("/kubos", name="kubos")
     */
    public function kubos(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/kubos.html.twig', [
           'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosKubos()[0],
            'pagination'=>$vmTVProg->getAllVideosKubos()[1],
        ]);
    }

    /**
     * @Route("/mool", name="mool")
     */
    public function mool(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/mool.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosMool()[0],
            'pagination'=>$vmTVProg->getAllVideosMool()[1],
        ]);
    }

    /**
     * @Route("/gpm", name="gpm")
     */
    public function gpm(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/gpm.html.twig', [
           'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosGpm()[0],
            'pagination'=>$vmTVProg->getAllVideosGpm()[1],
        ]);
    }

    /**
     * @Route("/mass", name="mass")
     */
    public function mass(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/mass.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosMass()[0],
            'pagination'=>$vmTVProg->getAllVideosMass()[1],
        ]);
    }

    /**
     * @Route("/fad", name="fad")
     */
    public function fad(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/fad.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosFad()[0],
            'pagination'=>$vmTVProg->getAllVideosFad()[1],
        ]);
    }


    /**
     * @Route("/ld", name="ld")
     */
    public function ld(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/ld.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosLd()[0],
            'pagination'=>$vmTVProg->getAllVideosLd()[1],
        ]);
    }

    /**
     * @Route("/kristo", name="kristo")
     */
    public function kristo(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/kristo.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosKristo()[0],
            'pagination'=>$vmTVProg->getAllVideosKristo()[1],
        ]);
    }

    /**
     * @Route("/kaupod", name="kaupod")
     */
    public function kaupod(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/kaupod.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosKaupod()[0],
            'pagination'=>$vmTVProg->getAllVideosKaupod()[1],
        ]);
    }

    /**
     * @Route("/laiko", name="laiko")
     */
    public function laiko(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/laiko.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosLaiko()[0],
            'pagination'=>$vmTVProg->getAllVideosLaiko()[1],
        ]);
    }

    /**
     * @Route("/giving", name="giving")
     */
    public function giving(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/giving.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosGiving()[0],
            'pagination'=>$vmTVProg->getAllVideosGiving()[1],
        ]);
    }

    /**
     * @Route("/maria", name="maria")
     */
    public function maria(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/maria.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosMaria()[0],
            'pagination'=>$vmTVProg->getAllVideosMaria()[1],
        ]);
    }

    /**
     * @Route("/amligan", name="amligan")
     */
    public function amligan(VideoManagerTVProg $vmTVProg)
    {
        $buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }

        return $this->render('tv_prog/amligan.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosAmligan()[0],
            'pagination'=>$vmTVProg->getAllVideosAmligan()[1],
        ]);
    }

    /**
     * @Route("/outreach", name="outreach")
     */
    public function outreach(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/outreach.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosOutreach()[0],
            'pagination'=>$vmTVProg->getAllVideosOutreach()[1],
        ]);
    }

    /**
     * @Route("/ipm", name="ipm")
     */
    public function ipm(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/ipm.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosIpm()[0],
            'pagination'=>$vmTVProg->getAllVideosIpm()[1],
        ]);
    }

    /**
     * @Route("/specialEvents", name="special_events")
     */
    public function specialEvents(VideoManagerTVProg $vmTVProg)
    {
    	$buffer=false;
        if ($this->security->getUser()!=null) {
            $buffer=true;
        }
        return $this->render('tv_prog/special_events.html.twig', [
            'buffer' => $buffer,
            'videos'=> $vmTVProg->getAllVideosSpecialEvents()[0],
            'pagination'=>$vmTVProg->getAllVideosSpecialEvents()[1],
        ]);
    }
}
