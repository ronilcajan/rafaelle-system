<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex mb-2 justify-end">
                <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-system')">Add
                    System</x-primary-button>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                System name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Logo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                URL
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($systems  as $system)
                            <tr class="bg-white border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $system->system_name }}
                                </th>
                                <td class="px-6 py-4">
                                    <img src="{{ $system->logo ? asset('storage/' . $system->logo) : asset('img/logo1.png') }}"
                                        width="60" alt="">

                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ $system->system_url }}"
                                        class="font-medium text-blue-600  hover:underline">View</a>

                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded ">
                                        {{ $system->publish ? 'Publish' : 'Coming Soon' }}</span>

                                </td>
                                <td class="px-6 py-4">
                                    <button data-id="{{ $system->id }}" data-name="{{ $system->system_name }}"
                                        data-url="{{ $system->system_url }}" data-publish="{{ $system->publish }}"
                                        class="font-medium text-blue-600 hover:underline mr-2" x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'edit-system')"
                                        onclick="editSystem(this)">Edit</button>
                                    <form method="POST" action="{{ route('system.delete') }}" id="deleteForm">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="system_id" value="{{ $system->id }}">
                                        <a href="#"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                            id="deleteLink">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <<<<<<< HEAD <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" colspan="5"
                                    class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    =======
                                    <tr class="bg-white border-b">
                                        <th scope="row" colspan="5"
                                            class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            >>>>>>> dc902e64655fac465f639b1a6d8affb3df26be8e
                                            No data Retrieved!
                                        </th>
                                    </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="mt-2">
                {{ $systems->links() }}
            </div>
        </div>
    </div>
    @include('system.modal')
    @push('script')
        <script>
            function editSystem(that) {
                const system_id = (that).dataset.id;
                const system_name = (that).dataset.name;
                const system_url = (that).dataset.url;
                const publish = (that).dataset.publish;

                const systemIDElement = document.getElementById("system_id");
                const systemNameElement = document.getElementById("system_name");
                const systemURLElement = document.getElementById("system_url");
                const systemPublishElement = document.getElementById("system_publish");

                systemIDElement.value = system_id
                systemNameElement.value = system_name
                systemURLElement.value = system_url
                systemPublishElement.checked = publish ? true : false;
            }

            document.addEventListener("DOMContentLoaded", function() {
                // Get references to the link and form elements
                var deleteLink = document.getElementById("deleteLink");
                var deleteForm = document.getElementById("deleteForm");

                // Add a click event listener to the link
                deleteLink.addEventListener("click", function(e) {
                    e.preventDefault(); // Prevent the default link behavior

                    // Submit the form when the link is clicked
                    deleteForm.submit();
                });
            });
        </script>
    @endpush
</x-app-layout>
