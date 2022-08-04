<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SubjectController extends Controller
{
    public function index()
    {
        return view('admin.subject.index');
    }

    public function index_create()
    {
        return view('admin.subject.create');
    }

    public function create(Request $request)
    {
        if ($request->subject_name['uz'] == null){
            return response()->json([
                "success" => false,
                "message" => __('Admin.validation_subject_name')
            ]);
        }

        if ($request->subject_name['ru'] == null){
            return response()->json([
                "success" => false,
                "message" => __('Admin.validation_subject_name')
            ]);
        }

        if ($request->subject_name['en'] == null){
            return response()->json([
                "success" => false,
                "message" => __('Admin.validation_subject_name')
            ]);
        }

        $data = new Subject();
        $data->fill($request->all());
        if ($data->save()){
            return response()->json([
                "success" => true,
                "message" => __('Admin.saved')
            ]);
        }
    }

    public function delete($subject_id)
    {
        Subject::find($subject_id)->delete();
        return response()->json([
            "success" => true,
            "message" => __('Admin.deleted')
        ]);
    }

    public function edit($subject_id)
    {
        return Subject::find($subject_id);
    }

    public function update(Request $request)
    {
        $subject = Subject::find($request->subject_id);
        $input = $request->all();
        unset($input['subject_id']);

        $subject->fill($input);
        if ($subject->save()){
            return response()->json([
                "success" => true,
                "message" => __('Admin.updated')
            ]);
        }
    }

    public function datatable(Request $request)
    {
        $model = Subject::query();
        return Datatables::eloquent($model)
            ->addIndexColumn()
            ->addColumn('id', function ($subject){
                return $subject->subject_id;
            })
            ->addColumn('name', function ($subject){
                return $subject->subject_name[app()->getLocale()];
            })
            ->addColumn('route', function ($subject){
                return $subject->subject_route;
            })
            ->addColumn('action',function ($subject){
                if (Auth::user()->user_name == 'admin') {
                    return "<a onclick='updated($subject->subject_id)' data-toggle=\"modal\" data-target=\"#update\"><i class=\"icon-pencil\"></i></a><a onclick=\"deleted($subject->subject_id)\"><i class=\"icon-trash\"></i></a>";
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function select()
    {
        return Subject::select('subject_id', 'subject_name')->get();
    }
}
