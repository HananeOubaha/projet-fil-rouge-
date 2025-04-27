@extends('layout.navAuth')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800">Mes Rendez-vous</h2>
            <a href="{{ route('appointments.create') }}"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Prendre un rendez-vous
            </a>
        </div>

        <div class="px-6 py-4">
            @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
            @endif

            @if($appointments->isEmpty())
            <div class="p-4 bg-blue-100 text-blue-800 rounded">
                Vous n'avez aucun rendez-vous pour le moment.
            </div>
            @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50 text-left text-gray-600 uppercase tracking-wider">
                        <tr>
                            <th class="px-4 py-3">Psychologue</th>
                            <th class="px-4 py-3">Date & Heure</th>
                            <th class="px-4 py-3">Statut</th>
                            <th class="px-4 py-3">Notes</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($appointments as $appointment)
                        <tr>
                            <td class="px-4 py-2 text-gray-800">
                                {{ $appointment->psychologist?->name ?? 'Non assigné' }}
                            </td>
                            <td class="px-4 py-2 text-gray-600">
                                {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-4 py-2">
                                <span class="inline-block px-3 py-1 rounded-full text-sm font-medium
                                            {{ $appointment->status === 'confirmed' ? 'bg-green-100 text-green-800' :
                                               ($appointment->status === 'cancelled' ? 'bg-red-100 text-red-800' :
                                               'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-gray-700">
                                {{ \Illuminate\Support\Str::limit($appointment->notes, 50) }}
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('appointments.show', $appointment) }}"
                                    class="inline-block bg-blue-500 text-white px-3 py-1 rounded text-xs hover:bg-blue-600">
                                    Voir
                                </a>

                                @if($appointment->status === 'pending')
                                <form action="{{ route('appointments.cancel', $appointment) }}"
                                    method="POST" class="inline-block ml-1"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir annuler ce rendez-vous ?')">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">
                                        Annuler
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection