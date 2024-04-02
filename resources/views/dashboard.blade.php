@include('components/header')

<div class="container mt-5">
    @if(session('mess'))
        <div class="alert alert-danger" role="alert">
            {{ session('mess') }}
        </div>
        @endif
        
    <div class="row">
        <div class="col">
            <a href="{{url('/dasboard')}}" class="btn btn-primary">Eng</a>
            <a href="{{url('/dasboard/hin')}}" class="btn btn-primary">Hindi</a>
            <a href="{{url('/dasboard/guj')}}" class="btn btn-primary">Gujrati</a>
            <a href="{{url('/dasboard/tam')}}" class="btn btn-primary">Tamil</a>
            <h1 class="mt-3">@lang('lang.welcome')</h1>

            <a href="/createPost" class="btn btn-success mt-3">Create Post</a>

            <a href="{{url('/userData')}}" class="btn btn-info mt-3">All USERS</a>

            <ul class="list-group mt-3">
                @foreach ($posts['data'] as $item)
                    <li class="list-group-item">
                        <h4>{{$item->id}}</h4>
                        <h3>{{$item->title}}</h3>
                        <h5>{{$item->discription}}</h5>
                        <h5>{{$item->user_id}}</h5>
                       
                        <img src="images/{{$item->feature_img ?? ' '}}" alt="" height="100px" width="100px">
                         
                        @if($posts['user_id']==$item->user_id && $posts['user_role']!='admin')
                            <a href="{{route('edit.post',['id'=>$item->id])}}" class="btn btn-warning">
                                Edit
                            </a>
                            <a href="{{route('delete.post',['id'=>$item->id])}}" class="btn btn-danger">
                                Delete
                            </a>
                        @elseif($posts['user_role']=='admin')
                            <a href="{{route('admin.edit.post',['id'=>$item->id])}}" class="btn btn-warning">
                                Edit
                            </a>
                            <a href="{{route('admin.delete.post',['id'=>$item->id])}}" class="btn btn-danger">
                                Delete
                            </a>
                        @endif

                        <br>  <br>
                        @if($item->status == 0)
                        <form action="{{ url('/update_status/' . $item->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name='status' value='1' />
                            <button type="submit" class="btn btn-warning">Rejected</button>
                        </form>
                    @elseif($item->status == 1)
                        <form action="{{ url('/update_status/' . $item->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name='status' value='2' />
                            <button type="submit" class="btn btn-success">Approved</button>
                        </form>
                    @elseif($item->status == 2)
                        <form action="{{ url('/update_status/' . $item->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name='status' value='3' />
                            <button type="submit" class="btn btn-danger">Waiting</button>
                        </form>
                  
                    @else
                        <span class="badge badge-secondary">Unknown Status</span>
                    @endif
                </li>
                       
                @endforeach
            </ul>
        </div>
    </div>
</div>

@include('components/footer')
