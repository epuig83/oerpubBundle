<?php

namespace oerpub\oerpubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Persistence\ManagerRegistry;
use oerpub\oerpubBundle\Model\OerpubManagerEntity as baseOerpubManager;

class OerpubController extends Controller
{

    public function saveAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) { // aseguramos que proviene de AJAX
            $post_content = $this->get('request')->request->all();
            //$content = $em->getRepository("AppBundle:ContingutAgil")->findOneById($id);
            //$content->setContingut($post_content['html']);
            $this->get('oerpub.service')->saveDocument(date('m/d/Y h:i:s a', time()),date('m/d/Y h:i:s a', time()),$post_content['html'],$id);
            $em->flush();
        }

        $response = array("code" => 201, "success" => true, "id" =>$id);
        return new Response(json_encode($response));
    }
}