<x-layout>
    <x-slot:heading>
        <h1 class="text-3xl font-extrabold text-blue-800 mb-6">Edit</h1>
    </x-slot:heading>


    <form method="POST" action="/finance/type/{{ $item->id }}" class="space-y-8 divide-y divide-gray-200">
    @csrf
    @method('PATCH')
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">{{ $title }}</h2>
            <p class="mt-1 text-sm/6 text-gray-600">{{ $description}}</p>
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-2">
                    <label for="amount" class="block text-sm/6 font-medium text-gray-900">Amount</label>
                    <input type="number" name="amount" id="amount" value="{{ $item->amount }}" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="sm:col-span-2">
                    <label for="saved_at" class="block text-sm/6 font-medium text-gray-900">Saved_at</label>
                    <input type="date" name="saved_at" id="saved_at" value="{{ $item->saved_at == null ? $item->date : $item->saved_at }}" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="sm:col-span-1">
                    <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                    <input type="text" name="description" id="description" value="{{ $item->description }}" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
            </div>

            <div id="dynamic-fields"></div>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/finance" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
</form>


</x-layout>
