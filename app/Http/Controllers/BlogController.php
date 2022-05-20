<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Contracts\Session\Session;



class BlogController extends Controller
{
    public function show()
    {
        // $blog = Blog::all();
        $blog = Blog::paginate('10');
       return view('blog/blog',['blogdata'=>$blog]);
    }

    public function add()
    {
       return view('blog/addblog');
    }

    public function addData(StoreBlogRequest $req)
    {
        $data = new Blog;

        $data->name=$req->name;
        $data->image=$req->file('image')->store('blogimage');
        $data->description=$req->description;

        
        $data->save();

        $req->session()->put('success','Your Blog Data Added Successfully.');
        return redirect()->route('blog.listing');
    }


    public function delete($id)
    {
       $blog = Blog::find($id);
       $blog->delete();
        session()->put('success','Your Blog Data Deleted Successfully.');
       return redirect()->route('blog.listing');
    }

    public function view($id)
    {
       $blog = Blog::find($id);
       return response()->json([
            "status"=>200,
            "data"=>$blog,
       ]);
    //    return view('viewblog',['data'=>$blog]);
    }

    public function edit($id)
    {
       $blog = Blog::find($id);
       return view('blog/updateblog',['blog'=>$blog]);
    //    return $blog;
    //    return redirect('listing');
    }

    public function updateData(UpdateBlogRequest $req)
    {
        $data = Blog::find($req->id);
      
        if($req->file('image') != ''){
            $data->name=$req->name;
            $data->image=$req->file('image')->store('blogimage');
            $data->description=$req->description;
         
        }
        else
        {
            $data->name=$req->name;
            $data->description=$req->description;
        }
       
        $data->save();
        $req->session()->put('success','Your Blog Data Updated Successfully.');
        return redirect()->route('blog.listing');
    }
}

