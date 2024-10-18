<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\FamilyData;
use App\Models\User;

class EmployeeController extends Controller
{
    public function index()
{
    $employees = Employee::all();  // Make sure $employees is initialized here
    return view('employee.index', compact('employees'));
}


    public function store(Request $request)
    {
        // Simpan data karyawan
        $employee = new Employee();
        $employee->id_number = $request->id_number;
        $employee->full_name = $request->full_name;
        $employee->nickname = $request->nickname;
        $employee->contract_date = $request->contract_date;
        $employee->work_date = $request->work_date;
        $employee->status = $request->status;
        $employee->position = $request->position;
        $employee->nuptk = $request->nuptk;
        $employee->gender = $request->gender;
        $employee->place_birth = $request->place_birth;
        $employee->birth_date = $request->birth_date;
        $employee->religion = $request->religion;
        $employee->email = $request->email;
        $employee->hobby = $request->hobby;
        $employee->marital_status = $request->marital_status === 'Married' ? 'menikah' : 'belum';
        $employee->residence_address = $request->residence_address;
        $employee->phone = $request->phone;
        $employee->address_emergency = $request->address_emergency;
        $employee->phone_emergency = $request->phone_emergency;
        $employee->blood_type = $request->blood_type;
        $employee->last_education = $request->last_education;
        $employee->agency = $request->agency;
        $employee->graduation_year = $request->graduation_year;
        $employee->competency_training_place = $request->competency_training_place;
        $employee->organizational_experience = $request->organizational_experience;
        $employee->save();

        // Simpan data keluarga
        $family = new FamilyData();
        $family->id_number = $request->id_number;
        $family->mate_name = $request->mate_name;
        $family->child_name = $request->child_name;
        $family->wedding_date = $request->wedding_date;
        $family->wedding_certificate_number = $request->wedding_certificate_number;
        $family->save();


        // Simpan data user
        $user = new User();
        $user->name = $employee->nickname;
        $user->email = $request->email;
        $user->password = bcrypt($request->id_number); // Gunakan bcrypt untuk password
        $user->save();

        // Redirect ke halaman detail karyawan yang baru saja dibuat
        return redirect()->route('employee.show', $employee->id_number)
            ->with('success', 'Data berhasil disimpan!');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        $keluarga = FamilyData::where('id_number', $employee->id_number)->first();

        return view('employee.show', compact('employee', 'keluarga'));
    }

    public function create()
    {
        return view('employee.create');
    }

    // EmployeeController.php
    public function edit($id_number)
    {
        $employee = Employee::where('id_number', $id_number)->firstOrFail();
        $keluarga = $employee->family_datas; // Mengambil data keluarga yang terkait dengan employee
        return view('employee.edit', compact('employee', 'keluarga'));
    }


    public function update(Request $request, $employeeId)
    {
        $request->validate([
            'id_number' => 'required',
            'full_name' => 'required',
            'email' => 'required|email',
        ]);

        $employee = Employee::findOrFail($employeeId);
        $employee->update([
            'id_number' => $request->id_number,
            'full_name' => $request->full_name,
            'nickname' => $request->nickname,
            'contract_date' => $request->contract_date,
            'work_date' => $request->work_date,
            'status' => $request->status,
            'position' => $request->position,
            'nuptk' => $request->nuptk,
            'gender' => $request->gender,
            'place_birth' => $request->place_birth,
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'email' => $request->email,
            'hobby' => $request->hobby,
            'marital_status' => $request->marital_status === 'Married' ? 'menikah' : 'belum',
            'residence_address' => $request->residence_address,
            'phone' => $request->phone,
            'address_emergency' => $request->address_emergency,
            'phone_emergency' => $request->phone_emergency,
            'blood_type' => $request->blood_type,
            'last_education' => $request->last_education,
            'agency' => $request->agency,
            'graduation_year' => $request->graduation_year,
            'competency_training_place' => $request->competency_training_place,
            'organizational_experience' => $request->organizational_experience,
        ]);


        // Validasi input
        $request->validate([
            'mate_name' => 'required|string|max:255',
            'child_name' => 'nullable|string|max:255',
            'wedding_date' => 'nullable|date',
            'wedding_certificate_number' => 'nullable|string|max:255',
        ]);


        // Ambil data dari request dengan default jika kosong
        $mateName = $request->input('mate_name', '');
        $childName = $request->input('child_name', '');
        $weddingDate = $request->input('wedding_date', '');
        $weddingCertificateNumber = $request->input('wedding_certificate_number', '');

        // Temukan data keluarga yang ada
        $familyData = FamilyData::where('id_number', $employee->id_number)->first();

        // Jika data keluarga sudah ada, perbarui
        if ($familyData) {
            $familyData->update([
                'mate_name' => $mateName,
                'child_name' => $childName,
                'wedding_date' => $weddingDate,
                'wedding_certificate_number' => $weddingCertificateNumber,
            ]);
        } else {
            // Jika data keluarga belum ada, buat yang baru
            FamilyData::create([
                'id_number' => $employee->id_number,
                'mate_name' => $mateName,
                'child_name' => $childName,
                'wedding_date' => $weddingDate,
                'wedding_certificate_number' => $weddingCertificateNumber,
            ]);
        }


        return redirect()->route('employee.show', $employeeId)->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $employee = Employee::where('id_number', $id)->firstOrFail(); // Pastikan `id_number` ada di database

        if ($employee->family_datas) { // Periksa apakah ada data keluarga terkait
            $employee->family_datas->delete(); // Soft delete pada data keluarga
        }

        $employee->delete(); // Soft delete pada karyawan

        return redirect()->route('employee.index')->with('success', 'Karyawan berhasil dihapus.');
    }
    public function archive($id_number)
    {
        // Temukan karyawan berdasarkan id_number
        $employee = Employee::where('id_number', $id_number)->firstOrFail();

        // Pindahkan karyawan ke arsip (soft delete)
        $employee->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('employee.archived')->with('success', 'Data karyawan berhasil dipindahkan ke arsip.');
    }

    public function showArchived()
    {
        // Mengambil data arsip yang sudah dihapus (soft deleted)

        $archivedEmployees = Employee::onlyTrashed()->with('family_datas')->get();

        // Menampilkan view dengan data karyawan yang diarsipkan
        return view('arsip.index', compact('archivedEmployees'));
    }
}
