<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ReportController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth')->only(['store', 'show']);
        $this->middleware('admin')->only(['edit', 'update', 'destroy']);
    }

    public function index()
    {
        $reports = Report::all()->sortDesc();
        return view('report/report', ['reports' => $reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('report/create_report');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required', 'string'],
            'isi' => ['required', 'string'],
            'lokasi' => ['required', 'string'],
            'tgl_kejadian' => ['required'],
            'foto' => ['required', 'mimes:jpg,png,jpeg'],
        ]);

        $foto = $request->file('foto');
        $name = time() . '_' . $request->judul . '.' . $foto->getClientOriginalExtension();
        Storage::disk('local')->put('public/files/' . $name, file_get_contents($foto));

        Report::create(
            [
                'id_user' => Auth::id(),
                'judul' => $request->judul,
                'isi' => $request->isi,
                'lokasi' => $request->lokasi,
                'tgl_kejadian' => $request->tgl_kejadian,
                'foto' => $name,
                'status' => 'Submit'
            ]
        );

        return Redirect::route('reports.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $report = Report::whereId($id)->first();

        return view('report.show_report', ['report' => $report]);
    }

    public function showReportsByUserId()
    {
        $reports = Report::where('id_user', Auth::id())->get()->sortDesc();

        return view('report/report', ['reports' => $reports]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $report = Report::whereId($id)->first();

        return view('report.edit_report', ['report' => $report]);
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
            'status' => ['required', 'string'],
        ]);

        Report::where('id', $id)->update([
            'status' => $request->status,
        ]);

        return Redirect::route('reports.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
