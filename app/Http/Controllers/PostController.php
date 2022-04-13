<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
//    private $posts ;
//   public function __construct(){
//      $this->posts = [
//         ['id' => 1, 'title' => 'first post', 'posted_by' => 'ahmed', 'created_at' => '2022-04-11'],
//         ['id' => 2, 'title' => 'second post', 'posted_by' => 'mohamed', 'created_at' => '2022-04-11'],
//     ];


 //  }
    public function index()
    {
        $posts = Post::all();



       return view('posts.index',['allPosts'=>$posts]);


    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $postData=request()->all();

        $post=[
            "id"=>count($this->posts )+1,
            "title" => request()["title"],
            "posted_by" => request()['postedby'],
            "created_at" => request()['createdat']
        ];

            // $this->posts = array_push($this->posts,$post);
            $this->posts[count($this->posts)] = $post;


         return view('posts.index',['allPosts' => $this->posts]);



    }

    public function show($post)
    {
        $post1 = explode(', ', $post);


        return view('posts.show',[
            'post'=>$post1,
        ]);
    }

    public function edit($id){


        $post=$this->posts[$id];

        return view('posts.edit',['post'=>$post]);
    }

    public function update($id,Request $request){

        $post=$request->all();

        $this->posts[$id]=$post;

        return view('posts.index',['allPosts' => $this->posts]);

    }


    public function destroy ($id){

        unset($this->posts[$id]);

       return view('posts.index',['allPosts' => $this->posts]);

       }
}

