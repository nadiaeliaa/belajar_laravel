<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

use function PHPSTORM_META\elementType;

class EmployeeController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Employee::where('name','LIKE','%' .$request->search. '%')->paginate(3);
        }else{
            $data = Employee::paginate(3);
        }

        $data = Employee::paginate(3);
        return view('datapegawai',compact('data'));
    }

    public function tambahpegawai(){
        return view('tambahdata');
    }

    public function insertdata(Request $request){
        //dd($request->all());
        $data = Employee::create($request->all());
        if($request->hasFile('photo')){
            $request->file('photo')->move('employeePhoto/', $request->file('photo')->getClientOriginalName());
            $data->photo = $request->file('photo')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success','data added successfully');
    }

    public function tampilkandata($id){
        $data = Employee::find($id);
        //dd($data);

        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success','data updated successfully');
    }

    public function deletedata($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success','data deleted successfully');
    }
}
