<?php

namespace App\Services\AuthManagement;

/**
 * Interface AuthInterface
 */
interface AuthInterface
{
    public function register(array $request);

    public function login(array $request);
}