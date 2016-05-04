<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity;
use Application\Form\ApplicationForm as ApplicationForm;


class IndexController extends AbstractActionController
{


    public function indexAction()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $form = new ApplicationForm($em);

        $posts = $em
            ->getRepository('\Application\Entity\Realty')
            ->findBy(array('state' => 1), array('created' => 'ASC'));

        $post_array = array();

        foreach ($posts as $post)
        {
            $post_array[] = $post->getArrayCopy();
        }

        $view = new ViewModel(array(
            'form'  => $form,
            'posts' => $post_array,
        ));


        return $view;


        //return $form;


       // return new ViewModel();
    }

    public function viewAction()
    {
        echo 1;
    }
}
