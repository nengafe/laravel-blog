<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Mail\subscriber as MailSubscriber;
use App\Models\Post;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class pagesController extends Controller
{
    public function index(){
        $articles = Post::whereDate('created_at', Carbon::today())->get();
    
         return view('pages.homepage')->with('articles', $articles);
    }
    public function politics(){
        $time = Carbon::now(); 
         
        $articles = Post::where('category', 'Politics')->get();
         return view('pages.politics')->with('articles', $articles);
    }
    public function travel(){
        $time = Carbon::now();
         
        $articles = Post::where('category', 'Travel')->get();
         return view('pages.travel')->with('articles', $articles);
    }
    public function entertainment(){
        $time = Carbon::now();
         
        $articles = Post::where('category', 'Entertainment')->get();
         return view('pages.entertainment')->with('articles', $articles);
    }
    public function technology(){
        $time = Carbon::now();
         
        $articles = Post::where('category', 'Technology')->get();
         return view('pages.technology')->with('articles', $articles);
    }
    public function subscription(Request $request){
        $this->validate($request, [
            'email_address'=>'required|email|unique:subscribers'
        ]);
        $client = new Subscriber;
        $client->email_address = $request->input('email_address');
        $client->save();
        $email = $client->email_address;
        Mail::to($email)->send(new MailSubscriber($email));
        return redirect()->back()->with('welcome', 'Thanks for your subscription.We have emailed you more details.Please check');
    }
    public function article($id){
        $article = Post::where('id', $id)->first();
         
        return view('pages.article')->with('article', $article);
    }
}
