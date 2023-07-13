<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::latest()->get();
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
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
            'facebook' => 'required',
            'instragram' => 'required',
            'twitter' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        // get form image
       $image = $request->file('image');
       $slug = Str::slug($request->name);

       if (isset ($image)) {

        // make unique name for image
        $currentDate = Carbon::now()->toDateString();
        $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

        //check team dir is exists
            if (!Storage::disk('public')->exists('team'))
            {
                Storage::disk('public')->makeDirectory('team');
            }
        // resize image for team and upload
            $team = Image::make($image)->resize(263,250)->save(storage_path('app/public/team').'/'.$imagename);
        }
        else {
            $imagename = "default.png";
        }
        $team = new Team();
        $team->name = $request->name;
        $team->title = $request->title;
        $team->slug = $slug;
        $team->facebook = $request->facebook;
        $team->instragram = $request->instragram;
        $team->twitter = $request->twitter;
        $team->image = $imagename;
        $team->save();

        return redirect()->route('admin.team.index')->with('message', 'Category Create Successfully');
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
        $team = Team::find($id);
        return view('admin.team.edit',compact('team'));
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
            'facebook' => 'required',
            'instragram' => 'required',
            'twitter' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        // get form image
       $image = $request->file('image');
       $slug = Str::slug($request->name);
       $team = Team::find($id);
       if (isset ($image)) {

        // make unique name for image
        $currentDate = Carbon::now()->toDateString();
        $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

        //check team dir is exists
            if (!Storage::disk('public')->exists('team'))
            {
                Storage::disk('public')->makeDirectory('team');
            }

            if (Storage::disk('public')->exists('team/'.$team->image))
            {
                Storage::disk('public')->delete('team/'.$team->image);
            }

        // resize image for team and upload
            $team = Image::make($image)->resize(263,250)->save(storage_path('app/public/team').'/'.$imagename);
        }
        else {
            $imagename = "default.png";
        }
        $team = new Team();
        $team->name = $request->name;
        $team->title = $request->title;
        $team->slug = $slug;
        $team->facebook = $request->facebook;
        $team->instragram = $request->instragram;
        $team->twitter = $request->twitter;
        $team->image = $imagename;
        $team->save();

        return redirect()->route('admin.team.index')->with('message', 'Category Create Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        if (Storage::disk('public')->exists('team/'.$team->image))
        {
            Storage::disk('public')->delete('team/'.$team->image);
        }
        $team->delete();
        return redirect()->back()->with('delete', 'team Delete Successfully');
    }
}
