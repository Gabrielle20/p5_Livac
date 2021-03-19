<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Section;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // dd($options);
        $builder
            ->add('title')
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'title'
            ])
            ->add('section', EntityType::class, [
                'class' => Section::class,
                'choice_label' => 'title'
            ])
            ->add('author')
            ->add('entete');

            // $image = $options['data']->getImage();

            // if (is_null($image)) {
                $builder->add('image', FileType::class, [
                        'label' => 'Image',
                        'mapped' => false,
                        'required' => false,
                        'constraints' => [new File([])]
                ]);
            // }

            // else {
            //     $builder->add('image', null , array("attr"=> array(), 'required' => false));
            // }

            $builder->add('content');
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
