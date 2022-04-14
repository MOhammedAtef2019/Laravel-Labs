<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;

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
        $users = User::all();

        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store()
    {
        $data = request()->all();

        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],

        ]);

        return to_route('posts.index');
    }





    public function show($post)
    {

         $dbPost = Post::find($post);


        return view('posts.show',[
            'post'=>$dbPost,
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

