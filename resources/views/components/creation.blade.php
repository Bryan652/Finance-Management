<form method="POST" :action="route{{$action}}">
@csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">{{ $description}}</h2>
            <p class="mt-1 text-sm/6 text-gray-600">{{ $details }}</p>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-2">
                    <label for="amount" class="block text-sm/6 font-medium text-gray-900">Amount</label>
                    <input type="number" name="amount" id="amount" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="due_date" class="block text-sm/6 font-medium text-gray-900">Due Date</label>
                    <input type="date" name="due_date" id="due_date" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                </div>
                <div class="sm:col-span-1">
                    <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                    <input type="text" name="description" id="description" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                </div>
            </div>

            <div id="dynamic-fields"></div>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/Finance" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
</form>

