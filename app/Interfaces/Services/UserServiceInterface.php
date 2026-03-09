<?php


namespace App\Interfaces\Services;


interface UserServiceInterface {
    public function login(array $data) ;
    public function verifyTwoFactor(array $data);
    public function logout();
}