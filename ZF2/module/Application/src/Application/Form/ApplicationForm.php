<?php
    namespace Application\Form;
    use Zend\Form\Form;
    use Zend\InputFilter\Factory as InputFactory;
    use Zend\InputFilter\InputFilter;
    use Zend\Form\Element;
    use Doctrine\ORM\EntityManager;

    use DoctrineModule\Persistence\ObjectManagerAwareInterface;
    use Doctrine\Common\Persistence\ObjectManager;

    use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
    use Application\Entity\RealtyType;

    class ApplicationForm extends Form implements ObjectManagerAwareInterface
    {
        protected $objectManager;



        public function setObjectManager(ObjectManager $objectManager)
        {
            // TODO: Implement setObjectManager() method.

            $this->objectManager = $objectManager;
            return $this;
        }

        public function getObjectManager()
        {
            // TODO: Implement getObjectManager() method.
            return $this->objectManager;
        }

        public function __construct(ObjectManager $objectManager)
        {
            parent::__construct('applicationForm');
            $this->setObjectManager($objectManager);
            $this->createElements();
        }


        public function createElements()
        {
            $this->setAttribute('method', 'post');
            $this->setAttribute('class', 'bs-example form-horizontal');

            $this->add(array(
                'type' => 'DoctrineModule\Form\Element\ObjectSelect',
                'name' => 'DialType',
                'options' => array(
                    'label' => 'Тип сделки',
                    'empty_option' => '--Выберите тип--',
                    'object_manager' => $this->getObjectManager(),
                    'target_class' => 'Application\Entity\RealtyType',
                    'property' => 'name',
                ),

                'attributes' => array(
                    'class' => 'form-control',
                    'required' => 'required',
                ),

            ));


            $this->add(array(
                'type' => 'DoctrineModule\Form\Element\ObjectSelect',
                'name' => 'city',
                'id' => 'selectCity',
                'options' => array(
                    'label' => 'Город',
                    'empty_option' => '--Выберите город--',
                    'object_manager' => $this->getObjectManager(),
                    'target_class' => 'Application\Entity\City',
                    'property' => 'name',
                ),

                'attributes' => array(
                    'id' => 'selectCity',
                    'class' => 'form-control',
                    'required' => 'required',
                ),

            ));

            $this->add(array(
                'type' => 'select ',
                'name' => 'district',
                'options' => array(
                    'label' => 'Район',
                    'empty_option' => '--Выберите район--',
                   // 'object_manager' => $this->getObjectManager(),
                    //'target_class' => 'Application\Entity\Districts',
                    'property' => 'name',
                ),

                'attributes' => array(
                    'class' => 'form-control',
                    'required' => 'required',
                ),

            ));

            $this->add(array(
                'name' => 'submit',
                'type' => 'Submit',

                'attributes' => array(
                    'value' => 'Найти',
                    'id' => 'submitSearch',
                    'class' => 'btn btn-info ',
                ),
            ));





        }

    }
