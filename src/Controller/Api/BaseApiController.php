<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class BaseApiController extends AbstractController
{
    /**
     * @var Serializer
     */
    protected $serializer;

    public function __construct()
    {
        $this->serializer = $this->getSerializer();
    }

    /**
     * @param $data
     * @param int $statusCode
     *
     * @return Response
     */
    protected function createApiResponse($data = [], int $statusCode = 200): Response
    {
        $json = $this->serializer->serialize($data, 'json');

        return new Response($json, $statusCode, [
            'Content-Type' => 'application/json',
        ]);
    }

    protected function createApiErrorResponse(string $errorMessage, int $statusCode = 500): Response
    {
        $data = [
            'errorCode' => $statusCode,
            'errorMessage' => $errorMessage,
        ];

        return $this->createApiResponse($data, $statusCode);
    }

    /**
     * @return Serializer
     */
    private function getSerializer(): Serializer
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        return new Serializer($normalizers, $encoders);
    }
}