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
    <div class=" grid">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8">

                <div class="max-h-fit bg-gray-50 dark:bg-gray-900 overflow-hidden sm:rounded-lg">
                    <div class="p-6 bg-gray-50 dark:bg-gray-900 ">
                        <h2
                            class="text-purple-900 px-3 bg-purple-400 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple  py-3 font-semibold text-2xl mb-8">
                            SKILL</h2>
                        <div class="px-8 flex justify-between ">
                            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                                List of Skill
                            </h4>
                            <button
                                class=" md:w-auto text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800"
                                type="button" data-modal-toggle="large-modal">
                                Add Skill
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
                                            Add Skill
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
                                        <form action="{{ route('skill.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label class="block text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Skill Name</span>
                                                <input name="name" id="name"
                                                    class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('name')) border border-red-500 @endif"
                                                    autofocus placeholder="Web Design..." value="{{ old('name') }}" />

                                                @error('name')
                                                    <p class="italic text-sm text-red-600 mt-2">
                                                        {{ $errors->first('name') }}
                                                    </p>
                                                @enderror
                                            </label>

                                            <label class="block text-sm mt-4">
                                                <span class="text-gray-700 dark:text-gray-400">Description</span>
                                                <textarea name="desc" id="desc"
                                                    class="block rounded-lg w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-none form-input  @if ($errors->has('desc')) border border-red-500 @endif"
                                                    placeholder="I like to..." rows="3">{{ old('desc') }}</textarea>

                                                @error('desc')
                                                    <p class="italic text-sm text-red-600 mt-2">
                                                        {{ $errors->first('desc') }}
                                                    </p>
                                                @enderror
                                            </label>

                                            <div for="" class=" block text-sm mt-4">
                                                <span class=" text-gray-700 dark:text-gray-400">Icon White</span>
                                                <div class="flex w-96 h-auto">
                                                    <div for="dropzone-file"
                                                        class="flex flex-col bg-purple-50 rounded-lg border-2 border-dashed cursor-pointer dark:hover:bg-gray-800  @if ($errors->has('image')) border-red-500 @endif">
                                                        <input name="image" type="file"
                                                            class="dropify text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray"
                                                            data-show-errors="true"
                                                            data-allowed-file-extensions="jpeg jpg png svg"
                                                            data-max-file-size-preview="3M" />
                                                    </div>
                                                </div>
                                                @error('image')
                                                    <p class="italic text-sm text-red-600 mt-2">
                                                        {{ $errors->first('image') }}
                                                    </p>
                                                @enderror
                                            </div>


                                            <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 text-right sm:px-6 mt-8">
                                                <button type="submit"
                                                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                    Create Skill
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-5 mt-8">

                            @foreach ($skills as $skill)
                                <div class="flex-1 w-full overflow-hidden rounded-lg shadow-xs mx-1">
                                    <div class="w-full overflow-x-auto">
                                        <table class="w-full whitespace-no-wrap">
                                            <thead>
                                                <tr
                                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                    <th class="px-4 py-3">
                                                        <div class="flex justify-between items-center">
                                                            <div>Skill Name</div>
                                                            <div>
                                                                <a href="{{ route('skill.edit', $skill) }}"
                                                                    class="hover:decoration-lime-600 text-center mr-2 mb-2  dark:text-lime-400 dark:hover:text-white underline decoration-1 hover:decoration-2 underline-offset-4 text-lime-600  ">Edit</a>
                                                                <a href="{{ route('skill.destroy', $skill->id) }}"
                                                                    onclick="notificationBeforeDelete(event, this)"
                                                                    class="show_confirm hover:decoration-orange-600 text-center mr-2 mb-2  dark:text-orange-400 dark:hover:text-white underline decoration-1 hover:decoration-2 underline-offset-4 text-orange-600  ">
                                                                    Del</a>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                    <td class="px-4 py-3">
                                                        <div class="flex items-center text-sm">
                                                            <!-- Avatar with inset shadow -->
                                                            <div
                                                                class="relative hidden w-14 h-14 mr-3 rounded-full md:block">

                                                                <img class="object-cover w-full h-full rounded-full"
                                                                    src="{{ url('storage/skill/' . $skill->image) ?? 'https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ' }}"
                                                                    alt="" loading="lazy">
                                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                                    aria-hidden="true"></div>
                                                            </div>
                                                            <div>
                                                                <p class="font-semibold">{{ $skill->name ?? '-' }}</p>
                                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                                    {{ Str::limit(strip_tags($skill->desc), 20) ?? '-' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
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
