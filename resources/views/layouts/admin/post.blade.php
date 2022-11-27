@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/default.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="grid">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8">

                <div class="bg-gray-50 dark:bg-gray-900 overflow-hidden min-h-screen sm:rounded-lg">
                    <div class="bg-gray-50 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-gray-50 dark:bg-gray-900 ">
                            <h2
                                class="text-purple-900 px-3 bg-purple-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple  py-3 font-semibold text-2xl mb-10">
                                POST</h2>
                            <div class="flex justify-between px-8 mb-5">

                                <h4 class=" text-lg font-semibold text-gray-600 dark:text-gray-300">
                                    Add Post
                                </h4>

                            </div>
                            <div class="bg-white dark:bg-gray-700 p-5 rounded-lg">

                                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data"
                                    id="form_create">
                                    @csrf
                                    <input type="hidden" name="id" id="id">
                                    <label class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">Title</span>
                                        <input name="title" id="title"
                                            class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('title')) border border-red-500 @endif"
                                            autofocus placeholder="Post title ..." value="{{ old('title') }}" />

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
                                        <div class="flex w-96 h-auto">
                                            <div for="dropzone-file"
                                                class="flex flex-col bg-purple-50 rounded-lg border-2 border-dashed cursor-pointer dark:hover:bg-gray-800  @if ($errors->has('image')) border-red-500 @endif">
                                                <input name="image" type="file" id="image"
                                                    class="dropify text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray"
                                                    data-show-errors="true" data-allowed-file-extensions="jpeg jpg png svg"
                                                    data-max-file-size-preview="3M" />
                                            </div>
                                        </div>
                                        @error('image')
                                            <p class="italic text-sm text-red-600 mt-2">
                                                {{ $errors->first('image') }}
                                            </p>
                                        @enderror
                                    </div>


                                    <div class="block text-sm mt-4">
                                        <span class="text-gray-700 dark:text-gray-400">Content</span>
                                        <div class="mt-1">
                                            <textarea name="content" id="content"></textarea>
                                        </div>
                                        @error('content')
                                            <p class="italic text-sm text-red-600 mt-2">
                                                {{ $errors->first('content') }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="flex items-center mt-4">
                                        <input name="status" id="default-checkbox" type="checkbox" value="publish"
                                            class="appearance-none w-4 h-4 text-purple-600 bg-gray-200 rounded-xl border-gray-300 focus:ring-purple-500 default:ring-2 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-500 dark:border-gray-600 checked:bg-purple-500">
                                        <label for="default-checkbox"
                                            class="ml-2 text-sm text-gray-700 dark:text-gray-400">Publish</label>
                                    </div>


                                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 text-right sm:px-6 mt-8">
                                        <button type="submit" id="btn_create"
                                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                            data-modal-toggle="authentication-modal">
                                            Create Post
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="flex justify-between px-8 mt-5">

                                <h4 class=" text-lg font-semibold text-gray-600 dark:text-gray-300">
                                    Recent Post
                                </h4>

                            </div>


                            @foreach ($post as $p)
                                <div class="mt-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                    <div class="flex justify-between">
                                        <div>
                                            <div class="flex items-center p-4 ">
                                                <div
                                                    class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-lg dark:text-purple-100 dark:bg-purple-600">
                                                    <div class="shrink-0">
                                                        <img class="h-12 w-12"
                                                            src="{{ url('storage/post/' . $p->image) ?? '' }}"
                                                            alt="banner">
                                                    </div>
                                                </div>
                                                <div>
                                                    <p
                                                        class="text-lg font-semibold text-gray-700 dark:text-gray-200 hover:text-purple-500 capitalize">
                                                        <a href="{{ route('post.show', $p) }}"> {{ $p->title ?? '' }}</a>

                                                    </p>
                                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                                        {{ $p->excerpts ?? '' }}
                                                    </p>
                                                    <span>{!! $p->status_label !!}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="p-4 flex items-center h-full">
                                                <a href="{{ route('post.edit', $p) }}"
                                                    class="hover:decoration-lime-600 font-medium text-sm text-center mr-2 mb-2  dark:text-lime-400 dark:hover:text-white underline decoration-1 hover:decoration-2 underline-offset-4 text-lime-600 ">Edit</a>

                                                <a href="{{ route('post.destroy', $p->id) }}"
                                                    onclick="notificationBeforeDelete(event, this)"
                                                    class="show_confirm hover:decoration-orange-600 font-medium text-sm text-center mr-2 mb-2  dark:text-orange-400 dark:hover:text-white underline decoration-1 hover:decoration-2 underline-offset-4 text-orange-600  ">
                                                    Del</a>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="text-center pt-5">

                                {{ $post->links('pagination::default') }}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    @section('js')
        <form action="" id="delete-form" method="post">
            @method('delete')
            @csrf
        </form>
        
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script src="\js\summernote-ext-highlight.js"></script>

        <script>
            // btn delete

            function notificationBeforeDelete(event, el) {
                event.preventDefault();
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-lime-600 border border-transparent rounded-lg active:bg-lime-600 hover:bg-lime-700 focus:outline-none focus:shadow-outline-lime',
                        cancelButton: 'ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-orange-600 border border-transparent rounded-lg active:bg-orange-600 hover:bg-orange-700 focus:outline-none focus:shadow-outline-orange'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Are You Sure?',
                    text: "You won't be able to revert this!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#delete-form").attr('action', $(el).attr('href'));
                        $("#delete-form").submit();
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your post is safe :)',
                            'error'
                        )
                    }
                });
            }

            // slug
            const title = document.querySelector('#title')
            const slug = document.querySelector('#slug')

            title.addEventListener('change', function() {
                fetch('/admin/post/slug?title=' + title.value)
                    .then(response => response.json())
                    .then(data => slug.value = data.slug)
                console.log('ol');
            })

            $(document).ready(function() {
                $('#content').summernote({
                    height: 200,
                    tabsize: 2,
                    // close prettify Html
                    prettifyHtml: false,
                    toolbar: [
                        // Add highlight plugin
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link']],
                        ['view', ['codeview', 'help']]
                    ],
                });
            });
        </script>

        {{-- sweetalert --}}
        @if (\Session::has('success'))
            <script>
                Swal.fire({
                    position: 'bottom-end',
                    customClass: 'swal-height',
                    title: <?php echo json_encode(\Session::get('success')); ?>,
                    showConfirmButton: false,
                    timer: 2000,
                    background: '#7e3af2',
                    toast: true,
                    // icon:'success',
                    showClass: {
                        popup: 'animate__animated animate__slideInRight'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__slideOutRight'
                    }
                })
            </script>
        @endif
    @endsection
@endsection
