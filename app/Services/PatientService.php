<?php

namespace App\Services;

use App\Contracts\PatientRepositoryInterface;
use Illuminate\Http\Request;

class PatientService
{
    private PatientRepositoryInterface $patientRepositoryInterface;

    public function __construct(PatientRepositoryInterface $patientRepositoryInterface)
    {
        $this->patientRepositoryInterface = $patientRepositoryInterface;
    }

    public function index(Request $request)
    {
        return $this->patientRepositoryInterface->index($request);
    }

    public function store(Request $request)
    {
        return $this->patientRepositoryInterface->store($request);
    }

    public function update(Request $request)
    {
        return $this->patientRepositoryInterface->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->patientRepositoryInterface->destroy($request);
    }
}