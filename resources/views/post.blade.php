{{-- ////post.blade.php
@include('components/header')
   
<form action="{{ isset($data['post']) ? '/post/edit/' . $data['post']->id : '/createPost' }}"
    method='POST' style='display:flex;flex-direction:column; gap:15px'>

                   <h2> {{isset($data['post'])?'Edit Post':'Add Post'}}</h2> 
        @csrf
        <input type="number" name='id' placeholder='Post no.' value='{{$data['post']->id ?? ''}}' />
     
        <input type="text" placeholder='Title' name='title' value='{{$data['post']->title ?? ''}}' />
        @error('title')
        {{$message}}
        @enderror
        <textarea rows="4" cols="15" type="text" placeholder='Write your post here' name='discription'  >{{$data['post']->discription ?? ''}}</textarea>
        @error('discription')
        {{$message}}
        @enderror
       <button>Submit</button>
       
       @if (isset($mess))
       <span>{{$mess}}</span>
       <button><a href="/dasboard">Back</a></button>
       @endif
        
       
       
           



</form>

@include('components/footer') --}}









@include('components/header')
<div class="container mt-5">
    @if(session('mess'))
        <div class="alert alert-danger" role="alert">
            {{ session('mess') }}
        </div>
        @endif

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ isset($data['post']) ? '/post/edit/' . $data['post']->id : '/createPost' }}" enctype="multipart/form-data" method="POST">
                <h2>{{ isset($data['post']) ? 'Edit Post' : 'Add Post' }}</h2>
                @csrf
                <div class="form-group">
                    <input type="number" class="form-control" name="id" placeholder="Post no." value="{{ $data['post']->id ?? ' '}}" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $data['post']->title ?? '' }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="4" placeholder="Write your post here" name="discription">{{ $data['post']->discription ?? '' }}</textarea>
                    @error('discription')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="file" name="feature_img" class="form-control" placeholder="Select any pic" />
                    @error('profile_pic')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <br><br>
                <span>{{ $mess ?? ' ' }}</span>
                <br><br>
                    <a href="/dasboard" class="btn btn-secondary">Back</a>
            
            </form>
        </div>
    </div>
</div>

@include('components/footer')
