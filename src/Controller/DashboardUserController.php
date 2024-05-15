<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CompanyType;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dashboard')]
class DashboardUserController extends AbstractController
{
    #[Route('/user', name: 'app_dashboard_user')]
    public function index(Request $request, EntityManagerInterface $entityManager, FileUploader $fileUploader): Response
    {
        $company = new Company();
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            /** @var UploadedFile $logoFile */
            $logoFile = $form->get('logoFile')->getData();
            $pdfFile = $form->get('pdfMercantilFile')->getData();

            if ($logoFile){
                $filenameLogo = $fileUploader->upload($logoFile);
                $company->setLogo($filenameLogo);
            }

            if ($pdfFile){
                $pdfName = $fileUploader->upload($pdfFile);
                $company->setPdfMercantil($pdfName);
            }

            $entityManager->persist($company);
            $entityManager->flush();

            $this->addFlash('success', 'Se ha creado la empresa satisfactoriamente');

            return $this->redirectToRoute('app_dashboard_user');
        }

        return $this->render('dashboard_user/index.html.twig', [
            'form' => $form
        ]);
    }
}
