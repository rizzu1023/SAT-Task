@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
        @if(count($follow) > 0)
        @foreach($follow as $f)
        @if($f->user2->id != Auth()->user()->id )
        <div class="well">
        <div class="row">
          <div class="col-md-2 col-sm-2">
            <img style="width:70px;height:70px;border-radius:50%" src="/storage/profile_pic/noimage.jpg">
          </div> 
          <div class="col-md-10 col-sm-10">
            <h3><a href="/profile/{{$f->user2->id}}">{{$f->user2->name}}</a></h3>
          <form action="{{ Route('unfollow')}}" method="POST">
            @csrf
            <input type="hidden" name="primary_id" value="{{ Auth()->user()->id }}"/>
            <input type="hidden" name="secondary_id" value="{{$f->secondary_id}}"/>
            <button type="submit" class="btn btn-sm btn-primary">Unfollow</button>
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
         <h3>You are not following anyone.<h3>
        </div>
      </div>
    </div>
    @endif

    </div>
    </div>
</div>
@endsection
