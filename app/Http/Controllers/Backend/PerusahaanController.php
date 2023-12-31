<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Port;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use DataTables;

class PerusahaanController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $data = Perusahaan::select('*')->orderBy('created_at', 'desc');

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '
                        <div class="btn-group">
                            <a href="'.route('perusahaan.edit', $row->id).'" class="btn btn-sm btn-primary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Edit">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="'.route('perusahaan.destroy', $row->id).'" method="POST">
                            '.csrf_field().'
                            '.method_field("DELETE").'
                                <button onclick="return confirm(\'Apakah Anda yaking Ingin Menghapusnya?\')" type="submit" class="btn btn-sm btn-danger js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </div>';
                        return $btn;

                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('backend.perusahaan.index');
    }


        /**
    * create
    *
    * @return View
    */
    public function create(): View
    {
        // get data Port
        $port = Port::latest()->get();

        return view('backend.perusahaan.add', compact('port'));
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        // Validasi data
        $validate = $request->validate([
            'nama'      => ['required'],
            'kode'      => ['required'],
            'siup'      => ['required'],
            'npwp'      => ['required'],
            'kontak'    => ['required'],
            'phone'     => ['required'],
            'email'     => ['required'],
            'alamat'    => ['required'],
            'loading'   => ['required'],
            'discharge' => ['required'],
            'freight'   => ['required'],
        ]);

        // insert data ke database
        Perusahaan::create([
            'nama'      => $validate['nama'], 
            'kode'      => $validate['kode'],
            'siup'      => $validate['siup'],
            'npwp'      => $validate['npwp'],
            'kontak'    => $validate['kontak'],
            'phone'     => $validate['phone'],
            'email'     => implode( ',', $validate['email'] ),
            'alamat'    => $validate['alamat'],
            'loading'   => implode( ',', $validate['loading'] ),
            'discharge' => implode( ',', $validate['discharge'] ),
            'freight'   => implode( ',', $validate['freight'] ),
        ]);

        return redirect()->route('perusahaan.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }


    /**
    * edit
    *
    * @param  mixed $id
    * @return View
    */
    public function edit(string $id): View
    {
        $data = Perusahaan::findOrFail($id);
        $port = Port::latest()->get();
        $array = explode(',', $data->email);
        $arrayLoading = explode(',', $data->loading);
        $arrayDischarge = explode(',', $data->discharge);
        $arrayFreight = explode(',', $data->freight);

        $collection = collect(['loading', 'discharge', 'freight']);
        $combined = $collection->combine([$arrayLoading, $arrayDischarge, $arrayFreight]);
        $arrayPort = $combined->all();

        return view('backend.perusahaan.edit', compact('data', 'port', 'array', 'arrayPort'));
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
            'nama'      => ['required'],
            'kode'      => ['required'],
            'siup'      => ['required'],
            'npwp'      => ['required'],
            'kontak'    => ['required'],
            'phone'     => ['required'],
            'email'     => ['required'],
            'alamat'    => ['required'],
            'loading'   => ['required'],
            'discharge' => ['required'],
            'freight'   => ['required'],
        ]);

        $filterEmail        = array_filter($validate['email']);
        $filterLoading      = array_filter($validate['loading']);
        $filterDischarge    = array_filter($validate['discharge']);
        $filterFreight      = array_filter($validate['freight']);

        $perusahaan = Perusahaan::find($id);
 
        $perusahaan->nama       = $validate['nama'];
        $perusahaan->kode       = $validate['kode'];
        $perusahaan->siup       = $validate['siup'];
        $perusahaan->npwp       = $validate['npwp'];
        $perusahaan->kontak     = $validate['kontak'];
        $perusahaan->phone      = $validate['phone'];
        $perusahaan->email      = implode(',', $filterEmail);
        $perusahaan->alamat     = $validate['alamat'];
        $perusahaan->loading    = implode(',', $filterLoading);
        $perusahaan->discharge  = implode(',', $filterDischarge);
        $perusahaan->freight    = implode(',', $filterFreight);
        
        $perusahaan->save();

        return redirect()->route('perusahaan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    /**
    * destroy
    *
    * @param  mixed $post
    * @return void
    */
    public function destroy($id): RedirectResponse
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();
        return redirect()->route('perusahaan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
