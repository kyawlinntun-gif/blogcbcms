@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tag Name</th>
                        <th>Editing</th>
                        <th>Deleting</th>
                    </tr>
                </thead>
                <tbody>
                    @if($tags->count() > 0)
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->tag }}</td>
                                <td>
                                    <a href="{{ url('/admin/tags/' . $tag->id) }}" class="btn btn-xs btn-primary">Edit</a>
                                </td>
                                <td>
                                    <button class="btn btn-xs btn-danger" onclick="deleteTag({{ $tag->id }})">Delete</button>
                                    <form action="{{ url('/admin/tags/'. $tag->id) }}" method="POST" id="deleteTag{{ $tag->id }}" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center">No tag yet.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')

    <script>
        function deleteTag(id)
        {
            event.preventDefault();
            document.getElementById('deleteTag'+id).submit();
        }
    </script>

@endsection
