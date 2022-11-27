@extends('layouts.master')

@section('content')
    <div class="grid">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8">

                <div class="max-h-fit bg-gray-50 dark:bg-gray-900 overflow-hidden sm:rounded-lg">
                    <div class="p-6 bg-gray-50 dark:bg-gray-900">
                        <h2
                            class="text-purple-900 px-3 bg-purple-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple  py-3 font-semibold text-2xl mb-10">
                            CONTACT</h2>
                        <div class="flex justify-between px-8">

                            <button
                                class=" md:w-auto text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800"
                                type="button" data-modal-toggle="large-modal">
                                Add Contact
                            </button>
                        </div>

                        <div id="large-modal" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 w-full md:inset-0 h-modal md:h-full">
                            <div class="relative w-full max-w-4xl h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                            Add Contact
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="large-modal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-700">
                                        <form action="{{ route('sc.store') }}" method="POST" enctype="multipart/form-data"
                                            id="form_create">
                                            @csrf
                                            <label class="block text-sm mt-4">
                                                <span class="text-gray-700 dark:text-gray-400">Account Name</span>
                                                <select id="countries"
                                                    class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input capitalize  @if ($errors->has('name')) border border-red-500 @endif"
                                                    name="name">
                                                    <option selected>Choose a name</option>
                                                    <option value="address">Address</option>
                                                    <option value="phone">Phone</option>
                                                    <option value="email">Email</option>
                                                    <option value="twitter">Twitter</option>
                                                    <option value="instagram">instagram</option>
                                                    <option value="github">github</option>
                                                    <option value="facebook">facebook</option>
                                                    <option value="dribble">dribble</option>
                                                    <option value="linkedin">linkedin</option>
                                                </select>
                                            </label>

                                            @error('name')
                                                <p class="italic text-sm text-red-600 mt-2">
                                                    {{ $errors->first('name') }}
                                                </p>
                                            @enderror
                                            <label class="block text-sm mt-4">
                                                <span class="text-gray-700 dark:text-gray-400">Account Url or Detail</span>
                                                <input name="url" id="url"
                                                    class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('url')) border border-red-500 @endif"
                                                    autofocus placeholder="https://..." value="{{ old('url') }}" />

                                                @error('url')
                                                    <p class="italic text-sm text-red-600 mt-2">
                                                        {{ $errors->first('url') }}
                                                    </p>
                                                @enderror
                                            </label>



                                            <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 text-right sm:px-6 mt-8">
                                                <button type="submit" id="create_btn"
                                                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                    Create Project
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 mx-auto p-4 w-full bg-white rounded-lg shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                            <div
                                class="flex justify-between items-center mb-4 bg-gray-100 dark:bg-gray-700 py-5 px-3 rounded-md">
                                <h5 class="text-lg font-bold leading-none text-gray-900 dark:text-white">List
                                    Contacts</h5>
                            </div>
                            <div class="flow-root">
                                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($accounts as $sc)
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0">
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <a href="{{ $sc->url }}">
                                                        <p
                                                            class="font-bold text-lg text-gray-900 truncate dark:text-white hover:text-purple-600 ">
                                                            {{ $sc->name ?? '-' }}
                                                        </p>
                                                    </a>

                                                </div>
                                                <div
                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    <a href="{{ route('sc.edit', $sc) }}"
                                                        class="hover:decoration-lime-600 text-center mr-2 mb-2  dark:text-lime-400 dark:hover:text-white underline decoration-1 hover:decoration-2 underline-offset-4 text-lime-600 text-sm">Edit</a>
                                                    <a href="{{ route('sc.destroyed', $sc->id) }}"
                                                        onclick="notificationBeforeDelete(event, this)"
                                                        class="show_confirm hover:decoration-orange-600 text-center mr-2 mb-2  dark:text-orange-400 dark:hover:text-white underline decoration-1 hover:decoration-2 underline-offset-4 text-orange-600 text-sm ">
                                                        Del</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>


    <script>
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
                            'Your data is safe :)',
                            'error'
                        )
                    }
                });
            }
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
