<?php

namespace App\Services;

use App\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserService
{
    private UserRepositoryInterface $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function index(Request $request)
    {
        return $this->userRepositoryInterface->index($request);
    }

    public function store(Request $request)
    {
        return $this->userRepositoryInterface->store($request);
    }

    public function update(Request $request)
    {
        return $this->userRepositoryInterface->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->userRepositoryInterface->destroy($request);
    }
}