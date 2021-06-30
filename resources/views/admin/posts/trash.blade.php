@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Restore</th>
                        <th>Destroy</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px;" height="50px;"></td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <a href="#" class="btn btn-xs btn-primary">Edit</a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-xs btn-success">Restore</a>
                            </td>
                            <td>
                                <button class="btn btn-xs btn-danger" onclick="deletePermanetly({{ $post->id }})">Delete</button>
                                <form action="{{ url('/admin/posts/trash/'. $post->id) }}" method="POST" id="deletePermanetly{{ $post->id }}" style="display: none;">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')

    <script>
        function deletePermanetly(id)
        {
            event.preventDefault();
            document.getElementById('deletePermanetly'+id).submit();
        }
    </script>

@endsection
