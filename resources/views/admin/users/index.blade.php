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
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->count() > 0)
                        @foreach ($users as $user)
                            <tr>
                                <td><img src="{{ asset($user->profile->avatar) }}" alt="{{ $user->name }}" width="60px;" height="60px;" style="border-width: 50%;"></td>
                                <td>{{ $user->name }}</td>
                                <td>Edit</td>
                                <td>Delete</td>
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
        function deleteTrash(id)
        {
            event.preventDefault();
            document.getElementById('deleteTrash'+id).submit();
        }
    </script>

@endsection
