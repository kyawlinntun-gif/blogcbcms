@extends('layouts.app')

@section('content')

    @if($errors->any())

        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error }}
                </li>
            @endforeach
        </ul>

    @endif

    <div class="card">
        <div class="card-header">
            Edit blog settings
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/settings/' .  $settings->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="site_name">Site name</label>
                    <input type="text" id="site_name" name="site_name" class="form-control" value="{{ $settings->site_name }}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" class="form-control" value="{{ $settings->address }}">
                </div>
                <div class="form-group">
                    <label for="contact_phone">Contact Phone</label>
                    <input type="text" id="contact_phone" name="contact_phone" class="form-control" value="{{ $settings->contact_phone }}">
                </div>
                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="text" id="contact_email" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update site settings</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
