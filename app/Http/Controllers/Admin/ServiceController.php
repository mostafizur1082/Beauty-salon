<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
         $this->validate($request,[
            'title' => 'required',
            'price' => 'required',
            'image' => 'required',
            'short_des' => 'required',
            'long_des' => 'required',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('service'))
            {
                Storage::disk('public')->makeDirectory('service');
            }

            $blogImage = Image::make($image)->resize(400,260)->save(storage_path('app/public/service').'/'.$imageName);
            

        } else {
            $imageName = "default.png";
        }
        $service = new Service();
        $service->title = $request->title;
        $service->price = $request->price;
        $service->slug = $slug;
        $service->short_des = $request->short_des;
        $service->long_des = $request->long_des;
        $service->image = $imageName;
        $service->save();
        
        return redirect()->route('admin.service.index')->with('message', 'Service Create Successfully');
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
        $service = Service::findOrFail($id);
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
       $this->validate($request,[
            'title' => 'required',
            'image' => 'required',
            'short_des' => 'required',
            'long_des' => 'required',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('service'))
            {
                Storage::disk('public')->makeDirectory('service');
            }

            if(Storage::disk('public')->exists('service/'.$service->image))
            {
                Storage::disk('public')->delete('service/'.$service->image);
            }

            $blogImage = Image::make($image)->resize(400,260)->save(storage_path('app/public/service').'/'.$imageName);
            

        } else {
            $imageName = "default.png";
        }

        $service->title = $request->title;
        $service->slug = $slug;
        $service->short_des = $request->short_des;
        $service->long_des = $request->long_des;
        $service->image = $imageName;
        $service->save();
        
        return redirect()->route('admin.service.index')->with('message', 'Service Create Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if (Storage::disk('public')->exists('service/'.$service->image))
        {
            Storage::disk('public')->delete('service/'.$service->image);
        }
        
        $service->delete();
        return redirect()->back()->with('delete', 'Service Delete Successfully');
    }
}
