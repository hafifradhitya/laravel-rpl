<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Auth;
use App\Models\Employee;
use App\Models\Division;

class AppController extends Controller
{
    //
    public function home(){
        $name = "Radhitya Hafif";

        $data = ([
            "name" => $name,
        ]);

        return view("home", $data);
    }
    public function about(){
        return view("about");
    }
    public function data(Request $request){
        $employees = Employee::get();
        $q = NULL;

        if(isset($request->q)){
            $q = $request->q;
            $employees = Employee::where("name","like","%$q%")->get();
        }

        $divisions = Division::orderBy("name","asc")->get();

        $data = ([
            "employees" => $employees,
            "divisions" => $divisions,
            "q" => $q,
        ]);
        return view("data", $data);
    }
    public function tambah_data(){
        $divisions = Division::get();

        $data = ([
            "divisions" => $divisions
        ]);

        return view("tambah_data",$data);
    }

    public function proses_tambah_data(Request $request){
        $number_id = $request->number_id;

        $picture = $request->file("picture");
        $pictureName = $number_id."_".Str::random(25).".".$picture->getClientOriginalExtension();
        $picture->move("./pictures/",$pictureName);

        Employee::create([
            "picture" => $pictureName,
            "number_id" => $number_id,
            "name" => $request->name,
            "gender" => $request->gender,
            "birth_place" => $request->birth_place,
            "birth_date" => $request->birth_date,
            "address" => $request->address,
            "division_id" => $request->division,
        ]);

        session()->flash('message', 'Data Berhasil disimpan');
        return redirect("data");
    }

    public function proses_hapus_data($id){
        Employee::where("id",$id)->delete();
        return redirect("data");
    }

    public function edit_data($id){
        $employee = Employee::where("id",$id)->first();
        $divisions = Division::get();

        if(!$employee){
            abort(404);
        }

        $data = ([
            "employee" => $employee,
            "divisions" => $divisions
        ]);

        return view("edit_data", $data);
    }

    public function proses_edit_data(Request $request){
        // $id = $request->id;
        // $number_id = $request->number_id;
        // $name = $request->name;
        // $gender = $request->gender;
        // $birth_place = $request->birth_place;
        // $address = $request->address;

        // Employee::where("id",$request->id)->update([
        //     "number_id" => $request->number_id,
        //     "name" => $request->name,
        //     "gender" => $request->gender,
        //     "birth_place" => $request->birth_place,
        //     "address" => $request->address,
        //     "division_id" => $request->division,
        // ]);

        $employee = Employee::find($request->id);
        $number_id = $request->number_id;

        $employee->number_id = $number_id;
        $employee->division_id = $request->division;
        $employee->name = $request->name;
        $employee->gender = $request->gender;
        $employee->birth_place = $request->birth_place;
        $employee->birth_date = $request->birth_date;
        $employee->address = $request->address;

        if($request->hasFile("picture")){
            $picture = $request->file("picture");
            $pictureName = $number_id."_".Str::random(25).".".$picture->getClientOriginalExtension();
            $picture->move("./pictures/",$pictureName);

            $employee->picture = $pictureName;
        }

        $employee->save();

        session()->flash('message', 'Data Berhasil disimpan');
        return redirect("data/".$request->id."/edit");
    }

    public function login(){
        if(Auth::check()){
            return redirect("home");
        }
        return view("login");
    }
}
