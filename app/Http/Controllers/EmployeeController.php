<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Employee::where(['email' => $request->email, 'password' => $request->password])->first();
        if ($data && !empty($data)) {
            session(['email' => $data->email, 'emp_id' => $data->emp_id, "name" => $data->name]);
            return redirect('/sessioncreate');
        }
    }

    public function sessioncreate(Request $request)
    {
        return view('home', ['employee' => $request->session()->all()]);
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        //echo $data;
        return view('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
