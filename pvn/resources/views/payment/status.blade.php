@extends('layout.navpatient')
@section('title', 'Statut de paiement')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-2xl font-semibold text-gray-800">Statut de paiement</h2>
        </div>

        <div class="px-6 py-4 space-y-4">
            @if(session('success'))
            <div class="p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="p-4 bg-red-100 text-red-800 rounded">
                {{ session('error') }}
            </div>
            @endif

            <div class="pt-4">
                <a href="{{ route('appointments.index') }}"
                    class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Retour à mes rendez-vous
                </a>
            </div>
        </div>
    </div>
</div>
@endsection