<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/avg-speed", name="avg")
     */
    public function indexAction(Request $request)
    {
        $result = $this->get('app.avg_view.factory')->createCollection();

        return $this->render('base.html.twig', array(
            'result' => $result,
        ));
    }
}
