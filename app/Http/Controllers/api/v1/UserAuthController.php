<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthManagement\AuthInterface;
use App\Services\AuthManagement\UserAuth;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    use ApiResponser;

    /**
     * @var AuthInterface
     */
    private $authInterface;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(AuthInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }

    public function register(UserRegisterRequest $request)
    {
        try {
            $user = $this->authInterface->register($request->validated());
            return $this->success(200, new UserResource($user));
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    public function login(UserLoginRequest $request)
    {
        try {
            $user = $this->authInterface->login($request->validated());
            return $this->success(200, new UserResource($user));
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}
