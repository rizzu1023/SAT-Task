@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
        @if(count($follow) > 0)
        @foreach($posts as $p)
        <div class="container p-3">
     <!-- <h4>No timeline Available</h4> -->
                @foreach($follow as $f)
     <div class="row ">
            <div class="col-md-12">
                @if($f->secondary_id == $p->user2->id)

                @if( $p->user->name == $p->user2->name)
                <h5><a href="/profile/{{$p->user2->name}}">{{$p->user2->name}}</a></h5>
                <p>{{ $p->discription}}</p>
                @else
                <h5><a href="/profile/{{$p->user->id}}"> {{ $p->user->name }}</a> > <a href="/profile/{{$p->user2->id}}">{{ $p->user2->name }}</a></h5>
                <p>{{ $p->discription }}</p>
                @endif
            
            
            <hr>
            </div>
     </div>
                @endif
                @endforeach

</div>
@endforeach
    @else
    <div class="container">
    <div class="row">
        <div class="col-md-12">
         <h3>You are following anyone Or No post found<h3>
        </div>
      </div>
    </div>
    @endif

    </div>
    </div>
</div>
@endsection
