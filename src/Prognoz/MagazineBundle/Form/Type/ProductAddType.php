<?php
namespace Prognoz\MagazineBundle\Form\Type;
/**
 * Form for add product
 *
 * @author Arsen Borovinskii
 */
class ProductAddType extends \Symfony\Component\Form\AbstractType {
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) {
        $builder->add('title');
        $builder->add('category');
        $builder->add('price');
        $builder->add('color');
        
        //parent::buildForm($builder, $options);
    }
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array('data_class' => '\Prognoz\MagazineBundle\Entity\Product'));
    }
    public function getName() {
        return 'productAdd';
    }    
}

?>
