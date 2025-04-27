@extends('layout.navAuth')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800">Mes Rendez-vous</h2>
        </div>

        <div class="p-6">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if($appointments->isEmpty())
                <div class="text-center py-8">
                    <p class="text-gray-600">Vous n'avez aucun rendez-vous pour le moment.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-left text-gray-600 uppercase tracking-wider">
                            <tr>
                                <th class="px-4 py-3">Patient</th>
                                <th class="px-4 py-3">Date & Heure</th>
                                <th class="px-4 py-3">Statut</th>
                                <th class="px-4 py-3">Notes</th>
                                <th class="px-4 py-3">Actions</th>
                                <th class="px-4 py-3">Gestion</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td class="px-4 py-2 text-gray-800">
                                        {{ $appointment->patient->name }}
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
                                        <a href="{{ route('psychologist.appointments.show', $appointment) }}"
                                           class="inline-flex items-center px-3 py-1.5 border border-blue-500 text-blue-500 rounded-md hover:bg-blue-500 hover:text-white transition-colors duration-200">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Voir détails
                                        </a>
                                    </td>
                                    <td class="px-4 py-2">
                                        @if($appointment->status === 'pending')
                                            <div class="flex space-x-2">
                                                <form action="{{ route('psychologist.appointments.updateStatus', $appointment) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="confirmed">
                                                    <button type="submit"
                                                            class="inline-flex items-center px-3 py-1.5 bg-green-500 text-white rounded-md hover:bg-green-600 transition-colors duration-200">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                        </svg>
                                                        Confirmer
                                                    </button>
                                                </form>
                                                <form action="{{ route('psychologist.appointments.updateStatus', $appointment) }}" method="POST" class="inline"
                                                      onsubmit="return confirm('Êtes-vous sûr de vouloir annuler ce rendez-vous ?')">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="cancelled">
                                                    <button type="submit"
                                                            class="inline-flex items-center px-3 py-1.5 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors duration-200">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                        Annuler
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-gray-500 italic"></span>
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