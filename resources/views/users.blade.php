@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
        @if(count($users) > 1) 
        @foreach($users as $user)
        @if( Auth()->user()->name != $user->name)
        <div class="well">
        <div class="row">
          <div class="col-md-2 col-sm-2">
            <img style="width:70px;height:70px;border-radius:50%" src="/storage/profile_pic/noimage.jpg">
          </div>
          <div class="col-md-10 col-sm-10">
            <h3>{{$user->name }}</h3>
            <form action="{{ Route('follow')}}" method="POST">
            @csrf
            <input type="hidden" name="primary_id" value="{{ Auth()->user()->id }}"/>
            <input type="hidden" name="secondary_id" value="{{$user->id}}"/>
            <button type="submit" class="btn btn-sm btn-success">Follow</button>
            </form>
          </div>
        </div>
      <hr>
       @endif
    @endforeach
    @else
    <div class="container">
    <div class="row">
        <div class="col-md-8">
         <h3>No users Found<h3>
        </div>
      </div>
    </div>
    @endif

    </div>
    </div>
</div>
@endsection
