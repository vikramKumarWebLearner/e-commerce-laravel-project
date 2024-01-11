<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create(Request $request)
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string|max:800',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg',
            'status' => 'nullable',
        ]);

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/slider/', $filename);

            $imageData = 'uploads/slider/'.$filename;
        }

        $status = $request->status == true ? '1' : '0';

        DB::table('sliders')->insert([
            'title' => $request->title,
            'desc' => $request->desc,
            'image' => $imageData,
            'status' => $status,
        ]);

        return redirect('/admin/sliders')->with(['message' => 'Sliders Added Successfully']);
    }

    public function edit(int $slider_id)
    {
        $slider = DB::table('sliders')->where('id', $slider_id)->first();

        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, int $slider_id)
    {
        $slider = DB::table('sliders')->where('id', $slider_id)->first();

        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string|max:800',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg',
            'status' => 'nullable',
        ]);

        if ($request->hasfile('image')) {

            $destination = $slider->image;

            if (File::exists($destination)) {
                file::delete($destination);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/slider/', $filename);

            $imageData = 'uploads/slider/'.$filename;
        }

        $status = $request->status == true ? '1' : '0';

        DB::table('sliders')->where('id', $slider_id)->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'image' => $imageData,
            'status' => $status,
        ]);

        return redirect('/admin/sliders')->with(['message' => 'Sliders Updated Successfully']);
    }

    public function delete(int $slider_id)
    {
        $slider = Slider::find($slider_id);

        $slider->delete();

        return redirect('/admin/sliders')->with(['message' => 'Sliders Delete Successfully']);
    }
}
