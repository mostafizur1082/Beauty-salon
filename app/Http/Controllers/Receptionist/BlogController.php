<?php

namespace App\Http\Controllers\Receptionist;

// use App\Http\Controllers\Auth\Auth;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('receptionist.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('receptionist.blog.create',compact('categories','tags'));
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
            'image' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);
        $image = $request->file('image');
        $slug = Str::slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('blog'))
            {
                Storage::disk('public')->makeDirectory('blog');
            }

            $blogImage = Image::make($image)->resize(800,440)->save(storage_path('app/public/blog').'/'.$imageName);
            

        } else {
            $imageName = "default.png";
        }
        $blog = new Blog();
        $blog->user_id = Auth::id();
        $blog->title = $request->title;
        $blog->slug = $slug;
        $blog->image = $imageName;
        $blog->body = $request->body;
        if(isset($request->status))
        {
            $blog->status = true;
        }else {
            $blog->status = false;
        }
        $blog->is_approved = true;
        $blog->save();

        $blog->categories()->sync($request->categories);
        $blog->tags()->sync($request->tags);

        return redirect()->route('receptionist.blog.index')->with('message', 'Blog Create Successfully');
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
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('receptionist.blog.edit',compact('blog','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'image',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);
        $image = $request->file('image');
        $slug = Str::slug($request->title);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('blog'))
            {
                Storage::disk('public')->makeDirectory('blog');
            }
            if(Storage::disk('public')->exists('blog/'.$blog->image))
            {
                Storage::disk('public')->delete('blog/'.$blog->image);
            }

            $blogImage = Image::make($image)->resize(800,440)->save(storage_path('app/public/blog').'/'.$imageName);
            

        } else {
            $imageName = "default.png";
        }

        $blog->user_id = Auth::id();
        $blog->title = $request->title;
        $blog->slug = $slug;
        $blog->image = $imageName;
        $blog->body = $request->body;
        if(isset($request->status))
        {
            $blog->status = true;
        }else {
            $blog->status = false;
        }
        $blog->is_approved = true;
        $blog->save();

        $blog->categories()->attach($request->categories);
        $blog->tags()->sync($request->tags);

        return redirect()->route('receptionist.blog.index')->with('message', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog= Blog::findOrFail($id);
       if (Storage::disk('public')->exists('blog/'.$blog->image))
        {
            Storage::disk('public')->delete('blog/'.$blog->image);
        }
        $blog->categories()->detach();
        $blog->tags()->detach();
        $blog->delete();
        return redirect()->back()->with('delete', 'Blog Delete Successfully');
    }

    
}
