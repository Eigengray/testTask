<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class EmployerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        return DB::table('employers')->orderBy('id', 'desc')->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:employers,email'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'age' => ['integer', 'min:0'],
            'seniority' => ['integer', 'min:0'],
            'average_salary' => ['min:0'],
        ]);

        if (csrf_token() != $request->input('_token'))
        {
            return response()->json('Error: CSRF token mismatch.');
        }

        if ($validator->fails()) {
            return response()->json('Error: ' . $validator->errors());
        } else {
            $employer = new Employer();
            $employer->email = $request->input('email');
            $employer->first_name = preg_replace('/[^A-Za-zА-яа-я0-9\-]/', '', trim($request->input('firstName')));
            $employer->second_name = preg_replace('/[^A-Za-zА-яа-я0-9\-]/', '', trim($request->input('secondName')));
            $employer->last_name = preg_replace('/[^A-Za-zА-яа-я0-9\-]/', '', trim($request->input('lastName')));
            $employer->fio = $employer->first_name . ' ' . $employer->second_name;

            if ($employer->last_name){
                $employer->fio .= ' ' . $employer->last_name;
            }

            $employer->age = $request->input('age');
            $employer->seniority = $request->input('seniority');

            if ($request->file('photo')) {
                $file = $request->file('photo');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $employer->photo = $filename;
            }
            $employer->average_salary = $request->input('average_salary');
            try {
                $employer->save();
            } catch (\Exception $e) {
                return response()->json('Error: ' . $e->getMessage());
            }
        }

        return response()->json('Сотрудник успешно добавлен');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return Employer::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $employer = Employer::find($id);

        if ($employer) {
            $filename = public_path("images/{$employer->photo}");
            if (File::exists($filename)) {
                File::delete($filename);
            }
            $employer->delete();
            return response()->json('Сотрудник успешно удален');
        } else {
            return response()->json('Error: Сотрудник не найден');
        }
    }
}
