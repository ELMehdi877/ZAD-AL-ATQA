<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHalaqaRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Halaqa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
    * Display the admin dashboard.
    */
    public function dashboard()
    {
        $usersCount = User::count();
        $activeUsersCount = User::where('status', 'active')->count();
        $halaqasCount = Halaqa::count();

        return view('admin.dashboard', compact('usersCount', 'activeUsersCount', 'halaqasCount'));
    }
    
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('admin.users.index', compact('users'));
    }
        
    /**
     * Show the form for creating a new resource.
     */
    public function createUserPage()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(StoreUserRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return redirect()->route('users.index')
                ->with('success', 'Nouveau user '.$user->nom.' créé !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editUserPage(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        // Supprime le password si vide pour ne pas écraser l'existant
        if (empty($data['password'])) {
            unset($data['password']);
        }
        else {
            $data['password'] = Hash::make($data['password']);
        }
        
        $user->update($data);

        return redirect()->route('users.index')
                ->with('success', 'update valider user '. $user->nom);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteUser(int $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'delete user '.$user->nom);
    }

    /**
     * Update the status of the specified resource in storage.
     */
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

    /**
     * Search for users by name.
     */
    public function searchUserByName(Request $request)
    {
        $request->validate([
            'nom' => 'required|string'
        ]);
        
        $users = User::where('nom', 'like', '%' . $request->nom . '%')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.users.index', compact('users'));
    }

    


}