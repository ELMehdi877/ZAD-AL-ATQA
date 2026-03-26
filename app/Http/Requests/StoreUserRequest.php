<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|min:3|max:20',
            'prenom' => 'required|string|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'role' => 'required|in:admin,student,parent,teacher',
        ];
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|min:3|max:20',
            'prenom' => 'required|string|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'role' => 'required|in:admin,student,parent,teacher'
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return back()->with('success', 'nouveau :'.$data['role']);
    }
}
