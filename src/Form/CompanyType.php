<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'nombre'
            ])
            ->add('logoFile', FileType::class, [
                'mapped' => false,
                'required' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Por favor subir solo Imágenes',
                    ])
                ],
            ])
            ->add('numberMercantil')
            ->add('pdfMercantilFile', FileType::class, [
                'mapped' => false,
                'label' => 'Subir PDF Mercantil',
                'required' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '4024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Por favor subir solo PDF',
                    ])
                ],
            ])
            ->add('representLegal')
            ->add('address')
            ->add('phone')
            ->add('numberWorkers', IntegerType::class, [
                'attr' => ['min' => 0]
            ])
            ->add('whatsapp')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
