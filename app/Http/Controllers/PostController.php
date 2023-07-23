<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Submenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->only(['store', 'edit', 'update', 'destroy',]);
    }

    public function index()
    {
        $berita = Post::where('id_submenu', 9)->latest()->take(4)->get();
        $photos = Post::where('id_submenu', 12)->latest()->take(2)->get();
        $layananPublik = Post::where('id_submenu', 8)->latest()->take(9)->get();
        $visi = Post::where('id_submenu', 1)->get();


        return view('post/index', ['berita' => $berita, 'photos' => $photos, 'visi' => $visi, 'layananPublik' => $layananPublik]);
    }

    public function filterPostBySubmenu($id)
    {
        $posts = Post::where('id_submenu', $id)->paginate(9);
        // $submenus = Submenu::whereId($id)->first();
        $submenus = Submenu::all();
        foreach ($submenus as $submenu) {
            if (request()->segment(3) == $submenu->id and $submenu->menu === 'tentang sangihe') {
                $menu = 'tentang';
            } elseif (request()->segment(3) == $submenu->id and $submenu->menu === 'layanan dan informasi publik') {
                $menu = 'layanan';
            }
        }
        return view('post.filter_post_by_submenu', ['posts' => $posts, 'submenus' => $submenus, 'menu' => $menu]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */


    public function create()
    {
        $submenus = Submenu::all();
        foreach ($submenus as $submenu) {
            if (request()->segment(3) == $submenu->id and $submenu->menu === 'tentang sangihe') {
                $menu = 'tentang';
            } elseif (request()->segment(3) == $submenu->id and $submenu->menu === 'layanan dan informasi publik') {
                $menu = 'layanan';
            }
        }
        return view('post.create_post', ['submenus' => $submenus, 'menu' => $menu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->id_submenu === '10') {
            $request->validate([
                'id_submenu' => ['required', 'string'],
                'judul' => ['required', 'string'],
                'isi' => ['required', 'string'],
                'file' => ['required', 'mimes:pdf'],
            ]);
        } else {
            $request->validate([
                'id_submenu' => ['required', 'string'],
                'judul' => ['required', 'string'],
                'isi' => ['required', 'string'],
                'file' => ['required', 'mimes:jpg,png,jpeg'],
            ]);
        }


        if ($request->file !== NULL) {
            $file = $request->file('file');
            $name = time() . '_' . Auth::user()->id . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/files/' . $name, file_get_contents($file));
        } else {
            $name = NULL;
        }


        Post::create(
            [
                'id_submenu' => $request->id_submenu,
                'id_user' => Auth::id(),
                'judul' => $request->judul,
                'isi' => $request->isi,
                'file' => $name
            ]
        );

        return Redirect::route('posts.filter_post_by_submenu', $request->id_submenu);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $submenus = Submenu::all();
        $post = Post::whereId($id)->first();

        foreach ($submenus as $submenu) {
            if ($post->submenu->menu === 'tentang sangihe') {
                $menu = 'tentang';
            } elseif ($post->submenu->menu === 'layanan dan informasi publik') {
                $menu = 'layanan';
            }
        }

        return view('post.show_post', ['post' => $post, 'submenus' => $submenus, 'menu' => $menu]);
    }

    public function showSinglePost($idSubMenu)
    {
        $submenus = Submenu::all();
        $post = Post::where('id_submenu', $idSubMenu)->first();
        foreach ($submenus as $submenu) {
            if (request()->segment(3) == $submenu->id and $submenu->menu === 'tentang sangihe') {
                $menu = 'tentang';
            } elseif (request()->segment(3) == $submenu->id and $submenu->menu === 'layanan dan informasi publik') {
                $menu = 'layanan';
            }
        }
        return view('post.show_post', ['post' => $post, 'submenus' => $submenus, 'menu' => $menu]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $submenus = Submenu::all();
        $post = Post::whereId($id)->first();
        foreach ($submenus as $submenu) {
            if ($post->submenu->menu === 'tentang sangihe') {
                $menu = 'tentang';
            } elseif ($post->submenu->menu === 'layanan dan informasi publik') {
                $menu = 'layanan';
            }
        }

        return view('post/edit_post', ['post' => $post, 'submenus' => $submenus, 'menu' => $menu]);
    }

    public function editSinglePost($idSubMenu)
    {
        $post = Post::where('id_submenu', $idSubMenu)->first();

        $submenus = Submenu::all();
        foreach ($submenus as $submenu) {
            if (request()->segment(3) == $submenu->id and $submenu->menu === 'tentang sangihe') {
                $menu = 'tentang';
            } elseif (request()->segment(3) == $submenu->id and $submenu->menu === 'layanan dan informasi publik') {
                $menu = 'layanan';
            }
        }
        return view('post/edit_post', ['post' => $post, 'submenus' => $submenus, 'menu' => $menu]);
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
            'judul' => ['required', 'string'],
            'isi' => ['required', 'string'],
        ]);

        if ($request->file !== NULL) {
            $file = $request->file('file');
            $name = time() . '_' . Auth::user()->id . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/files/' . $name, file_get_contents($file));

            Post::where('id', $id)->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'id_user' => Auth::id(),
                'file' => $name
            ]);
        } else {
            Post::where('id', $id)->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'id_user' => Auth::id(),
            ]);
        }



        return Redirect::route('posts.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::whereId($id)->first();
        Storage::delete('public/files/' . $post->file);

        $post->delete();

        return Redirect::route('posts.filter_post_by_submenu', $post->id_submenu);
    }
}
