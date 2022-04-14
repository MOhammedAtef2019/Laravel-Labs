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

        return redirect()->route('posts.index');;
    }





    public function show($post)
    {

         $dbPost = Post::find($post);


        return view('posts.show',[
            'post'=>$dbPost,
        ]);
    }

    public function edit($id){
        $postToEdit = post::find($id);
        $users = User::all();

        return view('posts.edit',['post'=>$postToEdit,'users'=>$users]);

    }

    public function update($id,Request $request){

        $postToUpdate = post::find($id);
        $postToUpdate->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->post_creator,
        ]);

        // return to_route('posts.index');
        return redirect()->route('posts.index');

    }


    public function destroy ($id){

        $postToDelete = Post::find($id);
        $postToDelete->delete();
        // $postToDelete->Comments()->delete();

        return redirect()->route('posts.index');


       }
}

