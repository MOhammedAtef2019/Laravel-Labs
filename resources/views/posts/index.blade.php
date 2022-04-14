@extends('layout.app')

@section('title') This Is Index Page @endsection

@section('content')
        <div class="text-center">
            <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
        </div>
        <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col" style="text-align: center">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ( $allPosts as $post)
              <tr>
                <td>{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->user ? $post->user->name : 'Not Found'}}</td>
                <td>{{$post['created_at']}}</td>
                <td style="text-align: center">
                    <a href="{{route('posts.show', ['post' => $post['id']])}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit',['post' => $post['id']])}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('posts.destroy',['post' => $post['id']])}}" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button href="" onclick="return confirm('Are you sure, you want Delete?')"  class="btn btn-danger">Delete</button>
                    


                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
@endsection
