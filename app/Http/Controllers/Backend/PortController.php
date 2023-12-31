<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Port;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PortController extends Controller
{
        /**
    * index
    *
    * @return View
    */
    public function index(): View
    {
        $data = Port::latest()->get();

        return view('backend.port.index', compact('data'));
    }


    /**
    * create
    *
    * @return View
    */
    public function create(): View
    {
        return view('backend.port.add');
    }


    /**
    * store
    *
    * @param  mixed $request
    * @return RedirectResponse
    */
    public function store(Request $request): RedirectResponse
    {

        $validate = $request->validate([
            'nama'  => ['required'],
        ]);

        $port = new port;
 
        $port->nama = $validate['nama'];
 
        $port->save();

        return redirect()->route('port.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    
    /**
    * edit
    *
    * @param  mixed $id
    * @return View
    */
    public function edit(string $id): View
    {
        $data = Port::findOrFail($id);
        return view('backend.port.edit', compact('data'));
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $id
    * @return RedirectResponse
    */
    public function update(Request $request, $id): RedirectResponse
    {
        $validate = $request->validate([
            'nama'  => ['required'],
        ]);

        $port = Port::find($id);
 
        $port->nama = $validate['nama'];
        
        $port->save();

        return redirect()->route('port.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    /**
    * destroy
    *
    * @param  mixed $post
    * @return void
    */
    public function destroy($id): RedirectResponse
    {
        $port = Port::findOrFail($id);
        $port->delete();
        return redirect()->route('port.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
