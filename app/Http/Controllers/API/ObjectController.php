<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Objects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function addObject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'employee_id' => 'required|string|exists:employees,id',
            'client_name' => 'required|string|max:50',
            'client_number' => 'required|numeric|digits:10',
            'address' => 'required|string|max:255',
            'postcode' => 'required|string|max:6',
            'city_id' => 'nullable|string|exists:cities,id',
            'key_number' => 'required|string',
            'start_date' => 'required',
            'phone_number' => 'required|numeric|digits:10',
            'google_map_url' => 'required|string',
            'implementaion_time' => 'required',
            'from_time' => 'required',
            'rotation_type' => 'required|integer',
            'pdf' => 'nullable',
            'contact_person_name' => 'required|string|max:50',
            'contact_person_phone_number' => 'required|numeric|digits:10',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $object = new Objects;
        $object->user_id = auth()->user()->id;
        $object->employee_id = $request->employee_id;
        $object->client_name = $request->client_name;
        $object->client_number = $request->client_number;
        $object->address = $request->address;
        $object->postcode = $request->postcode;
        $object->city_id = $request->city_id;
        $object->key_number = $request->key_number;
        $object->start_date = $request->start_date;
        $object->phone_number = $request->phone_number;
        $object->google_map_url = $request->google_map_url;
        $object->implementaion_time = $request->implementaion_time;
        $object->from_time = $request->from_time;
        $object->rotation_type = $request->rotation_type;
        $object->pdf = $request->pdf;
        $object->contact_person_name = $request->contact_person_name;
        $object->contact_person_phone_number = $request->contact_person_phone_number;
        $object->status = 1;
        $object->save();

        return response()->json(['Objects created successfully']);

    }

    public function editObject(Request $request){

        $validator = Validator::make($request->all(), [
            'employee_id' => 'required|string|exists:employees,id',
            'client_name' => 'required|string|max:50',
            'client_number' => 'required|numeric|digits:10',
            'address' => 'required|string|max:255',
            'postcode' => 'required|string|max:6',
            'city_id' => 'nullable|string|exists:cities,id',
            'key_number' => 'required|string',
            'start_date' => 'required',
            'phone_number' => 'required|numeric|digits:10',
            'google_map_url' => 'nullable|string',
            'implementaion_time' => 'required',
            'from_time' => 'required',
            'rotation_type' => 'required|integer',
            'pdf' => 'nullable',
            'contact_person_name' => 'required|string|max:50',
            'contact_person_phone_number' => 'required|numeric|digits:10',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $object = Objects::find($request->id);
        $object->employee_id = $request->employee_id;
        $object->client_name = $request->client_name;
        $object->client_number = $request->client_number;
        $object->address = $request->address;
        $object->postcode = $request->postcode;
        $object->city_id = $request->city_id;
        $object->key_number = $request->key_number;
        $object->start_date = $request->start_date;
        $object->phone_number = $request->phone_number;
        $object->google_map_url = $request->google_map_url;
        $object->implementaion_time = $request->implementaion_time;
        $object->from_time = $request->from_time;
        $object->rotation_type = $request->rotation_type;
        $object->pdf = $request->pdf;
        $object->contact_person_name = $request->contact_person_name;
        $object->contact_person_phone_number = $request->contact_person_phone_number;
        $object->status = $request->status;
        $object->save();
        if (!$object) {
            return response()->json(['message' => 'Something Went wrong', 'data' => null],500);

        }
        return response()->json(['message' => 'Object Update Successfully', 'data' => $object],400);
    }

}
