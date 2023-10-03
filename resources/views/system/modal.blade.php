<x-modal name="add-system" focusable maxWidth="xl">
    <form method="post" action="{{ route('system.store') }}" class="p-6" enctype="multipart/form-data">
        @csrf
        @method('post')

        <h1 class="text-xl font-medium text-gray-900">
            {{ __('Add New System') }}
        </h1>

        <div class="mt-6">
            <x-input-label value="{{ __('System Name') }}" class="sr-only" />

            <x-text-input name="system_name" type="text" class="mt-1 block w-full"
                placeholder="{{ __('System Name') }}" required />

            @error('system_name')
                <x-input-error :messages="$message"></x-input-error>
            @enderror


            <x-input-label value="{{ __('System URL') }}" class="sr-only" />

            <x-text-input name="system_url" type="url" class="mt-8 block w-full"
                placeholder="{{ __('System URL') }}" required />

            @error('system_url')
                <x-input-error :messages="$message"></x-input-error>
            @enderror


            <x-input-label value="{{ __('System Logo') }}" class="sr-only" />

            <x-text-input name="logo" type="file" accept="image/*" class="mt-8 block w-full"
                placeholder="{{ __('Logo') }}" required />

            @error('logo')
                <x-input-error :messages="$message"></x-input-error>
            @enderror

            <label class="relative inline-flex items-center cursor-pointer mt-8">
                <input type="checkbox" value="1" name="publish" class="sr-only peer" checked>
                <div
                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">ready to use?</span>
            </label>
            @error('publish')
                <x-input-error :messages="$message"></x-input-error>
            @enderror
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ml-3">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>

<x-modal name="edit-system" focusable maxWidth="xl">
    <form method="post" action="{{ route('system.update') }}" class="p-6" enctype="multipart/form-data">
        @csrf
        @method('put')

        <h1 class="text-xl font-medium text-gray-900">
            {{ __('Edit System') }}
        </h1>

        <div class="mt-6">
            <x-input-label for="system_name" value="{{ __('System Name') }}" class="sr-only" />

            <x-text-input id="system_name" name="system_name" type="text" class="mt-1 block w-full"
                placeholder="{{ __('System Name') }}" required />

            @error('system_name')
                <x-input-error :messages="$message"></x-input-error>
            @enderror


            <x-input-label for="system_url" value="{{ __('System URL') }}" class="sr-only" />

            <x-text-input id="system_url" name="system_url" type="url" class="mt-8 block w-full"
                placeholder="{{ __('System URL') }}" required />

            @error('system_url')
                <x-input-error :messages="$message"></x-input-error>
            @enderror


            <x-input-label for="logo" value="{{ __('System Logo') }}" class="sr-only" />

            <x-text-input name="logo" id="logo" type="file" accept="image/*" class="mt-8 block w-full"
                placeholder="{{ __('Logo') }}" />

            @error('logo')
                <x-input-error :messages="$message"></x-input-error>
            @enderror

            <label class="relative inline-flex items-center cursor-pointer mt-8">
                <input type="checkbox" id="system_publish" value="1" name="publish" class="sr-only peer" checked>
                <div
                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">ready to use?</span>
            </label>
            @error('publish')
                <x-input-error :messages="$message"></x-input-error>
            @enderror
        </div>
        <input type="hidden" id="system_id" name="system_id">
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ml-3">
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
