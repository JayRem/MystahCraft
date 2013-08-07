<?php

namespace MystahCraft\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RulesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('regles')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MystahCraft\SiteBundle\Entity\Rules'
        ));
    }

    public function getName()
    {
        return 'mystahcraft_sitebundle_rulestype';
    }
}
