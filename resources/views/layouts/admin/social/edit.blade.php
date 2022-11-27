@extends('layouts.master')

@section('css')
    <style>
        #trix-toolbar-1 .trix-button {
            background: #ddd !important;
            /* force the background to be a light color since Trix icons do not support dark mode */
        }
    </style>
@endsection

@section('content')
    <div class="container px-6 mx-auto grid">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8">

                <div class="min-h-screen max-h-fit bg-gray-50 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gray-50 dark:bg-gray-900">

                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            Edit Social Account
                        </h4>
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-700">
                            <form action="{{ route('sc.update', $account) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Account Name</span>
                                    <input name="name" id="name"
                                        class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('name')) border border-red-500 @endif"
                                        autofocus placeholder="Twitter..." value="{{ old('name') ?? $account->name}}" />

                                    @error('name')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @enderror
                                </label>
                                <label class="block text-sm mt-4">
                                    <span class="text-gray-700 dark:text-gray-400">Account Url or Detail</span>
                                    <input name="url" id="url"
                                        class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('url')) border border-red-500 @endif"
                                        autofocus placeholder="https://..." value="{{ old('url') ?? $account->url }}" />

                                    @error('url')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('url') }}
                                        </p>
                                    @enderror
                                </label>
                                <label class="block text-sm mt-4">
                                    <span class="text-gray-700 dark:text-gray-400">Type</span>
                                    <input name="type" id="type"
                                        class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('type')) border border-red-500 @endif"
                                        autofocus placeholder="Social Media..." value="{{ old('type') ?? $account->type}}" />

                                    @error('type')
                                        <p class="italic text-sm text-red-600 mt-2">
                                            {{ $errors->first('type') }}
                                        </p>
                                    @enderror
                                </label>



                                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 text-right sm:px-6 mt-8">
                                    <button type="submit"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Update Contact
                                    </button>
                                </div>
                            </form>
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
                        'Your post is safe :)',
                        'error'
                    )
                }
            });
        }
    </script>
@endsection
