@extends('layouts.master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container px-6 mx-auto grid">

        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-50 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-50 dark:bg-gray-900 ">

                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            Edit Post
                        </h4>
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-700">
                            <form action="{{ route('post.update', $post->slug) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $post->id }}">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Title</span>
                                    <input name="title" id="title"
                                        class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('title')) border border-red-500 @endif"
                                        autofocus placeholder="Post title ..." value="{{ $post->title ?? old('title') }}" />

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
                                        placeholder="Slug-title ..." value="{{ $post->slug ?? old('slug') }}" />

                                    @error('slug')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('slug') }}
                                        </p>
                                    @enderror
                                </label>

                                <div for="" class=" block text-sm mt-4">
                                    <span class=" text-gray-700 dark:text-gray-400">Banner</span>
                                    <div class="flex w-96 h-auto">
                                        <div for="dropzone-file"
                                            class="flex flex-col bg-purple-50 rounded-lg border-2 border-dashed cursor-pointer dark:hover:bg-gray-800">
                                            <input name="image" type="file"
                                                class="dropify text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray"
                                                data-show-errors="true" data-allowed-file-extensions="jpeg jpg png"
                                                data-max-file-size-preview="3M"
                                                data-default-file="{{ url('storage/post/' . $post->image) ?? '' }}" />
                                        </div>

                                    </div>
                                </div>


                                <div class="block text-sm mt-4">
                                    <span class="text-gray-700 dark:text-gray-400">Content</span>
                                    <div class="mt-1">
                                        <textarea id="content" name="content">{{ old('content') ?? $post->content }}
                                        </textarea>
                                    </div>
                                    @error('content')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('content') }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex items-center mt-4">
                                    <input name="status" id="default-checkbox" type="checkbox" value="publish"
                                        @if ($post->status == 'publish') {{ 'checked' }}
                                            @else
                                            {{ '' }} @endif
                                        class="appearance-none w-4 h-4 text-purple-600 bg-gray-200 rounded-xl border-gray-300 focus:ring-purple-300 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-500 dark:border-gray-600 checked:bg-purple-500">
                                    <label for="default-checkbox"
                                        class="ml-2 text-sm text-gray-700 dark:text-gray-400">Publish</label>
                                </div>


                                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 text-right sm:px-6 mt-8">
                                    <button type="submit"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Update Post
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="\js\summernote-ext-highlight.js"></script>

    <script>

        const title = document.querySelector('#title')
        const slug = document.querySelector('#slug')

        title.addEventListener('change', function() {
            fetch('/admin/post/slug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
            console.log('ol');
        })
        $('.dropify').dropify({
            tpl: {
                clearButton: '<button type="button" class="dropify-clear w-12 h-12 rounded-full"><svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>',
            }
        });

        $(document).ready(function() {
            $('#content').summernote({
                height: 300,
                tabsize: 2,
                // close prettify Html
                prettifyHtml: false,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['codeview', 'help']]
                ],
            });
        });
    </script>
@endsection
@endsection
