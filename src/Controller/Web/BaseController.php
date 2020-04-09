<?php

namespace App\Controller\Web;

use App\Service\ApiTaskDataManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;

class BaseController
{
    /**
     * @Route("/", name="index")
     * @Template("base.html.twig")
     */
    public function indexAction(ApiTaskDataManager $dataManager)
    {
        return [];
    }
}