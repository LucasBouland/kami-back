<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use \Firebase\JWT\JWT;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApiController extends AbstractController
{
    /**
    * @Route("/api/test/see", name="testapis")
    */
    function testread()
    {
        return $this->json([
                'message' => 'tests!',
        ]);
    }
    /**
    * @Route("/api/test/create", name="testapic")
    */
    function testcreate()
    {
        return $this->json([
                'message' => 'testc!',
        ]);
    }

}