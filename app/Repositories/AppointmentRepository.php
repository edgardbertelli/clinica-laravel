<?php

namespace App\Repositories;

use App\Contracts\AppointmentRepositoryInterface;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    private Appointment $appointments;

    public function __construct(Appointment $appointments)
    {
        $this->appointments = $appointments;
    }

    public function index(Request $request)
    {
        return $this->appointments->all($request->select);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $newAppointment = $this->appointments->create([
                'patient_id' => $request->patient_id,
                'user_id'    => $request->user_id,
                'time'       => $request->time,
            ]);
            DB::commit();

            return response()->json($newAppointment, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Request $request)
    {
        try {
            $appointment = $this->appointments->findOrFail($request->id);
            
            DB::beginTransaction();
            $appointment->update([
                'patient_id' => $request->patient_id,
                'user_id'    => $request->user_id,
                'time'       => $request->time,
            ]);
            DB::commit();

            return response()->json($appointment->fresh(), Response::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            $appointment = $this->appointments->findOrFail($request->id);

            DB::beginTransaction();
            $appointment->delete();
            DB::commit();

            return response()->json(['Consulta apagada com sucesso!'], Response::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}