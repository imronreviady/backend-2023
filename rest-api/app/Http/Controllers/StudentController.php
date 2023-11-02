<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$students = Student::all();
			
        if (!empty($students)) {
			$response = [
				'message' => 'Menampilkan Data Semua Siswa',
				'data' => $students,
			];
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];
			return response()->json($response, 200);
		}
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // create	
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		$student = Student::create($request->all());

		$response = [
			'message' => 'Data Sisa Berhasil Dibuat',
			'data' => $student,
		];

		return response()->json($response, 201);
	}
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);

		if ($student) {
			$response = [
				'message' => 'Get detail siswa',
				'data' => $student
			];
	
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];
			
			return response()->json($response, 404);
		}
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
        $student = Student::find($id);

		if ($student) {
			$response = [
				'message' => 'Data Sisa berhasil diupdate',
				'data' => $student->update($request->all())
			];
	
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

		if ($student) {
			$response = [
				'message' => 'Data Sisa berhasil dihapus',
				'data' => $student->delete()
			];

			return response()->json($response, 200); 
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
    }
}
