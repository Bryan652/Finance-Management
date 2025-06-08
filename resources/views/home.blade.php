<x-layout>
    <x-slot:heading>
        <h1 class="text-2xl font-bold text-gray-900">Home</h1>
    </x-slot:heading>

    <h1><strong>Total Savings:</strong> <span class="text-blue-800 font-bold">PHP {{ $savings }}</span></h1>
    <h1><strong>Total Expenses:</strong> <span class="text-amber-500 font-bold">PHP {{ $expenses }}</span></h1>
    <h1><strong>Total Debts remaining:</strong> <span class="text-red-800 font-bold">PHP {{ $pendingDebts }}</span></h1>
    <h1><strong>Total Debts paid:</strong> <span class="text-green-800 font-bold">PHP {{ $paidDebts }}</span></h1>
</x-layout>
