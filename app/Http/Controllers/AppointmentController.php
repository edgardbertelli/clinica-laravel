<?php

namespace App\Http\Controllers;

use App\Services\AppointmentService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    private AppointmentService $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function index(Request $request)
    {
        return $this->appointmentService->index($request);
    }

    public function store(Request $request)
    {
        return $this->appointmentService->store($request);
    }

    public function update(Request $request)
    {
        return $this->appointmentService->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->appointmentService->destroy($request);
    }
}
