<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Exports\MemberExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('id', 'DESC')->paginate(5);
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'noTelp' => 'required|numeric',
            'alamat' => 'required',
        ]);

        Member::create($request->All());
        return redirect('members')->with('status', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $members = Member::findOrFail($id);
        return view('members.show', compact('members'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $members = Member::findOrFail($id);
        return view('members.edit', compact('members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'noTelp' => 'required|numeric',
            'alamat' => 'required',
        ]);

        $members = Member::findOrFail($id);
        $members->update($request->all());
        return redirect('members')->with('status', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $members = Member::findOrFail($id);
        $members->delete();
        return redirect('members')->with('status', 'Data Berhasil Dihapus!');
    }

    // serach
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $members = Member::where('nama', $cari)->paginate(5);
        return view('/members.index', compact('members'));
    }

    // menampilkan data yang sudah dihapus
    public function trash()
    {
        $members = Member::onlyTrashed('id', 'DESC')->paginate(5);
        return view('/members/trash', compact('members'));
    }

    // restore data yang dihapus
    public function restore($id)
    {
        $members = Member::onlyTrashed()->where('id',$id);
        $members->restore();
        return redirect('/members/trash');
    }

    // restore semua data guru yang sudah dihapus
    public function restore_all()
    {
        $members = Member::onlyTrashed();
        $members->restore();
        return redirect('/members/trash');
    }

    // hapus permanen
    public function delete($id)
    {
        // hapus permanen data
        $members = Member::onlyTrashed()->where('id',$id);
        $members->forceDelete();
        return redirect('/members/trash');
    }

    public function delete_all()
    {
        // hapus permanen semua data yang sudah dihapus
        $members = Member::onlyTrashed();
        $members->forceDelete();

        return redirect('/members/trash');
    }

    public function export_excel()
	{
		return Excel::download(new MemberExport, 'Data Member'. date('d M Y'). '.xlsx');
	}
}
