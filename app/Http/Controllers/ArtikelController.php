<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artikel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ArtikelController extends Controller
{
    public function landing_page(){

        $artikel_bawah = DB::table('artikel')
            ->join('users', 'artikel.user_id', '=', 'users.id')
            ->select('artikel.*', 'users.name as penerbit')
            ->orderBy('artikel.created_at', 'desc')
            ->limit(3)
            ->get();

        return view('front.landing_page', compact('artikel_bawah'));
    }
    public function front_artikel()
    {
        $artikel = DB::table('artikel')
            ->join('users', 'artikel.user_id', '=', 'users.id')
            ->select('artikel.*', 'users.name as penerbit')
            ->orderBy('artikel.created_at', 'desc')
            ->paginate(4);

        $artikel_baru = DB::table('artikel')
            ->join('users', 'artikel.user_id', '=', 'users.id')
            ->select('artikel.*', 'users.name as penerbit')
            ->orderBy('artikel.created_at', 'desc')
            ->limit(5)
            ->get();

        return view('front.article', compact('artikel', 'artikel_baru'));
    }

    public function form_artikel($id = null)
    {
        $artikel = null;
        if ($id) {
            $artikel = Artikel::findOrFail($id);
        }

        return view('dashboard.form_artikel', compact('artikel'));
    }

    public function show_table_artikel(Request $request)
    {
        $query = DB::table('artikel')
            ->join('users', 'artikel.user_id', '=', 'users.id')
            ->select('artikel.*', 'users.name as penerbit');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('artikel.title', 'like', "%{$search}%")
                ->orWhere('users.name', 'like', "%{$search}%");
            });
        }

        $artikel = $query->orderBy('artikel.created_at', 'desc')
                        ->paginate(10)
                        ->appends($request->query());

        return view('dashboard.artikel', compact('artikel'));
    }

    public function daftar_artikel(Request $request)
    {
        try {
            $validated = $request->validate([
                'title'   => 'required|string|max:255',
                'content' => 'nullable|string',
                'pict'    => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                'id'      => 'nullable|exists:artikel,id', // kalau update
            ]);

            // siapkan data
            $data = [
                'title'   => $validated['title'],
                'content' => $validated['content'] ?? null,
                'show'    => 'tampil',
                'user_id' => Auth::id(),
            ];

            // handle upload gambar
            if ($request->hasFile('pict')) {
                $file      = $request->file('pict');
                $filename  = time() . '_' . $file->getClientOriginalName();

                $file->move(public_path('storage/artikel'), $filename);
                $data['pict'] = 'storage/artikel/' . $filename;
            }

            // kalau ada id → update, kalau tidak → create baru
            if ($request->filled('id')) {
                Artikel::where('id', $request->id)->update($data);
            } else {
                Artikel::create($data);
            }

            return redirect()->route('dashboard.artikel')->with('success', 'Artikel berhasil disimpan!');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }


    public function hapus_artikel($id)
    {
        $artikel = Artikel::findOrFail($id);

        // kalau ada gambar, hapus juga dari storage
        if ($artikel->pict && \Storage::disk('public')->exists($artikel->pict)) {
            \Storage::disk('public')->delete($artikel->pict);
        }

        $artikel->delete();

        return redirect()->route('dashboard.artikel')
            ->with('success', 'Artikel berhasil dihapus!');
    }

    public function detail_artikel($id)
    {
        $detail_artikel = DB::table('artikel')
            ->join('users', 'artikel.user_id', '=', 'users.id')
            ->select('artikel.*', 'users.name as penerbit','users.role')
            ->where('artikel.id', $id)
            ->first();

        $artikel_baru = DB::table('artikel')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get(); // contoh sidebar artikel baru

        return view('front.artikel_detail', compact('detail_artikel', 'artikel_baru'));
    }

    public function form_daftar()
    {
        return view('front.form_daftar');
    }

    

}
