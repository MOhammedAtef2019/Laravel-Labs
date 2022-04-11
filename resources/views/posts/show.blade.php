@extends('layout.app')

@section('title') View @endsection

@section('content')
<div class="card bg-light mt-5" >
  <div class="card-header">Post Info</div>
  <div class="card-body">

    <h5 class="card-title" style="font-size:18px;display:inline;">Title:-</h5>
    <p class="card-text" style="display:inline;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <h5 class="card-title mt-4" style="font-size:18px">Description:-</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<div class="card bg-light mt-5" style="max-width: 18rem,text-align:center;">

  <div class="card-header">Post Creator Info</div>
  <div class="card-body">
      <div class="p-2">
       <h5 class="card-title" style="font-size:18px;display:inline;">Title:-</h5>
       <p class="card-text" style="display:inline;">{{$post[1]}}</p>
      </div>
      <div class="p-2">
      <h5 class="card-title" style="font-size:18px;display:inline;">posted By:-</h5>
      <p class="card-text" style="display:inline;">{{$post[2]}}</p>
      </div>
      <div class="p-2">
      <h5 class="card-title" style="font-size:18px;display:inline;">Created At:-</h5>
    <p class="card-text" style="display:inline;">{{$post[3]}}</p>
      </div>





  </div>
</div>
  @endsection
