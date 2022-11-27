@extends('layouts.master')

@section('content')
   
        <div class=" py-20 text-start bg-white dark:bg-gray-800 rounded-lg
        ">
            <div class="container px-6 mx-auto text-gray-800 dark:text-gray-100 ">
                <p class=" font-medium uppercase text-6xl">WELCOME {{ Auth::user()->name }}</p>
                <p class="py-5 text-lg">This Is Your Dashboard <br> You Can Customize Your Website Here</p>
            </div>
        </div>
        <div class="container mx-auto flex mt-8 md:flex-col lg:flex-row-reverse gap-5">
            <div class="flex-1">
                <div class="grid gap-5 md:mb-8 lg:mb-0 md:grid-cols-1 xl:grid-cols-1">

                    <!-- Card -->
                    <div class=" h-40 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div
                            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z">
                                </path>
                                <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class=" font-medium text-4xl text-gray-600 dark:text-gray-400">{{ $allPost ?? '-' }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400">Total Post</p>
                            <small class="text-gray-400">+{{ $postWeek }} This Week</small>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class=" h-40 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                                </path>
                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-bold text-4xl text-gray-700 ">+{{ $postDay ?? '3' }}</h3>
                            <p class="mb-0">Today</p>
                            <small class="text-gray-400">Published</small>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class=" h-40 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-bold text-4xl text-gray-700 dark:text-gray-200">
                                {{ $messages->count() ?? '-' }}</h3>
                            <p class="text-gray-700 dark:text-gray-200">Comments</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Charts -->
            <div class="center flex-1">
                <form action="{{ route('profile.store') }}" method="POST" class="h-full" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $profile->id ?? '' }}">
                    <div
                        class="w-full h-full  bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-end px-4 pt-4">
                            <button id="dropdownButton" data-dropdown-toggle="dropdown"
                                class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                                type="button">
                                <span class="sr-only">Open dropdown</span>
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdown"
                                class="z-10 hidden text-base list-none dark:text-gray-400  bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                                <ul class="py-1" aria-labelledby="dropdownButton">
                                    <li>
                                        <a href="#" id="edit_profile"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex h-full flex-col items-center justify-center pb-10">
                            @if (!$profile)
                                <svg class="w-24 h-24 mb-3 rounded-full shadow-lg text-gray-300" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            @else
                                <img class="w-28 h-28 mb-3 rounded-full shadow-lg" id="preview-image-before-upload"
                                    src="{{ url('storage/profile/' . $profile->image) }}" alt="" width="100%">
                            @endif
                            <label for="profile_upload" id="pen_edit_profile">
                                <span
                                    class="underline underline-offset-1 hover:underline-offset-2 cursor-pointer text-gray-600 hover:decoration-purple-400 hover:decoration-4"><svg
                                        class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg></span>
                                <input id="profile_upload" name="profile_upload" type="file"
                                    class="inp sr-only @if ($errors->has('profile_upload'))  @endif ">
                            </label>
                            @error('profile_upload')
                                <p class="italic text-sm text-red-600 mt-2">
                                    {{ $errors->first('profile_upload') }}
                                </p>
                            @enderror

                            <h5 class="text-4xl font-medium text-purple-900 dark:text-white"> <input type="text"
                                    name="last_name" id="last_name" value="{{ $profile->last_name ?? '' }}"
                                    class="text-xl rounded-md focus:border-indigo-500 focus:ring-indigo-500 inp bg-transparent text-center @if ($errors->has('last_name')) border border-red-500 @endif "
                                    placeholder="your fullname"></h5>
                            @error('last_name')
                                <p class="italic text-sm text-red-600 mt-2">
                                    {{ $errors->first('last_name') }}
                                </p>
                            @enderror

                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                <input type="text" name="ability" id="ability"
                                    value="{{ $profile->ability ?? '' }}"
                                    class="rounded-md -mt-3.5 text-sm text-center inp bg-transparent 0 focus:border-indigo-500 focus:ring-indigo-500 @if ($errors->has('ability')) border border-red-500 @endif "
                                    placeholder="web developer & ....">
                            </span>
                            @error('ability')
                                <p class="italic text-sm text-red-600 mt-2">
                                    {{ $errors->first('ability') }}
                                </p>
                            @enderror

                            <textarea id="about" name="about" rows="3"
                                class="inp mb-16 text-md w-1/2 text-center bg-transparent rounded-md focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:text-gray-100 @if ($errors->has('skill')) border border-red-500 @endif "
                                placeholder="Lorem ipsum dolor sit amet, consectetur ...">{{ $profile->about ?? '' }}</textarea>
                            @error('about')
                                <p class="italic text-sm text-red-600 mt-2">
                                    {{ $errors->first('about') }}
                                </p>
                            @enderror
                            <button type="submit" id="btn"
                                class="btn mt-5 inline-flex justify-center rounded-md border border-transparent bg-purple-600 py-2 px-4 text-sm font-medium text-white shadow-sm focus:outline-none cursor-pointer focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Save</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
 
@endsection
@section('js')
    @if (\Session::has('success'))
        <script>
            Swal.fire({
                position: 'bottom-end',
                customClass: 'swal-height',
                title: <?php echo json_encode(\Session::get('success')); ?>,
                showConfirmButton: false,
                timer: 1500,
                background: '#7e3af2',
                toast: true,
                showClass: {
                    popup: 'animate__animated animate__slideInRight'
                },
                hideClass: {
                    popup: 'animate__animated animate__slideOutRight'
                }
            })
        </script>
    @endif
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>

    <script>
        $(document).ready(function(e) {
            $(".inp").prop('disabled', true).addClass("border-none");
            $(".btn").prop('disabled', true).addClass("hidden");
            $("#pen_edit_profile").addClass("hidden");
            $("#edit_profile").click(function() {
                $(".inp").prop('disabled', false).removeClass("border-none").addClass('my-2').removeClass(
                    ' -mt-3.5').removeClass('text-center');
                $(".btn").prop('disabled', false).removeClass("hidden").addClass(
                    "hover:bg-indigo-700");
                $("#pen_edit_profile").removeClass("hidden");
                $('textarea').removeClass('mb-16')

            });

            $('#profile_upload').change(function() {
                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

            function notificationBeforeDelete(event, el) {
                event.preventDefault();
                const swalWithTailwind = Swal.mixin({
                    customClass: {
                        confirmButton: 'px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-lime-600 border border-transparent rounded-lg active:bg-lime-600 hover:bg-lime-700 focus:outline-none focus:shadow-outline-lime',
                        cancelButton: 'ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-orange-600 border border-transparent rounded-lg active:bg-orange-600 hover:bg-orange-700 focus:outline-none focus:shadow-outline-orange'
                    },
                    buttonsStyling: false
                })
                swalWithTailwind.fire({
                    title: 'Are You Sure?',
                    text: "You won't be able to revert this!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    color: 'black'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#delete-form").attr('action', $(el).attr('href'));
                        $("#delete-form").submit();
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithTailwind.fire(
                            'Cancelled',
                            'Your post is safe :)',
                            'error'
                        )
                    }
                });
            }
        });
    </script>
@endsection
