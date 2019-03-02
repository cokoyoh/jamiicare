<?php

namespace App\Http\Controllers;

use App\Events\Appointments\AppointmentRaised;
use App\Http\Requests\StoreAppointmentRequest;
use Illuminate\Support\Facades\DB;
use Jamiicare\Appointments\AppointmentsRepository;
use Jamiicare\Models\Appointment;
use Jamiicare\Models\User;

class AppointmentsController extends Controller
{
    protected $appointmentsRepository;


    public function __construct(AppointmentsRepository $appointmentsRepository)
    {
        $this->appointmentsRepository = $appointmentsRepository;
    }


    public function index()
    {
        $appointments = $this->appointmentsRepository->getUserAppointments();

        return view('appointments.index', [
            'appointments' => $appointments
        ]);
    }


    public function create($id = null)
    {
        if ($id) {
            $appointment = $this->appointmentsRepository->getAppointmentsById($id);
        } else {
            $appointment = new Appointment();
        }

        $doctors = ['' => 'Select Doctor'] + User::has('doctor')->pluck('firstname', 'id')->toArray();

        return view('appointments.create', [
            'appointment' => $appointment,
            'doctors' => $doctors
        ]);
    }


    public function store(StoreAppointmentRequest $request, $id = null)
    {
        DB::transaction(function () use ($request, $id)
        {
            $appointment = $this->appointmentsRepository->save($request->validated(), $id);

            if ($appointment) {
                event(new AppointmentRaised($appointment));
            }
        });

        $notification = 'Appointment saved successfully';

        if ($request->wantsJson()) {
            return response([
                'flash' => $notification,
            ], 200);
        }

        return redirect()
            ->route('appointments')
            ->with('flash', $notification);
    }

    public function approve(Appointment $appointment)
    {
        $this->appointmentsRepository->approve($appointment);

        if (request()->wantsJson()) {
            return response([
                'message' => 'Appointment approved',
            ], 200);
        }

        return redirect()
            ->route('appointments')
            ->with('flash', 'Appointment approved');
    }
}
