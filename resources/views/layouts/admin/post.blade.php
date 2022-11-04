@extends('layouts.master')

@section('css')
    <style>
        input:checked~.dot {
            transform: translateX(100%);
            background-color: #48bb78;
        }
    </style>
@endsection

@section('content')
    <div class="container px-6 mx-auto grid">

        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-50 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-50 dark:bg-gray-900 ">

                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            Add Post
                        </h4>
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-700">
                            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Title</span>
                                    <input name="title" id="title"
                                        class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('title')) border border-red-500 @endif"
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

                                <div for="" class=" block text-sm mt-4">
                                    <span class=" text-gray-700 dark:text-gray-400">Banner</span>
                                    <div class="flex w-10 h-10">
                                        <div for="dropzone-file"
                                            class="flex flex-col bg-purple-50 rounded-lg border-2 border-dashed cursor-pointer dark:hover:bg-gray-800">
                                            <input name="image" type="file"
                                                class="dropify text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray"
                                                data-show-errors="true" data-allowed-file-extensions="jpeg jpg png"
                                                data-max-file-size-preview="3M" />
                                        </div>
                                    </div>
                                </div>


                                <div class="block text-sm mt-4">
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
                                </div>


                                <legend>Published status</legend>

                                <input id="draft" class="peer/draft" type="radio" name="status" checked />
                                <label for="draft" class="peer-checked/draft:text-sky-500">Draft</label>

                                <input id="published" class="peer/published" type="radio" name="status" />
                                <label for="published" class="peer-checked/published:text-sky-500">Published</label>

                                <div class="hidden peer-checked/draft:block">Drafts are only visible to administrators.
                                </div>
                                <div class="hidden peer-checked/published:block">Your post will be publicly visible on your
                                    site.</div>


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
                                    class="p-3 mr-4 text-orange-500 bg-purple-100 rounded-lg dark:text-orange-100 dark:bg-purple-500">
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

        $('.dropify').dropify(

        );
    </script>
@endsection
