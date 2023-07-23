<?php

namespace App\Http\Controllers;

use App\Models\dinas;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class DinasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dinas = dinas::orderBy('id', 'desc')->paginate(9);

        $submenus = Submenu::all();
        $menu = 'tentang';
        return view('dinas/dinas', ['dinas' => $dinas, 'submenus' => $submenus, 'menu' => $menu]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $submenus = Submenu::all();
        $menu = 'tentang';
        return view('dinas/create_dinas', ['submenus' => $submenus, 'menu' => $menu]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'nomor_telepon' => ['required', 'string'],

            'logo' => ['required', 'mimes:jpg,png,jpeg,svg'],
        ]);

        $logo = $request->file('logo');
        $name = time() . '_' . $request->judul . '.' . $logo->getClientOriginalExtension();
        Storage::disk('local')->put('public/files/' . $name, file_get_contents($logo));

        dinas::create(
            [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'nomor_telepon' => $request->nomor_telepon,
                'website' => $request->website,
                'logo' => $name,
            ]
        );

        return Redirect::route('dinas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dinas = dinas::whereId($id)->first();
        $submenus = Submenu::all();
        return view('dinas.show_dinas', ['dinas' => $dinas, 'submenus' => $submenus]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dinas = dinas::whereId($id)->first();

        $submenus = Submenu::all();
        $menu = 'tentang';
        return view('dinas.edit_dinas', ['dinas' => $dinas, 'submenus' => $submenus, 'menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'nomor_telepon' => ['required', 'string'],
        ]);

        if ($request->logo !== NULL) {
            $file = $request->file('logo');
            $name = time() . '_' . $request->nama . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/files/' . $name, file_get_contents($file));

            dinas::where('id', $id)->update([
                'nama' => $request->judul,
                'alamat' => $request->isi,
                'nomor_telepon' => $request->nomor_telepon,
                'website' => $request->website,
                'logo' => $name
            ]);
        } else {
            dinas::where('id', $id)->update([
                'nama' => $request->judul,
                'alamat' => $request->isi,
                'nomor_telepon' => $request->nomor_telepon,
            ]);
        }



        return Redirect::route('dinas.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dinas = dinas::whereId($id)->first();
        Storage::delete('public/files/' . $dinas->logo);

        $dinas->delete();

        return Redirect::route('dinas.index');
    }
}
