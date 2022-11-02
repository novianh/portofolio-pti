@extends('layouts.master')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 ">

                    <div>
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Post</h3>
                                    <p class="mt-1 text-sm text-gray-600">Post your article.</p>
                                </div>
                            </div>

                            <div class="mt-5 md:col-span-2 md:mt-0">
                                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                            <div class="gap-6">

                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">Title</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="title" id="title"
                                                        class="inp block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @if ($errors->has('title')) border border-red-500 @endif "
                                                        placeholder="your title" value="{{ old('title') }}">
                                                </div>

                                                @error('title')
                                                    <p class="italic text-sm text-red-600 mt-2">
                                                        {{ $errors->first('title') }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="gap-6">

                                                <label for="slug"
                                                    class="block text-sm font-medium text-gray-700">slug</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="slug" id="slug"
                                                        class="inp block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm  @if ($errors->has('slug')) border border-red-500 @endif "
                                                        placeholder="auto generated...">
                                                </div>
                                                @error('slug')
                                                    <p class="italic text-sm text-red-600 mt-2">
                                                        {{ $errors->first('slug') }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="content"
                                                    class="block text-sm font-medium text-gray-700">Content</label>
                                                <div class="mt-1">
                                                    <input id="content" type="hidden" name="content">
                                                    <trix-editor input="content"></trix-editor>
                                                </div>
                                                @error('content')
                                                    <p class="italic text-sm text-red-600 mt-2">
                                                        {{ $errors->first('content') }}
                                                    </p>
                                                @enderror
                                            </div>


                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                            <button type="submit" id="btn"
                                                class="btn inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm focus:outline-none cursor-pointer focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create
                                                Post</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                        <hr class="my-4 mx-auto w-48 h-1 bg-gray-100 rounded border-0 md:my-10 dark:bg-gray-700">
                        <h3 class="text-center text-lg font-medium leading-6 text-gray-900 my-8 ">Blog List</h3>
                        <div class=" overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Title
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Content
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $p)
                                        <tr class="bg-white border-b  hover:bg-gray-50 ">
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                                {{ $p->title ?? '' }}
                                            </th>
                                            <td class="py-4 px-6">
                                                {{ $p->excerpts ?? '' }}
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                <a href="#"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <script>
        const title = document.querySelector('#title')
        const slug = document.querySelector('#slug')

        title.addEventListener('change', function() {
            fetch('/admin/blog/slug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
            console.log('ol');
        })
    </script>
@endsection
