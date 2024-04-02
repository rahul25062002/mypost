{{-- //userData.blade.php
@include('components/header')
 
<h1>User Available </h1>
{{$mess ?? ' '}}
@if(isset($users) && count($users) > 0)
    <div >
        <table >
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Role</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->role_code }}</td>
                        <td>
                            @if($user->status == 0)
                            <form action=" {{ url('/update/' . $user->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name='status' value='1' />
                                <button type="submit" >Waiting</button>
                            </form>
                            @elseif($user->status == 1)
                            <form action="{{ url('/update/' . $user->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name='status' value='2' />
                                <button type="submit" >Approved</button>
                            </form>
                            @elseif($user->status == 2)
                            <form action="{{ url('/update/' . $user->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name='status' value='3' />
                                <button type="submit" >Blocked</button>
                            </form>
                            @elseif($user->status == 3)
                            <form action="{{ url('/update/' . $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" >Cancelled</button>
                            </form>
                            @else
                                <span >Unknown Status</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>No users found.</p>
@endif

<button ><a href="/dasboard" >Back</a></button><br><br>

        --}}





        @include('components/header')

<div class="container mt-5">
    <h1>User Available</h1>
    <p>{{ $mess ?? ' ' }}</p>

    @if(isset($users) && count($users) > 0)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                @if($user->status == 0)
                                    <form action="{{ url('/update/' . $user->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name='status' value='1' />
                                        <button type="submit" class="btn btn-warning">Waiting</button>
                                    </form>
                                @elseif($user->status == 1)
                                    <form action="{{ url('/update/' . $user->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name='status' value='2' />
                                        <button type="submit" class="btn btn-success">Approved</button>
                                    </form>
                                @elseif($user->status == 2)
                                    <form action="{{ url('/update/' . $user->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name='status' value='3' />
                                        <button type="submit" class="btn btn-danger">Blocked</button>
                                    </form>
                                @elseif($user->status == 3)
                                    <form action="{{ url('/update/' . $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary">Cancelled</button>
                                    </form>
                                @else
                                    <span class="badge badge-secondary">Unknown Status</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>No users found.</p>
    @endif

    <button class="btn btn-primary "><a class='text-white' href="/dasboard">Back</a></button>
</div>

@include('components/footer')

