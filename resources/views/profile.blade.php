@extends('layouts.base')

@section('content')
    <!-- <div class="row">
        <div class="col-md-12 p-4" style="background:#C6C6C6">
        <div class="container">
            <img style="width:170px;height:170px;" src="/storage/post_image/">
            <div class="col-md-10 col-sm-10">
                <span class="ml-4" style="font-size:30px">Mohammed Rizwan</span>
                <small style="display:bloc">Male</small>
            </div>
        </div>
    </div>
</div> -->
<div style="background:#DDD">
<div class="container" >
<div class="row p-4 m-0"  >
          <div class="col-md-2 col-sm-2">
            <img style="width:170px;height:170px; display:inline-block" src="/storage/profile_pic/noimage.jpg">
          </div>
          <div class="col-md-5 col-sm-5 ml-3" style="display:inline-block;padding:35px">
            <h3 style="font-size:40px">{{ $user['name'] }}</h3>
            <small style="font-size:15px">{{ $user['gender'] }}</small>
          </div>   
          <div class="mt-5 col-md-1 p-3 text-center">
            <h5>Posts</h5>
            <span>{{ $post_count }}</span>
          </div>
          <div class="mt-5 ml-3 col-md-1 p-3 text-center">
            <h5>Followers</h5>
            <span>{{ $followers - 1 }}</span>
          </div>
          <div class="mt-5 ml-4 col-md-1 p-3 text-center">
            <h5>Following</h5>
            <span>{{ $following - 1}}</span>
          </div>
        </div>
</div>
</div>

<div class="container p-3">
<form id="post" action="{{ Route('Post.store')}}" method="POST">
  @csrf
  <div class="form-group">
    <!-- <label for="exampleFormControlInput1">Email address</label> -->
    <div class="col-md-9">
    <input type="text" class="form-control"  id="exampleFormControlInput1" name="discription" placeholder="what's on your mind??">
    <input type="hidden" name="primary_id" value="{{ Auth()->User()->id }}"/>
    <input type="hidden" name="secondary_id" value="{{ $user['id'] }}"/>
  </div>
    <div class="col-md-2">
    <button type="submit" class="btn btn-success mt-3">Post</button>
  </div>
  </div>
    </form>
</div>

<div class="container p-3">
     <!-- <h4>No timeline Available</h4> -->
     <div class="row p-4">
            @foreach($posts as $post)
            <div class="col-md-12">
                @if( $post->user->name == $post->user2->name)
                <h5><a href="/profile/{{$post->user2->id}}">{{ $post->user2->name }}</a></h5>
                <p>{{ $post->discription }}</p>
                <form action="/Post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                @if(Auth()->user()->id == $post->user2->id)
                <button style="display:inline-block" class="btn btn-sm btn-danger">Delete</button>
                @endif
                </form>
                @else
                <h5><a href="/profile/{{$post->user->id}}"> {{ $post->user->name }}</a> > <a href="/profile/{{$post->user2->id}}">{{ $post->user2->name }}</a></h5>
                <p>{{ $post->discription }}</p>
                <form action="/Post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                @if(Auth()->user()->id == $post->user2->id)
                <button style="display:inline-block" class="btn btn-sm btn-danger">Delete</button>
                </form>
                @endif
                @endif
            <hr>
            </div>
            @endforeach

     </div>
</div>
@endsection



@section('script')

<script type="text/javascript">


    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


    $("#pos").on('submit',function(e){
        e.preventDefault();

        // var team_code = $("input[name=team_code]").val();
        // var team_name = $("input[name=team_name]").val();
        // var team_title = $("input[name=team_title]").val();

        $.ajax({

           type:'POST',

           url:'{{Route('Post.store')}}',

        //    data:{team_code:team_code, team_name:team_name, team_title:team_title},
		   data: $(this).serialize(),

           success:function(data){

              alert(data.message);
			// $('.title1').html(data.message);
           }

        });


	});

</script>
@endsection

