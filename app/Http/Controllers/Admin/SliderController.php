<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'sub_title' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        // get form image
       $image = $request->file('image');
       $slug = Str::slug($request->sub_title);

       if (isset ($image)) {

        // make unique name for image
        $currentDate = Carbon::now()->toDateString();
        $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

        //check slider dir is exists
            if (!Storage::disk('public')->exists('slider'))
            {
                Storage::disk('public')->makeDirectory('slider');
            }
        // resize image for slider and upload
            $slider = Image::make($image)->resize(1920,600)->save(storage_path('app/public/slider').'/'.$imagename);
        }
        else {
            $imagename = "default.png";
        }
        $slider = new Slider();
        $slider->sub_title = $request->sub_title;
        $slider->title = $request->title;
        $slider->body = $request->body;
        $slider->slug = $slug;
        $slider->image = $imagename;
        $slider->save();

        return redirect()->route('admin.slider.index')->with('message', 'Category Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'title' => 'required',
            'sub_title' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        // get form image
       $image = $request->file('image');
       $slug = Str::slug($request->name);
       $slider = Slider::find($id);

       if (isset ($image)) {

        // make unique name for image
        $currentDate = Carbon::now()->toDateString();
        $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

        //check slider dir is exists
            if (!Storage::disk('public')->exists('slider'))
            {
                Storage::disk('public')->makeDirectory('slider');
            }

            // delete old image
            if (Storage::disk('public')->exists('slider/'.$slider->image))
            {
                Storage::disk('public')->delete('slider/'.$slider->image);
            }
            // resize image for slider and upload
            $slider = Image::make($image)->resize(1920,600)->save(storage_path('app/public/slider').'/'.$imagename);
            
        }
        else {
            $imagename = "default.png";
        }

        $slider = Slider::find($id);
        $slider->sub_title = $request->sub_title;
        $slider->title = $request->title;
        $slider->body = $request->body;
        $slider->slug = $slug;
        $slider->image = $imagename;
        $slider->save();

        return redirect()->route('admin.slider.index')->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if (Storage::disk('public')->exists('slider/'.$slider->image))
        {
            Storage::disk('public')->delete('slider/'.$slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('delete', 'slider Delete Successfully');
    }
}
