<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        $usuarios = User::all();
        return view('admin.users.index', compact('usuarios'));
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $usuario = new User();

        $request['password'] = bcrypt($request->password);

        $usuario->create($request->all());

        return redirect(route('users.index'))->with('message','Cadastro efetuado com sucesso');
    }


    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $request->validated();
        $request['password'] = bcrypt($request->password);
        $user->update($request->all());
        return redirect(route('users.index'))->with('message', 'usuário alterado com sucesso.');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'))->with('message', 'usuário deletado com sucesso.');
    }
}
