<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\StoreHalaqaRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('welcome', compact('users'));
    }

    //Fonction pour cree un compte d'un utilisateur
    public function storeUser(StoreUserRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return redirect()->route('users.index')
                ->with('success', 'Nouveau user '.$user->nom.' créé !');
    }

    //Affiche tous les utilisateurs
    public function getAllUsers()
    {
        // $users = User::all();
        // return back()->with([
        //     'users' => $users
        // ]);

        $users = User::orderBy('id', 'asc')->get();
        return view('welcome', compact('users'));
    }

    //Modifie les infos d'un utilisateur
    public function updateUser(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        // Supprime le password si vide pour ne pas écraser l'existant
        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')
                ->with('success', 'update valider user '. $user->nom);
    }

    //Bloquer ou Débloquer un utilisateur
    public function statusUser(int $id)
    {
        $user = User::findOrfail($id);

        if ($user->status === 'active') {
            $user->update([
            'status' => 'inactive'
            ]);
        }

        else {
            $user->update([
            'status' => 'active'
            ]);
        }
        

        return redirect()->route('users.index')
            ->with('success', 'status update');
    }

    //Supprimer un compte
    public function deleteUser(int $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'delete user '.$user->nom);
    }

    //Chercher un utilisateur par son nom
    public function searchUserByName(Request $request)
    {
        $request->validate([
            'nom' => 'required|string'
        ]);
        
        $usersByName = User::where('nom', 'like', '%' . $request->nom . '%')->get();

        return view('welcome', compact('usersByName'));
    }

    //Cree une Halaqa
    public function storeHalaqa(StoreHalaqaRequest $request)
    {
        $halaqa = $request->validated();

        
    }
}

