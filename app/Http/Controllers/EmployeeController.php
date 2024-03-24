<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Religion;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\elementType;
class EmployeeController extends Controller
{
    public function index(){
        //mengatur pagination dan menampilkan data mahasiswa
        $data = Employee::orderBy('nim','desc')->paginate(6);

        Session::put('url_page', request()->fullUrl());
        return view('datapegawai',compact('data'));
    }
        //fungsi search mahasiswa berdasarkan nama
    public function search(Request $request){
        if($request->has('search')) {
            $data = Employee::where('name','LIKE','%'.$request->search.'%')->paginate(6);
            Session::put('url_page', request()->fullUrl());

        }
        else {
            //menampilkan data mahasiswa dengan 6 data per halaman
            $data = Employee::paginate(6);
            Session::put('url_page', request()->fullUrl());
        }
        return view('datapegawai',['data' => $data]);
    }

    public function tambahpegawai(){
        //menambahkan data mahasiswa dengan mengarahkan ke halaman tambahdata
        $dataagama = Religion::all();
        return view('tambahdata', compact('dataagama'));
    }

    public function insertdata(Request $request){
        //validasi data yang diinputkan
        $this->validate($request,[
            'name' => 'required|min:5|max:50',
            'mobile' => 'required|min:10|max:15',
        ]);

        //menambahkan data mahasiswa dan settingan upload foto serta mengarahkan ke halaman data mahasiswa
        $data = Employee::create($request->all());
        if($request->hasFile('photo')){
            $request->file('photo')->move('employeePhoto/', $request->file('photo')->getClientOriginalName());
            $data->photo = $request->file('photo')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success','data added successfully');
    }

    public function tampilkandata($id){
        //menampilkan data mahasiswa dengan parameter id
        $data = Employee::find($id);
        //dd($data);

        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        //mengupdate data dan kembali diarahkab ke halaman data mahasiswa
        $data = Employee::find($id);
        $data->update($request->all());
        if(session('url_page')){
            return redirect(session('url_page'))->with('success','data updated successfully');
        }
        return redirect()->route('pegawai')->with('success','data updated successfully');
    }

    public function deletedata($id){
        //menghapus data dan kembali diarahkan ke halaman data mahasiswa
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success','data deleted successfully');
    }

    public function exportpdf(){
        $data = Employee::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datapegawai-pdf');
        return $pdf->download('data.pdf');
    }

    public function exportexcel(){
        return Excel::download(new EmployeeExport, 'datapegawai.xlsx');
    }

    public function importexcel(Request $request){
        $data = $request->file('file');

        $filename = $data->getClientOriginalName();
        $data->move('employeeData', $filename);

        Excel::import(new EmployeeImport, \public_path('/employeeData/'.$filename));
        return \redirect()->back();
    }

    
}