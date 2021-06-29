@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Editing</th>
                        <th>Deleting</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ url('/admin/categories/' . $category->id) }}" class="btn btn-xs btn-primary">Edit</a>
                            </td>
                            <td>
                                <button class="btn btn-xs btn-danger" onclick="deleteCategory({{ $category->id }})">Delete</button>
                                <form action="{{ url('/admin/categories/'. $category->id) }}" method="POST" id="deleteCategory{{ $category->id }}" style="display: none;">
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
        function deleteCategory(id)
        {
            event.preventDefault();
            document.getElementById('deleteCategory'+id).submit();
        }
    </script>

@endsection
