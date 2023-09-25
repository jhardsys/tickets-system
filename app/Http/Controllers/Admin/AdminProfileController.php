<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $data = [
        'first_name' => $request->session()->get('user_session')['first_name'],
        'first_surname' => $request->session()->get('user_session')['first_surname'],
        'second_surname' => $request->session()->get('user_session')['second_surname'],
        'phone' => $request->session()->get('user_session')['phone'],
        'email' => $request->session()->get('user_session')['email'],
        'id' => $request->session()->get('user_session')['id'],
        // 'password' => $request->session()->get('user')->password,
      ];
      return view("admin.profile.index", ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    { 
        $data = [
        'first_name' => $request->session()->get('user_session')['first_name'],
        'first_surname' => $request->session()->get('user_session')['first_surname'],
        'second_surname' => $request->session()->get('user_session')['second_surname'],
        'phone' => $request->session()->get('user_session')['phone'],
        'email' => $request->session()->get('user_session')['email'],
        'id' => $request->session()->get('user_session')['id'],
      ];
      return view('admin.profile.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $admin_data = [
          'first_name' => $request->first_name,
          'first_surname' => $request->first_surname,
          'second_surname' => $request->second_surname,
          'phone' => $request->phone,
        ];

        $administrator = Administrator::findOrFail($id);
        $administrator->update($admin_data);
        $administrator->user()->update(['email' => $request->email]);
        $request->session()->put('user_session', [
            'id' => $administrator->id,
            'first_name' => $administrator->first_name,
            'first_surname' => $administrator->first_surname,
            'second_surname' => $administrator->second_surname,
            'phone' => $administrator->phone,
            'email' => $administrator->user->email,
        ]);
      return redirect()->route('admin.perfil.index')->with('success', 'Perfil actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
