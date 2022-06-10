<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\AppointmentsSubjects;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Model;

class AppointmentsController extends Controller
{


    /**
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        //$appointmentSubject = AppointmentsSubjects::find(1)->appointmentSubject;

        $appointments = Appointments::all();

        return response()->json([
            'success' => true,
            'data' => $appointments
        ]);
    }

    /**
     * @param Appointments $appointments
     * @return JsonResponse
     */
    public  function show(Appointments $appointments)
    {
        return response()->json($appointments);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'dateHour' => 'required|dateTime',
            'notes' => 'required',
            'comments' => 'nullable',
            'appointmentsSubjects_id' => 'required'
        ]);

        $appointments = Appointments::create([
            'dateHour' => $request->dateHour,
            'notes' => $request->notes,
            'comments' => $request->comments,
            'appointmentsSubjects' => $request->appointmentsSubjects
        ]);

        return response()->json($appointments);

    }

    /**
     * @param Request $request
     * @param Appointments $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, Appointments $id)
    {
        $this->validate($request, [
            'dateHour' => 'required|dateTime',
            'notes' => 'required',
            'comments' => 'nullable',
            'g5e1D_appointments_subjects_id' => 'required'
        ]);

        $appointments = Appointments::where('id', $id)->update([
            'dateHour' => $request->dateHour,
            'notes' => $request->notes,
            'comments' => $request->comments,
            'g5e1D_appointments_subjects' => $request->appointmentsSubjects
        ]);

        return response()->json($appointments);
    }

    /**
     * @param Appointments $appointments
     * @return JsonResponse
     */
    public function destroy(Appointments $appointments)
    {
        $appointments->delete();

        return response()->json();
    }

    public function archive(Appointments $appointments)
    {
        $appointments = Appointments::find($appointments);

        $appointments->archive = true;


    }



}
