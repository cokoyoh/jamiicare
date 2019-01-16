<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use Jamiicare\Appointments\AppointmentsRepository;

class AppointmentsController extends Controller
{
    protected $appointmentsRepository;


    public function __construct(AppointmentsRepository $appointmentsRepository)
    {
        $this->appointmentsRepository = $appointmentsRepository;
    }


    public function store(StoreAppointmentRequest $request, $id = null)
    {
        $this->appointmentsRepository->save($request->validated(), $id);

        $notification = 'Appointment saved successfully';

        if ($request->wantsJson()) {
            return response([
                'flash' => $notification,
            ], 200);
        }

        return back()->with('flash', $notification);
    }
}
