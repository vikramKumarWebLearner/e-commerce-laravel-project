<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    public function index()
    {
        $colors = DB::table('colors')->get();

        return view('admin.colors.index', ['colors' => $colors]);
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'code' => 'required',
        ]);

        if ($validator->fails()) {
            return response([
                'status' => false,
                'message' => $validator->getMessageBag()->toArray(),
            ]);

        }
        $color = DB::insert('insert into colors (name, code,status) values (?, ? , ?)', [$request->name, $request->code, $request->status == true ? '1' : '0']);

        if ($color) {
            return redirect('admin/colors')->with('message', 'Color Added Successfully');
        } else {
            return redirect('admin/color')->with('message', 'Something Quey Problem');
        }
    }

    public function edit(Request $request, int $color_id)
    {

        $color = DB::select('select * from colors where id = ?', [$color_id]);

        return view('admin.colors.edit', compact('color'));

    }

    public function update(Request $request, int $color_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'code' => 'required',
            'status' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response([
                'status' => false,
                'message' => $validator->getMessageBag()->toArray(),
            ]);

        }
        $name = $request->name;
        $code = $request->code;
        $status = $request->status == true ? '1' : '0';
        DB::update('update colors set name = ?,code = ? ,status = ?   where id = ?', [$name, $code, $status, $color_id]);

        return redirect('admin/colors')->with('message', 'Color Update Successfully');

    }

    public function delete($color_id)
    {
        DB::delete('delete from colors  where id = ? ', [$color_id]);

        return redirect('admin/colors')->with('message', 'Color Delete Successfully');

    }
}
