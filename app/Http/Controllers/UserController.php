<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $users = User::paginate(10);
    return view('user.index', compact('users'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'password' => 'required|max:10',
            'role' => 'required'
        ], [
            'name.required' => 'Nama harus diisi!',
            'email.required' => 'email harus diisi!',
            'password.required' => 'password harus diisi!',
            'name.max' => 'Nama obat maksimal 100 karakter!',
            'password.min' => 'password minimal 8 karakter!',
            'role.required' => 'role harus diisi!',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role'  => $request->role
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambah Data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'password' => 'required|max:8',
            'role' => 'required'
        ], [
            'name.required' => 'Nama harus diisi!',
            'email.required' => 'email harus diisi!',
            'password.required' => 'password harus diisi!',
            'name.max' => 'Nama obat maksimal 100 karakter!',
            'password.min' => 'password minimal 8 karakter!',
            'role.required' => 'role harus diisi!',
        ]);

        // ambil data sebelumnya 
        $userBefore = User::where('id', $id)->first();
        
        $proses = $userBefore->update([
                'name' => $request->name,
                'email' => $request->email,
                'role'  => $request->role
            ]);

        if ($proses){
            return redirect()->route('users.index')->with('success', 'Berhasil mengubah data Pengguna!');
        } else {
        return redirect()->back()->with('failed', 'Gagal mengubah data pengguna!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
{
    $userDeleted = $user->delete();

    if ($userDeleted) {
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    } else {
        return redirect()->back()->with('failed', 'Gagal menghapus user!');
    }
}

public function loginAuth(Request $request)
{
    $request->validate([
        'email' => 'required|email:dns',
        'password' => 'required',
    ]);

    $user = $request->only(['email', 'password']);
    if (Auth::attempt($user)) {
        return redirect()->route('home.page');
    } else {
        return redirect()->back()->with('failed', 'Proses login gagal, silahkan coba kembali dengan data yang benar!');
    }
}


}
