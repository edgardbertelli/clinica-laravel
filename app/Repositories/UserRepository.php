<?php

namespace App\Repositores;

use App\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use League\CommonMark\Extension\CommonMark\Parser\Block\ThematicBreakStartParser;
use Symfony\Component\HttpFoundation\Response;

class UserRepository implements UserRepositoryInterface
{
    private User $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function index(Request $request)
    {
        return $this->users->all([$request->select]);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $newUser = $this->users->create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'string'   => $request->crm,
                'gender'   => $request->gender,
            ]);
            DB::commit();

            return response()->json($newUser, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Request $request)
    {
        try {
            $user = $this->users::findOrFail($request->id);

            DB::beginTransaction();
            $user->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'string'   => $request->crm,
                'gender'   => $request->gender,
            ]);
            DB::commit();

            return response()->json($user->fresh(), Response::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            $user = $this->users::findOrFail($request->id);

            DB::beginTransaction();
            $user->delete();
            DB::commit();

            return response()->json(['Usuário apagado com sucesso!'], Response::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
