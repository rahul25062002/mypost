{{-- 
      //register.blade.png
      
      <form action="{{url('/')}}/auth/register" method='post' style='display:flex;justify-content:center;align-items:center;flex-direction:column;gap:5px; border:1px solid black ;padding:5px hight:100%;width:550px'>
        @csrf
     
        <h1>Sign Up</h1>
        
        <x-input  type='text' name='name' placeholder='Full Name' />
        <span>
            @error('name')
                {{$message}}
            @enderror
        </span>
       
        <x-input type="email" name='email'  placeholder='Email'  />
        <span>
            @error('email')
                {{$message}}
            @enderror
        </span>
        <x-input  type="password"  name='password'  placeholder='Password'   />
        
        <span>
            @error('password')
                {{$message}}
            @enderror
        </span>
        <x-input  type="password" name='cpassword' placeholder='ConformPassword'   />

        <span>
            @error('cpassword')
                {{$message}}
            @enderror
        </span>
        <button>Submit</button>
        <span>Already have account<a href="/">Click here</a></span>
        <span> <h3>{{ pr($mess ?? ' ')}}</h3> </span>
      </form>
        
        
@include('components/footer') --}}






@include('components/header')

<div class="container mt-5">
    <form action="{{url('/')}}/auth/register"   method="post" class="border border-dark p-4" style="width: 550px;">
        @csrf
        <h1 class="text-center">Sign Up</h1>

        <div class="form-group">
            <x-input type="text" name="name" class="form-control" placeholder="Full Name" />
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <x-input type="email" name="email" class="form-control" placeholder="Email" />
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

       

        <div class="form-group">
            <x-input type="password" name="password" class="form-control" placeholder="Password" />
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <x-input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" />
            @error('cpassword')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        <p class="mt-3">Already have an account? <a href="/">Click here</a></p>
        
        <div class="mt-3">
            <h3>{{ pr($mess ?? ' ') }}</h3>
        </div>
    </form>
</div>

@include('components/footer')
