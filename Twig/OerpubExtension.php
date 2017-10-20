<?php

namespace oerpub\oerpubBundle\Twig;

class OerpubExtension extends \Twig_Extension
{    
    public function getFunctions()
    {

        return array(
            'oerpub' => new \Twig_SimpleFunction(
                'oerpub',
                array($this, 'oerpub'),
                array('is_safe' => array('html'),
                'needs_environment' => true)
            ),            
        );
    }

    public function oerpub()
    {
        return $twig->render('oerpub:Default:index.html.twig');
    }

    public function getName() 
    {
        return 'oerpub';
    }
}