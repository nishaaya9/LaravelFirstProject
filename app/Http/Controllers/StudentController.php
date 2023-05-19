<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = DB::table('student')->get();
        return view('gallery', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestValidation $request)
    {
        $validated = $request->validated();
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        DB::table('student')->insert(
            [
                "name" => $request->name,
                "contact" => $request->contact,
                "image" => $imageName
            ]
        );
        return redirect('admin/student')->with(['success' => "Data successfully inserted"]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('index');
    }
    public function home()
    {
        return view('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students = DB::table('student')->where(['sid' => $id])->first();
        return view('edit', ['students' => $students]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $img = "images/" . $request->hiddenimg;
            if (file_exists(public_path($img))) {
                unlink(public_path($img));
            }
        } else {
            $imageName = $request->hiddenimg;
        }
        $students = [
            "name" => $request->name,
            "contact" => $request->contact,
            "image" => $imageName
        ];
        DB::table('student')->where(['sid' => $id])->update($students);
        return redirect('admin/student')->with(['success' => "Data successfully Updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('student')->where(['sid' => $id])->delete();
        return redirect('admin/student')->with(['danger' => "Data Successfully Deleted"]);
    }
}
