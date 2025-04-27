@extends('layout.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800">Détails du Rendez-vous</h2>
            <a href="{{ route('appointments.index') }}"
               class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                Retour
            </a>
        </div>

        <div class="px-6 py-4 space-y-4">
            <div class="flex flex-col sm:flex-row">
                <div class="font-semibold w-40 text-gray-700">Psychologue :</div>
                <div class="text-gray-800">
                    {{ $appointment->psychologist?->name ?? 'Non assigné' }}
                </div>
            </div>

            <div class="flex flex-col sm:flex-row">
                <div class="font-semibold w-40 text-gray-700">Date :</div>
                <div class="text-gray-800">
                    {{ $appointment->appointment_date->format('d/m/Y H:i') }}
                </div>
            </div>

            <div class="flex flex-col sm:flex-row">
                <div class="font-semibold w-40 text-gray-700">Statut :</div>
                <div>
                    <span class="inline-block px-3 py-1 rounded-full text-sm font-medium
                        {{ $appointment->status === 'pending' ? 'bg-yellow-100 text-yellow-800' :
                           ($appointment->status === 'confirmed' ? 'bg-green-100 text-green-800' :
                           'bg-red-100 text-red-800') }}">
                        {{ ucfirst($appointment->status) }}
                    </span>
                </div>
            </div>

            @if($appointment->notes)
                <div class="flex flex-col sm:flex-row">
                    <div class="font-semibold w-40 text-gray-700">Notes :</div>
                    <div class="text-gray-800">
                        {{ $appointment->notes }}
                    </div>
                </div>
            @endif

            @if($appointment->status === 'pending')
                <div class="pt-6">
                    <form action="{{ route('appointments.cancel', $appointment) }}" method="POST"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir annuler ce rendez-vous ?')">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                            Annuler le rendez-vous
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
