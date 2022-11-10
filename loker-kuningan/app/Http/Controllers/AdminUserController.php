<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users|min:5|max:255',
            'email' => 'required|email:dns|unique:users',
            'is_admin' => 'required',
            'password' => 'required|min:8|max:255'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registrasi berhasil, silahkan login!!');

        return redirect('/dashboard/users')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'is_admin' => 'required',
            'password' => 'required|min:8|max:255'
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users|min:5|max:255';
        }
        if ($request->email != $user->email) {
            $rules['email'] = 'required|email|unique:users';
        }

        $rules['password'] = bcrypt($rules['password']);

        $validatedData = $request->validate($rules);

        User::where('id', $user->id)->update($validatedData);

        // $request->session()->flash('success', 'Registrasi berhasil, silahkan login!!');

        return redirect('/dashboard/users')->with('success', 'User berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        // delete semua post jika user_id dihapus
        DB::table('posts')->where('user_id', '=', $user->id)->delete();

        // hapus user berdasarkan id
        User::destroy($user->id);

        return redirect('/dashboard/users')->with('success', 'User behasil dihapus !!');
    }
}
