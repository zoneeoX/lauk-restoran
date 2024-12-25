<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostMenuController extends Controller
{
    public function tambahMakanan(Request $request)
{
    $data_makanan = $request->validate([
        "title" => "required",
        "body" => "required",
        "harga" => "required|numeric",
        "photo" => "required|mimes:jpg,png,pdf|max:2048",
    ]);

    $data_makanan['title'] = strip_tags($data_makanan['title']);
    $data_makanan['body'] = strip_tags($data_makanan['body']);
    $data_makanan['harga'] = strip_tags($data_makanan['harga']);
    $data_makanan['user_id'] = Auth::id();

    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $path = $image->store('uploads', 'public');
        $data_makanan['photo'] = $path;
    }

    Menu::create($data_makanan);

    return redirect('/tambah-menu')->with('success', 'Makanan telah ditambahkan!');
}

public function showTambahMenu() {
    $user = auth()->user();

    $menuList = $user->menuList;

    return view('tambah-menu', compact('menuList'));
}

public function showMenuPesan() {
    $menuList = Menu::all();

    return view('menu-pesan', compact('menuList'));
}

public function displayEditMakanan(Menu $makanan){
    if(auth()->user()->id !== $makanan['user_id']){
        return redirect('/');
    }

    return view('edit-makanan', ['makanan' => $makanan]);
}

public function editMakanan(Menu $makanan, Request $request)
{
    if (auth()->user()->id !== $makanan['user_id']) {
        return redirect('/');
    }

    $data_makanan = $request->validate([
        'title' => 'required',
        'body' => 'required',
        'harga' => 'required',
        'photo' => 'nullable|mimes:jpg,png,pdf|max:2048',
    ]);

    $data_makanan['title'] = strip_tags($data_makanan['title']);
    $data_makanan['body'] = strip_tags($data_makanan['body']);
    $data_makanan['harga'] = strip_tags($data_makanan['harga']);

    if ($request->hasFile('photo')) {
        if ($makanan->photo && Storage::disk('public')->exists($makanan->photo)) {
            Storage::disk('public')->delete($makanan->photo);
        }

        $image = $request->file('photo');
        $path = $image->store('uploads', 'public');
        $data_makanan['photo'] = $path;
    }

    $makanan->update($data_makanan);

    return redirect('/tambah-menu')->with('success', 'Menu updated successfully!');
}


public function deleteMakanan(Menu $makanan)
{
    if (auth()->user()->id === $makanan['user_id']) {
        if ($makanan->photo && Storage::disk('public')->exists($makanan->photo)) {
            Storage::disk('public')->delete($makanan->photo);
        }

        $makanan->delete();
    }

    return redirect('/tambah-menu');
}



}