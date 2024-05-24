<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function show()
    {
        $product = Product::all();
        return view('product', compact('product'));
    }

    public function list()
    {
        $product = Product::all();
        return view('admin.list', compact('product'));
    }

    public function edit($id)
    {
        $list = Product::find($id);
        return view('admin.edit', compact('list'));
        // dd($list->all());
    }

    public function update(Request $req, $id)
    {
        $list = Product::find($id);

        if ($list) {
            $list->Nama = $req->name;
            $list->Harga = $req->harga;
            $list->stock = $req->stok;
            $list->Berat = $req->berat;
            $list->Gambar = $req->gambar;
            $list->Kondisi = $req->kondisi;
            $list->Deskripsi = $req->deskripsi;
            $list->save();


            return redirect('product_list')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function delete($id)
    {
        $list = Product::find($id);
        $list->delete();
        return redirect()->route('product_list');
    }

    public function form()
    {
        return view('admin.add_product');
    }

    public function add(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'berat' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kondisi' => 'required',
            'deskripsi' => 'required'
        ],
        [
            'name.required' => 'Nama Produk Wajib diisi.',
            'harga.required' => 'Harga Wajib diisi.',
            'stok.required' => 'Stok Wajib diisi.',
            'berat.required' => 'Berat Wajib diisi.',
            'gambar.required' => 'Gambar Wajib diisi.',
            'kondisi.required' => 'Kondisi Wajib diisi.',
            'deskripsi.required' => 'Deskripsi Wajib diisi.'
        ]);


        $gambar = $req->file('gambar');
        $nama_file = uniqid() . '_' . $gambar->getClientOriginalName();
        $path = $gambar->storeAs('public/images', $nama_file);
        $fullPath = storage_path('app/' . $path);

        $destination = public_path('storage/images/' . $nama_file);
        if (!file_exists($destination)) {
            symlink($fullPath, $destination);
        };

        $user_id = auth()->id();
        $product = Product::create([
            'user_id' => $user_id,
            'profil_id' => $user_id,
            'Nama' => $req->name,
            'Harga' => $req->harga,
            'stock' => $req->stok,
            'Berat' => $req->berat,
            'Gambar' => $nama_file,
            'Kondisi' => $req->kondisi,
            'Deskripsi' => $req->deskripsi,
        ]);

        if ($product) {
            return redirect()->route('product_list')
                ->with('success', 'Product created successfully');
        } else {
            return redirect()->route('product_list')
                ->with('error', 'Failed to create product');
        }


    }
}
