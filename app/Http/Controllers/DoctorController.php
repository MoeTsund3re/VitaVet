<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function getByDepartment(Request $request)
    {
        $department = $request->get('department');
        $doctors = Doctor::where('department', $department)
            ->where('is_active', true)
            ->select('id', 'name', 'specialization')
            ->get();
        return response()->json($doctors);
    }
}
