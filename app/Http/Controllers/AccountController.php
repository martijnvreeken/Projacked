<?php

namespace Projacked\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\JsonResponse;
use Projacked\Http\Requests\AccountUpdate;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Tymon\JWTAuth\Facades\JWTAuth;

class AccountController extends Controller
{
    /**
     * @return App\User
     */
    private function getAuthenticatedUser() {
        return JWTAuth::parseToken()->authenticate();
    }

    /**
     * gets the user model for the current authenticated User
     *
     * @return App\User
     */
    public function get() {
        $user = $this->getAuthenticatedUser();
        return new JsonResponse(compact('user'));
    }

    /**
     * update the currently authenticated user's profile
     */
    public function update(AccountUpdate $request) {
        $user = $this->getAuthenticatedUser();
        $user->update($request->all());
        return new JsonResponse(compact('user'));
    }
}
