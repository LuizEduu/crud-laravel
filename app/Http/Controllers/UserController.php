<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = $this->userRepository->create($validatedData);

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ])->setStatusCode(201);
    }

    public function findById(string $id)
    {
        $user = $this->userRepository->findById($id);

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            return response()->json([
                'message' => 'Usuário não encontrado'
            ]);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $this->userRepository->update($user, $request->all());

        return response()->json()->setStatusCode(204);
    }
    public function delete(Request $request, string $id)
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            return response()->json([
                'message' => 'Usuário não encontrado.'
            ]);
        }

        $this->userRepository->delete($user);

        return response()->json()->setStatusCode(204);
    }
}
