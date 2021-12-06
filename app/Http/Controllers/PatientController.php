<?php

namespace App\Http\Controllers;

use App\Services\PatientService;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private PatientService $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    public function index(Request $request)
    {
        return $this->patientService->index($request);
    }

    public function store(Request $request)
    {
        return $this->patientService->store($request);
    }

    public function update(Request $request)
    {
        return $this->patientService->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->patientService->destroy($request);
    }
}
