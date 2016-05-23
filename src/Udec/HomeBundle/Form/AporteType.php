<?php

namespace Udec\HomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AporteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo', null, array( 'label' => "Titulo", 'attr' => array('class' => 'form-control')))
            ->add('resumen', null, array('label' => "Resumen", 'attr' => array('class' => 'form-control')))
            ->add('documento',FileType::class,array('data_class' => null,
                'label' => "Archivo",
                'property_path' => 'documento' ,
                'attr' => array('class'=>"form-control")))
            ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Udec\HomeBundle\Entity\Aporte'
        ));
    }
}
