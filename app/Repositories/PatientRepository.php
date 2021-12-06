<?php

namespace App\Repositories;

use App\Contracts\PatientRepositoryInterface;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PatientRepository implements PatientRepositoryInterface
{
    private Patient $patients;

    public function __construct(Patient $patients)
    {
        $this->patients = $patients;
    }

    public function index(Request $request)
    {
        return $this->patients->all($request->select);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $newPatient = $this->patients->create([
                'name'     => $request->name,
                'cpf'      => $request->cpf,
                'birthday' => $request->birthday,
                'gender'   => $request->gender
            ]);
            DB::commit();

            return response()->json($newPatient, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Request $request)
    {
        try {
            $patient = $this->patients::findOrFail($request->id);

            DB::beginTransaction();
            $patient->update([
                'name'     => $request->name,
                'cpf'      => $request->cpf,
                'birthday' => $request->birthday,
                'gender'   => $request->gender
            ]);
            DB::commit();

            return response()->json($patient->fresh(), Response::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            $patient = $this->patients::findOrFail($request->id);

            DB::beginTransaction();
            $patient->delete();
            DB::commit();

            return response()->json('Paciente apagado com sucesso!', Response::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
