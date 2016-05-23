<?php

namespace Udec\HomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Udec\HomeBundle\Repository\UserRepository;

class GrupoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null, array( 'attr' => array('class' => 'form-control')))
            ->add('fechaInicio', DateType::class, array('input'  => 'datetime','widget' => 'single_text', 'attr' => array('class' => 'form-control')))
            ->add('estado', CheckboxType::class, array('label'  => '¿Estado Activo?', 'required' => false, 'attr' => array('class' => 'checkbox-inline', )))
            ->add('lider', EntityType::class, array(
                'class' => 'UdecHomeBundle:User', 
                'choice_label' => 'nombreCompleto',
                'multiple' => false,
                'attr' => array('class' => 'form-control',)))
            ->add('LineasInvestigacion', EntityType::class, array('class' => 'UdecHomeBundle:LineaInvestigacion', 'choice_label' => 'nombre', 'multiple' => true,'attr' => array('class' => 'form-control',)))
            ->add('integrantes', EntityType::class, array(
                'class' => 'UdecHomeBundle:User', 
                'choice_label' => 'nombreCompleto', 
                'multiple' => true,
                'expanded' => true,
                'attr' => array('class' => 'form-group',),
                'choice_attr' => function($val, $key, $index) {
                        return ['class' => 'checkbox  '.strtolower($key)];
                    },
                ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Udec\HomeBundle\Entity\Grupo'
        ));
    }
}
