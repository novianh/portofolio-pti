@extends('layouts.master')

@section('content')
    <div class="container px-6 mx-auto grid">

        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-50 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-50 dark:bg-gray-900 ">

                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            Add Post
                        </h4>
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Title</span>
                                    <input name="title" id="title"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @if ($errors->has('title')) border border-red-500 @endif"
                                        placeholder="Post title ..." value="{{ old('title') }}" />

                                    @error('title')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('title') }}
                                        </p>
                                    @enderror
                                </label>


                                <label class="block text-sm mt-4">
                                    <span class="text-gray-700 dark:text-gray-400">Slug</span>
                                    <input name="slug" id="slug"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @if ($errors->has('slug')) border border-red-500 @endif"
                                        placeholder="Slug-title ..." value="{{ old('slug') }}" />

                                    @error('slug')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('slug') }}
                                        </p>
                                    @enderror
                                </label>

                                <label for="" class=" block text-sm mt-4">
                                    <span class=" text-gray-700 dark:text-gray-400">Banner</span>
                                    <div class="flex justify-center items-center w-full">
                                        <label for="dropzone-file"
                                            class="flex flex-col justify-center items-center w-full h-10 bg-purple-50 rounded-lg border-2 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:border-gray-600 dark:bg-gray-700 hover:bg-gray-100  dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                <svg aria-hidden="true" class="mb-3 w-8 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                    </path>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                        class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                                    (MAX.
                                                    800x400px)</p>
                                            </div>
                                            <input id="dropzone-file" type="file" class="hidden">
                                        </label>
                                    </div>
                                </label>

                                <label class="block text-sm mt-4">
                                    <span class="text-gray-700 dark:text-gray-400">Content</span>
                                    <div class="mt-1">
                                        <input id="content" type="hidden" name="content">
                                        <trix-editor input="content"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input  @if ($errors->has('content')) border border-red-500 @endif">
                                        </trix-editor>
                                    </div>
                                    @error('content')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('content') }}
                                        </p>
                                    @enderror
                                </label>

                                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 text-right sm:px-6 mt-8">
                                    <button type="submit"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Create Post
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-50 dark:bg-gray-900 ">
                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            Recent Post
                        </h4>

                        @foreach ($post as $p)
                            <div class="mt-8 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-lg dark:text-orange-100 dark:bg-orange-500">
                                    <div class="shrink-0">
                                        <img class="h-12 w-12" src="{{ url('storage/post/' . $p->image) ?? '' }}"
                                            alt="banner">
                                    </div>
                                </div>
                                <div>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $p->title ?? '' }}
                                    </p>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        {{ $p->excerpts ?? '' }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </div>
    <script>
        const title = document.querySelector('#title')
        const slug = document.querySelector('#slug')

        title.addEventListener('change', function() {
            fetch('/admin/post/slug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
            console.log('ol');
        })
    </script>
@endsection
