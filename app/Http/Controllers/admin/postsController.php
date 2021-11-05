<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\newPost;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts  = Post::all();
        return view('admin.all-posts')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $this->validate($request, [
            'title'=>'required', 
            'description'=>'required',
            'category'=>'required', 
            'image' => 'required|image|mimes:jpg,img,png,jpeg,gif,svg|max:2048'
             
        ]); 
        $random = str_shuffle('938474701223773919323456789');
        $token = substr($random, 0, 10);
        $item = new Post;
        $item->title = $request->input('title');  
        $item->category = $request->input('category');
        $item->postid = $token; 
        $item->likes = '0'; 
        $item->dislikes = '0';
        $item->status = 'active';
        $item->publisher = auth()->user()->name;  
        $item->description = $request->input('description');
        if($request->hasFile('image')){      
            $fileNameWithExt = $request->image->getClientOriginalName();
            $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $Extension = $request->image->getClientOriginalExtension();
            $filenameToStore = $fileName.'_'.time().'.'.$Extension; 
            $path= $request->image->storeAs('posts', $filenameToStore, 'public');      
            $item->picture = $filenameToStore;
          }
          $item->save();
          $title = $item->title;
          $message = $item->description;
          $category = $item->category;
          $subscribers = Subscriber::all();
          foreach($subscribers as $subscriber){
              $email = $subscriber->email_address;
              Mail::to($email)->send(new newPost($category, $title, $message));
          }
          return redirect()->route('posts.index')->with('post', 'You have added a new item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post-details')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.edit-post-details')->with('post', $post);
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
        $this->validate($request, [
            'title'=>'required', 
            'description'=>'required',
            'category'=>'required', 
            'image' => 'required|image|mimes:jpg,img,png,jpeg,gif,svg|max:2048'
             
        ]);  
        $item = Post::findOrFail($id);
        $item->title = $request->input('title');  
        $item->category = $request->input('category'); 
        $item->publisher = auth()->user()->name;  
        $item->description = $request->input('description');
        if($request->hasFile('image')){      
            $fileNameWithExt = $request->image->getClientOriginalName();
            $fileName =  pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $Extension = $request->image->getClientOriginalExtension();
            $filenameToStore = $fileName.'_'.time().'.'.$Extension; 
            $path= $request->image->storeAs('posts', $filenameToStore, 'public');      
            $item->picture = $filenameToStore;
          }
          $item->save();
          

          return redirect()->route('posts.index')->with('postupdate', 'You have added a new item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('postdelete', 'You have deleted one post');
    }
}
