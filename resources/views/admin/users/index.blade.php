@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            Published Posts
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->count() > 0)
                        @foreach ($users as $user)
                            <tr>
                                <td><img src="{{ asset($user->profile->avatar) }}" alt="{{ $user->name }}" width="60px;" height="60px;" style="border-width: 50%;"></td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if ($user->admin)
                                        <a href="{{ url('/admin/users/not-admin/' . $user->id) }}" class="btn btn-sm btn-danger">Remove permissions</a>
                                    @else
                                        <a href="{{ url('/admin/users/admin/' . $user->id) }}" class="btn btn-sm btn-success">Make admin</a>
                                    @endif
                                </td>
                                <td>
                                    @if (Auth::id() !== $user->id)
                                        <button class="btn btn-sm btn-danger" onclick="deleteUser({{ $user->id }})">Delete</button>                                        
                                    @endif
                                    <form action="{{ url('/admin/users/' . $user->id) }}" method="POST" id="deleteUser{{ $user->id }}" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach  
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No User.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')

    <script>
        function deleteUser(id)
        {
            event.preventDefault();
            document.getElementById('deleteUser'+id).submit();
        }
    </script>

@endsection
