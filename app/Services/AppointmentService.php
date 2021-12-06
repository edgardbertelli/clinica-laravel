<?php

namespace App\Services;

use App\Contracts\AppointmentRepositoryInterface;
use Illuminate\Http\Request;

class AppointmentService
{
    private AppointmentRepositoryInterface $appointmentRepositoryInterface;

    public function __construct(AppointmentRepositoryInterface $appointmentRepositoryInterface)
    {
        $this->appointmentRepositoryInterface = $appointmentRepositoryInterface;
    }

    public function index(Request $request)
    {
        return $this->appointmentRepositoryInterface->index($request);
    }

    public function store(Request $request)
    {
        return $this->appointmentRepositoryInterface->store($request);
    }

    public function update(Request $request)
    {
        return $this->appointmentRepositoryInterface->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->appointmentRepositoryInterface->destroy($request);
    }
}