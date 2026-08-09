<?php

namespace App\Controller;

use App\Entity\UsuarioLogin;
use App\Form\UsuarioLoginType;
use App\Repository\UsuarioLoginRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsuarioLoginController extends AbstractController
{
    #[Route('/usuarios', name: 'app_usuarios')]
    public function index(UsuarioLoginRepository $repository): Response
    {
        $usuarios = $repository->findAll();

        return $this->render('usuario_login/index.html.twig', [
            'usuarios' => $usuarios,
        ]);
    }

    #[Route('/usuarios/nuevo', name: 'app_usuario_nuevo')]
    public function nuevo(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        $usuario = new UsuarioLogin();

        $form = $this->createForm(UsuarioLoginType::class, $usuario);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $usuario->setFecha(new \DateTimeImmutable());
            $usuario->setEstado(true);
            $usuario->setHabilitado(true);

            // Hashear la contraseña antes de guardarla
            $passwordHashed = $passwordHasher->hashPassword(
                $usuario,
                $usuario->getPassword()
            );

            $usuario->setPassword($passwordHashed);

            $entityManager->persist($usuario);
            $entityManager->flush();

            return $this->redirectToRoute('app_usuarios');
        }

        return $this->render('usuario_login/nuevo.html.twig', [
            'formulario' => $form,
        ]);
    }
}