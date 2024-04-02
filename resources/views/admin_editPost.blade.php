{{-- //admin_editPost.blade.php
@include('components/header')
  {{ pr( $data['post']->id)}}
<form action="{{route('admin.edit.post',['id'=>$data['post']->id])}}"
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
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{route('admin.edit.post',['id'=>$data['post']->id])}}" method="POST">
                <h2>{{isset($data['post']) ? 'Edit Post' : 'Add Post'}}</h2>
                @csrf
                <div class="form-group">
                    <input type="number" class="form-control" name="id" placeholder="Post no." value="{{$data['post']->id ?? ''}}" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{$data['post']->title ?? ''}}">
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="4" cols="15" placeholder="Write your post here" name="discription">{{$data['post']->discription ?? ''}}</textarea>
                    @error('discription')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                
                  <br><br>
                    <span>{{$mess ?? ' '}}</span>
                    <a href="/dasboard" class="btn btn-secondary">Back</a>
                    <br><br>
            </form>
        </div>
    </div>
</div>

@include('components/footer')
