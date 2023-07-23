<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['edit', 'update', 'show']);
        $this->middleware('superadmin')->only(['index', 'create', 'store', 'destroy']);
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('user/user', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user/create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'uid' => ['required',  'string', 'unique:users', 'min:4'],
            'nama' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed'],
            'nomor_hp' => ['required', 'string', 'digits_between:11,13'],
            'jenis_user' => ['required', 'string'],
        ]);

        User::create([
            'uid' => $request->uid,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'nomor_hp' => $request->nomor_hp,
            'jenis_user' => $request->jenis_user
        ]);

        return Redirect::route('users.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::whereId($id)->first();

        return view('user.show_user', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::whereId($id)->first();

        return view('user.edit_user', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'nama' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed'],
            'nomor_hp' => ['required', 'string', 'digits_between:11,13'],
        ]);

        User::where('id', $id)->update([
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'nomor_hp' => $request->nomor_hp,
        ]);

        return Redirect::route('users.edit', $id)->with(['success' => 'Update Berhasil']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::whereId($id)->delete();

        return Redirect::route('users.index', $id);
    }
}
