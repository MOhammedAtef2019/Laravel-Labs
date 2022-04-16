@extends('layouts.app')

@section('title')Create @endsection

@section('content')
<<<<<<< HEAD
        <form class="col-6 mx-auto my-5" method="POST" action="{{route('posts.update',['post' => $post->id])}}" enctype="multipart/form-data">
=======
        <form class="col-6 mx-auto my-5" method="POST" action="{{route('posts.update',['post' => $post->id])}}">
>>>>>>> dc95090a04d204ec83cfb04c0c473be1807d4cfc
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="exampleInputTitle" class="form-label">Title</label>
              <input name="title" value="{{$post['title']}}" type="text" class="form-control" id="exampleInputTitle" >
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea value="" name='description' class="form-control" id="exampleFormControlTextarea1" rows="3">
            {{$post['description']}}
            </textarea>
            </div>

            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
            <select name='post_creator' class="form-control">
              @foreach ($users as $user)
                <option value="{{$user->id}}" @if($user->id == $post->user_id) selected @endif >{{$user->name}}</option>
              @endforeach
            </select>
            </div>
<<<<<<< HEAD
            @if($post->avatar)

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Image</label>
                <input id="avatar" type="file" class="form-control" name="avatar">
            </div>
            @endif
=======
>>>>>>> dc95090a04d204ec83cfb04c0c473be1807d4cfc


            <button type="submit" class="btn btn-success">update Post</button>
          </form>
          @endsection
