<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return response()
     */
    public function dashboard(): View
    {
        $reports = Report::orderBy('id', 'asc')->paginate(5);

        return view('admin.dashboard',compact('reports'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function index(): View
    {
        $reports = Report::orderBy('id', 'desc')->get(); // Ambil semua data tanpa pagination
        return view('pengumuman', compact('reports'));
    }



    /**
     * Show the form for creating a new resource.
     */
        public function create(): View
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'Nama_Lokasi' => 'required',
        'Latitude' => 'required',
        'Longitude' => 'required',
        'detail' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $input = $request->all();

    // Menambahkan user_id yang sesuai dengan ID pengguna yang sedang login

    $input['user_id'] = Auth::id(); // Mendapatkan ID pengguna yang sedang login

    if ($image = $request->file('image')) {
        $destinationPath = 'images/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['image'] = "$profileImage";
    }

    // Membuat laporan dengan atribut yang sudah ditambahkan user_id
    Report::create($input);

    return redirect()->route('admin.dashboard')
                     ->with('success', 'Report created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(Report $report): View
    {
        return view('admin.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report): View
    {
        return view('admin.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report): RedirectResponse
    {
        $request->validate([

            'status' => 'required|in:diproses,diterima,ditolak,selesai'
        ]);

        $input = $request->all();




        $report->update($input);

        return redirect()->route('admin.dashboard')
                         ->with('success', 'Report updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report): RedirectResponse
    {
        $report->delete();

        return redirect()->route('admin.dashboard')
                         ->with('success', 'Report deleted successfully');
    }


    public function showReports()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        $reports = Report::where('user_id', $user->id) // Hanya laporan milik user
                        ->orderBy('id', 'asc') // Mengurutkan berdasarkan id secara ascending
                        ->paginate(5); // Pagination untuk 5 laporan per halaman

        return view('riwayat', compact('reports'))
                        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


}
