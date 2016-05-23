<?php

namespace Udec\HomeBundle\Form;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class UserType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cedula', null, array('label' => 'Cedula', 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control')))
            ->add('nombre', null, array('label' => 'Nombre', 'translation_domain' => 'FOSUserBundle',  'attr' => array('class' => 'form-control')))
            ->add('apellido', null, array('label' => 'Apellidos', 'translation_domain' => 'FOSUserBundle',  'attr' => array('class' => 'form-control')))
            ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle',  'attr' => array('class' => 'form-control')))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle',  'attr' => array('class' => 'form-control')))
            ->add('plainPassword', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'), array(
                'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password',  'attr' => array('class' => 'form-control')),
                'second_options' => array('label' => 'form.password_confirmation' ,  'attr' => array('class' => 'form-control')),
                'invalid_message' => 'fos_user.password.mismatch', 
            ))
        ;
          
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Udec\HomeBundle\Entity\User'
        ));
    }
}
