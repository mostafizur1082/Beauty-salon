<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
            'name' => 'required',
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        // get form image
       $image = $request->file('image');
       $slug = Str::slug($request->name);

       if (isset ($image)) {

        // make unique name for image
        $currentDate = Carbon::now()->toDateString();
        $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

        //check testimonial dir is exists
            if (!Storage::disk('public')->exists('testimonial'))
            {
                Storage::disk('public')->makeDirectory('testimonial');
            }
        // resize image for testimonial and upload
            $testimonial = Image::make($image)->resize(60,60)->save(storage_path('app/public/testimonial').'/'.$imagename);
        }
        else {
            $imagename = "default.png";
        }
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->title = $request->title;
        $testimonial->body = $request->body;
        $testimonial->slug = $slug;
        $testimonial->image = $imagename;
        $testimonial->save();

        return redirect()->route('admin.testimonial.index')->with('message', 'Category Create Successfully');
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
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit',compact('testimonial'));
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
            'name' => 'required',
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        // get form image
       $image = $request->file('image');
       $slug = Str::slug($request->name);
       $testimonial = Testimonial::find($id);

       if (isset ($image)) {

        // make unique name for image
        $currentDate = Carbon::now()->toDateString();
        $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

        //check testimonial dir is exists
            if (!Storage::disk('public')->exists('testimonial'))
            {
                Storage::disk('public')->makeDirectory('testimonial');
            }

            // delete old image
            if (Storage::disk('public')->exists('testimonial/'.$testimonial->image))
            {
                Storage::disk('public')->delete('testimonial/'.$testimonial->image);
            }
            // resize image for testimonial and upload
            $testimonial = Image::make($image)->resize(60,60)->save(storage_path('app/public/testimonial').'/'.$imagename);
            
        }
        else {
            $imagename = "default.png";
        }

        $testimonial = testimonial::find($id);
        $testimonial->sub_title = $request->sub_title;
        $testimonial->title = $request->title;
        $testimonial->body = $request->body;
        $testimonial->slug = $slug;
        $testimonial->image = $imagename;
        $testimonial->save();

        return redirect()->route('admin.testimonial.index')->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        if (Storage::disk('public')->exists('testimonial/'.$testimonial->image))
        {
            Storage::disk('public')->delete('testimonial/'.$testimonial->image);
        }
        $testimonial->delete();
        return redirect()->back()->with('delete', 'testimonial Delete Successfully');
    }
}
