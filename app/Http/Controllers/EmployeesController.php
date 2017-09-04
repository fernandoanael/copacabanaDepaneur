<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee as Employee;
use Session;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.employeesIndex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.employeesNew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required|max:50',
            'tel'   =>  'required',
            'address'=> 'required|max:50',
            'salary'=>  'required|numeric',
            'position'=>'required|max:50'
        ]);

        $employee = new Employee();

        $employee->name = $request->name;
        $employee->tel = $request->tel;
        $employee->address = $request->address;
        $employee->salary = $request->salary;
        $employee->position = $request->position;

        $employee->save();
        
        Session::flash('success', $employee->name .' now works for you!');
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('pages.employeesSingle', ['employee' => $employee]);
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
        $employee = Employee::find($id);

        $this->validate($request,[
            'name'  =>  'required|max:50',
            'tel'   =>  'required',
            'address'=> 'required|max:50',
            'salary'=>  'required|numeric',
            'position'=>'required|max:50'
            
        ]);

        $employee->name = $request->name;
        $employee->tel = $request->tel;
        $employee->address = $request->address;
        $employee->salary = $request->salary;
        $employee->position = $request->position;

        $employee->save();

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $name = $employee->name;

        if($employee->delete()){
            Session::flash('success', $name . ' was fired and will now starve to death!');
            return redirect()->route('employees.index');
        }else{
            Session::flash('error', 'Something went Wrong, check tinker');
            return redirect()->route('employees.index');
        }

        return $errors;
    }
}
