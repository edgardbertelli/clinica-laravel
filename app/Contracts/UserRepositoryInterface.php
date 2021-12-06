<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function index(Request $request);
    public function store(Request $request);
    public function update(Request $request);
    public function destroy(Request $request);
}