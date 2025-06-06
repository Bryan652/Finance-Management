<x-layout>

    <x-slot:heading>
        <h1 class="text-3xl font-extrabold text-blue-800 mb-6">Finance Dashboard</h1>
    </x-slot:heading>

    <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-2">Savings</h2>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">amount</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">saved at</th>
            </tr>
        </thead>
        @foreach ($savings as $saving)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $saving->amount }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $saving->description }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $saving->saved_at }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <button class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Edit</button>
                    <button class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Delete</button>
                </td>
            </tr>

        </tbody>
        @endforeach
    </table>


    <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-2">Expenses</h2>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">amount</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">date</th>
            </tr>
        </thead>
        @foreach ($expenses as $expense)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $expense->amount }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $expense->description }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $expense->date }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <button class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Edit</button>
                    <button class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Delete</button>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>


    <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-2">Debts</h2>
<table class="min-w-full divide-y divide-gray-200">
    <thead>
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">amount</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">paid at</th>
        </tr>
    </thead>
    @foreach ($debts as $debt)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{ $debt->amount }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $debt->description }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $debt->due_date }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $debt->status }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $debt->paid_at }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <form action="">
                    <button class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Edit</button>
                    <button class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>

</x-layout>
