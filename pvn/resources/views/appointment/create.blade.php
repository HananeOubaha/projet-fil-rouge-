@extends('layout.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <div class="bg-white rounded-lg shadow-lg">
        <div class="bg-pvn-green text-white px-6 py-4 rounded-t-lg">
            <h2 class="text-xl font-semibold">Nouveau Rendez-vous</h2>
        </div>

        <div class="p-6 bg-pvn-light-beige rounded-b-lg">
            <form method="POST" action="{{ route('appointments.store') }}">
                @csrf

                <!-- Psychologue -->
                <div class="mb-4">
                    <label for="psychologist_id" class="block text-sm font-medium text-pvn-dark-green">Psychologue</label>
                    <select id="psychologist_id" name="psychologist_id" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-pvn-green focus:border-pvn-green @error('psychologist_id') border-red-500 @enderror">
                        <option value="">Sélectionnez un psychologue</option>
                        @foreach($psychologists as $psychologist)
                            <option value="{{ $psychologist->id }}" {{ old('psychologist_id') == $psychologist->id ? 'selected' : '' }}>
                                {{ $psychologist->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('psychologist_id')
                        <p class="text-red-600 text-sm mt-1"><strong>{{ $message }}</strong></p>
                    @enderror
                </div>

                <!-- Date & Heure -->
                <div class="mb-4">
                    <label for="appointment_date" class="block text-sm font-medium text-pvn-dark-green">Date et heure du rendez-vous</label>
                    <input type="datetime-local" id="appointment_date" name="appointment_date" value="{{ old('appointment_date') }}" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-pvn-green focus:border-pvn-green @error('appointment_date') border-red-500 @enderror">
                    @error('appointment_date')
                        <p class="text-red-600 text-sm mt-1"><strong>{{ $message }}</strong></p>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="mb-4">
                    <label for="notes" class="block text-sm font-medium text-pvn-dark-green">Notes (optionnel)</label>
                    <textarea id="notes" name="notes" rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-pvn-green focus:border-pvn-green @error('notes') border-red-500 @enderror">{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="text-red-600 text-sm mt-1"><strong>{{ $message }}</strong></p>
                    @enderror
                </div>

                <!-- Boutons -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <button type="submit"
                        class="w-full sm:w-auto bg-pvn-green text-white py-2 px-4 rounded-md hover:bg-pvn-dark-green transition font-semibold">
                        Prendre rendez-vous
                    </button>
                    <a href="{{ route('appointments.index') }}"
                       class="w-full sm:w-auto bg-gray-200 text-pvn-dark-green py-2 px-4 rounded-md hover:bg-gray-300 transition text-center font-medium">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
