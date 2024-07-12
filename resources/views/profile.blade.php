@extends('layouts.app')

@section('title', 'Profile Settings')

@section('contents')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Profile Settings</h2>
    <hr class="mb-6"/>
    <form method="POST" enctype="multipart/form-data" action="">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Name
            </label>
            <input name="name" type="text" value="{{ auth()->user()->name }}" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:border-indigo-500" />
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input name="email" type="text" value="{{ auth()->user()->email }}" class="w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:border-indigo-500" />
        </div>
    </form>
</div>
@endsection
