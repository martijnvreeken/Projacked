<?php

namespace Projacked\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Projacked\Http\Requests\AccountUpdate;
use Tymon\JWTAuth\Facades\JWTAuth;

class AccountController extends Controller
{
    private function getAuthenticatedUser() {
        return JWTAuth::parseToken()->authenticate();
    }
    public function get() {
        $user = $this->getAuthenticatedUser();
        return new JsonResponse(compact('user'));
    }
    
    public function update(AccountUpdate $request) {
        $user = $this->getAuthenticatedUser();
        $user->update($request->all());
        return new JsonResponse(compact('user'));
    }
}
