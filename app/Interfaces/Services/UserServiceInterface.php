<?php


namespace App\Interfaces\Services;

use Symfony\Component\HttpFoundation\JsonResponse;

interface UserServiceInterface {
    public function login(array $data) : JsonResponse;
}