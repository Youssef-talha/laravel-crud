<?php

namespace App\Http\Controllers;
use App\Models\Employee;

use Illuminate\Http\Request;
use Storage;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom'=>'required',
            'tel'=>'required',
            'email'=>'required',
            'password'=>'required',
            'cv'=>'required'
        ]);

        $fileName =$request->file('cv')->store("/public");
        $employee = new Employee([
            'nom' => $request->get('nom'),
            'tel' => $request->get('tel'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'cv' => $fileName,
        ]);
        $employee->save();
        return redirect('/employees')->with('success', 'Employee saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = Employee::find($id);
        return view('employees.edit', compact('employee'));  
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
        //
        $request->validate([
            'nom'=>'required',
            'tel'=>'required',
            'email'=>'required',
            'password'=>'required',
            'cv'=>'required'
        ]);

        $employee = Employee::find($id);
        $employee->nom =  $request->get('nom');
        $employee->tel = $request->get('tel');
        $employee->email = $request->get('email');
        $employee->password = $request->get('password');
        $employee->cv = $request->get('cv');
        $employee->save();

        return redirect('/employees')->with('success', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee deleted!');
    }

    public function downloadFile($file_name){
        $file = Storage::disk('docs')->get($file_name);
        return (new Response($file, 200));
    }

    public function showAllFiles() {
        $files = Storage::files("docs");

        $imgFiles = array();

        foreach ($files as $key => $val) {
            $val = str_replace("docs/","",$val);
            array_push($imgFiles, $val);
        }

        return view('employees.images', ['imgFiles' => $imgFiles]);
    }

    public function getFile($path)
        {
            /**this will force download your file**/
            $file = Storage::disk('docs')->get($path);
            return response()->download($path);
        }
}
