<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
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
            'title' => 'required|unique:galleries',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        // get form image
       $image = $request->file('image');
       $slug = Str::slug($request->title);

       if (isset ($image)) {

        // make unique name for image
        $currentDate = Carbon::now()->toDateString();
        $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

        //check gallery dir is exists
            if (!Storage::disk('public')->exists('gallery'))
            {
                Storage::disk('public')->makeDirectory('gallery');
            }
        // resize image for gallery and upload
            $gallery = Image::make($image)->resize(360,255)->save(storage_path('app/public/gallery').'/'.$imagename);
        }
        else {
            $imagename = "default.png";
        }
        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->slug = $slug;
        $gallery->image = $imagename;
        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('message', 'Category Create Successfully');
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
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit',compact('gallery'));
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
            'title' => 'required|unique:galleries',
            'image' => 'image',
        ]);

        // get form image
       $image = $request->file('image');
       $slug = Str::slug($request->title);
       $gallery = Gallery::find($id);

       if (isset ($image)) {

        // make unique name for image
        $currentDate = Carbon::now()->toDateString();
        $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

        //check gallery dir is exists
            if (!Storage::disk('public')->exists('gallery'))
            {
                Storage::disk('public')->makeDirectory('gallery');
            }

            // delete old image
            if (Storage::disk('public')->exists('gallery/'.$gallery->image))
            {
                Storage::disk('public')->delete('gallery/'.$gallery->image);
            }
            // resize image for gallery and upload
            $gallery = Image::make($image)->resize(360,255)->save(storage_path('app/public/gallery').'/'.$imagename);
            
        }
        else {
            $imagename = "default.png";
        }

        $gallery = Gallery::find($id);
        $gallery->title = $request->title;
        $gallery->slug = $slug;
        $gallery->image = $imagename;
        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if (Storage::disk('public')->exists('gallery/'.$gallery->image))
        {
            Storage::disk('public')->delete('gallery/'.$gallery->image);
        }
        $gallery->delete();
        return redirect()->back()->with('delete', 'Gallery Delete Successfully');
    }
}
