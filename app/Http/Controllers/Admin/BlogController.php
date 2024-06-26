<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //all method
    public function all()
    {
        // Retrieve all blog posts
        $items = Blog::orderBy('id', 'desc')->paginate(20);

        return view('pages.dashboard.admin.blog.all', compact('items'));
    }

    //create method
    public function create()
    {
        return view('pages.dashboard.admin.blog.create');
    }

    //edit method
    public function edit($id)
    {
        $item = Blog::find($id);
        return view('pages.dashboard.admin.blog.edit', compact('item'));
    }

    //store method
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tags' => 'nullable|string|max:255',
        ]);

        //generate slug
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->input('title'));

        // Create the blog post
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->slug = $slug;
        $blog->description = $request->input('description');
        $blog->tags = $request->input('tags');

        // Handle thumbnail upload if provided
        if ($request->hasFile('thumb')) {
            $image = $request->file('thumb');

            // Validate and store the image
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/blog'), $imageName);

            // Update the 'thumb' field with the image path
            $blog->thumb = 'img/blog/' . $imageName;
        }

        $blog->save();

        //return success message with tostr
        toastr()->success('Blog Created successfully', ['timeOut' => 5000, 'closeButton' => true]);
        return redirect()->route('admin.blog.all');
    }

    //update method
    public function update(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'id' => 'required|exists:blogs,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tags' => 'nullable|string|max:255',
        ]);

        // Find the blog post by ID
        $blog = Blog::findOrFail($request->input('id'));

        if ($blog->title !== $request->input('title')) {
            //generate slug
            $slug = SlugService::createSlug(Blog::class, 'slug', $request->input('title'));

            $blog->update([
                'slug' => $slug,
            ]);
        }

        // Update other fields
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->tags = $request->input('tags');

        // Handle thumbnail upload if provided
        if ($request->hasFile('thumb')) {
            $image = $request->file('thumb');

            // Validate and store the image
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/blog'), $imageName);

            // Update the 'thumb' field with the image path
            $blog->thumb = 'img/blog/' . $imageName;
        }

        // Save the updated blog post
        $blog->save();

        //return success message with tostr
        toastr()->success('Blog Updated successfully', ['timeOut' => 5000, 'closeButton' => true]);
        return redirect()->route('admin.blog.edit', ['id' => $blog->id]);
    }

    //delete method
    public function delete($id)
    {
        // Find the blog post by ID
        $blog = Blog::findOrFail($id);

        // Delete the blog post
        $blog->delete();

        //return success message with tostr
        toastr()->success('Blog deleted successfully', ['timeOut' => 5000, 'closeButton' => true]);
        return redirect()->route('admin.blog.all');
    }
}
