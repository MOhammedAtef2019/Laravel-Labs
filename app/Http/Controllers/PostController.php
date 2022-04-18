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


        $posts = Post::paginate(4);

       return view('posts.index',['allPosts'=>$posts]);


    }

    public function create()
    {
        $users = User::all();

        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store(StorePostRequest $request)
    {
        // request()->validate([
        //     'title' => 'required|unique:posts|min:3',
        //     'description' => 'required|min:10',
        //     'post_creator' => 'required|exists:users,id',
        // ]);
        $data = request()->all();

        if ($request->hasFile('avatar')) {
            $filename = time() . $request->avatar->getClientOriginalName();
            // dd($filename);
            $request->avatar->storeAs('images', $filename, 'public');

        }


        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
            'avatar'=>$filename
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



        // dd($request);
        $postToUpdate = post::find($id);
        // dd($request->all());
        $postToUpdate->title = $request->input('title');
        $postToUpdate->user_id = $request->input('post_creator');
        $postToUpdate->description = $request->input('description');
        // $postToUpdate->description = $request->input('description');

        if ($request->hasFile('avatar')) {

            $file = $request->file('avatar');
            $extention = $file->getClientOriginalName();
            $filename = time() . $extention;
            // dd($filename);
            $file->storeAs('images', $filename, 'public');
            $postToUpdate->avatar = $filename;

        }
        $postToUpdate->save();



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

