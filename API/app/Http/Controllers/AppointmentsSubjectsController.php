<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\AppointmentsSubjects;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Model;


class AppointmentsSubjectsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $appointmentsSubjects = AppointmentsSubjects::all();

        return response()->json($appointmentsSubjects);
    }

    /**
     * @param AppointmentsSubjects $appointmentsSubjects
     * @return JsonResponse
     */
    public function show(AppointmentsSubjects $appointmentsSubjects)
    {
        return response()->json($appointmentsSubjects);
    }


    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $appointmentSubject = AppointmentsSubjects::create([
            'name' => $request->name
        ]);

        return response()->json($appointmentSubject, 201);
    }


    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $appointmentsSubjects = AppointmentsSubjects::where('id', $id)->update([
            'name' => $request->name
        ]);

        return response()->json($appointmentsSubjects);

    }

    /**
     * @param AppointmentsSubjects $appointmentsSubjects
     * @return JsonResponse
     */
    public function destroy(AppointmentsSubjects $appointmentsSubjects)
    {
        $appointmentsSubjects->delete();

        return response()->json();
    }



}
