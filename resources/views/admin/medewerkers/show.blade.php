<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Medewerker Details: {{ $medewerker->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <!-- Header Section -->
                <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center">
                            <div class="h-16 w-16 rounded-full bg-white bg-opacity-20 flex items-center justify-center mr-4">
                                <span class="text-2xl font-bold text-white">
                                    {{ strtoupper(substr($medewerker->name, 0, 2)) }}
                                </span>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold">{{ $medewerker->name }}</h1>
                                <p class="text-blue-100 mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Medewerker
                                </p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Actief
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column - Personal Details -->
                        <div class="space-y-6">
                            <!-- Contact Information -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Contactgegevens
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex items-center text-gray-600">
                                        <span class="w-20 text-sm font-medium">Naam:</span>
                                        <span class="text-gray-900">{{ $medewerker->name }}</span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <span class="w-20 text-sm font-medium">Email:</span>
                                        <a href="mailto:{{ $medewerker->email }}" class="text-blue-600 hover:text-blue-800 underline">
                                            {{ $medewerker->email }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Account Information -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    Accountinformatie
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex items-center text-gray-600">
                                        <span class="w-20 text-sm font-medium">Rol:</span>
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ ucfirst($medewerker->role) }}
                                        </span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <span class="w-20 text-sm font-medium">ID:</span>
                                        <span class="text-gray-500 font-mono text-sm">#{{ $medewerker->id }}</span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <span class="w-20 text-sm font-medium">Aangemaakt:</span>
                                        <span class="text-gray-900">{{ $medewerker->created_at->format('d-m-Y H:i') }}</span>
                                    </div>
                                    @if($medewerker->updated_at != $medewerker->created_at)
                                        <div class="flex items-center text-gray-600">
                                            <span class="w-20 text-sm font-medium">Bewerkt:</span>
                                            <span class="text-gray-900">{{ $medewerker->updated_at->format('d-m-Y H:i') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Additional Info -->
                        <div class="space-y-6">
                            <!-- Statistics Card -->
                            

                            <!-- Quick Actions -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    Snelle Acties
                                </h3>
                                <div class="space-y-2">
                                    <a href="mailto:{{ $medewerker->email }}" 
                                       class="w-full inline-flex items-center justify-center px-4 py-2 border border-blue-300 text-sm font-medium rounded-md text-blue-700 bg-blue-50 hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        Email Versturen
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('admin.medewerkers.index') }}" 
                           class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Terug naar Overzicht
                        </a>
                        
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.medewerkers.edit', $medewerker) }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Bewerken
                            </a>
                            
                            <button onclick="openDeleteModal('{{ $medewerker->id }}', '{{ addslashes($medewerker->name) }}')" 
                                    class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Verwijderen
                            </button>
                            <form id="delete-form-{{ $medewerker->id }}" action="{{ route('admin.medewerkers.destroy', $medewerker) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mt-2">Medewerker verwijderen</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Weet je zeker dat je <span id="employeeName" class="font-semibold"></span> wilt verwijderen? Deze actie kan niet ongedaan worden gemaakt.
                    </p>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="confirmDelete" class="px-2 py-2 bg-red-500 text-white text-base font-medium rounded-md w-1/3 mr-2 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                        Verwijderen
                    </button>
                    <button onclick="closeDeleteModal()" class="px-2 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-1/3 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Annuleren
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentUserId = null;

        function openDeleteModal(userId, userName) {
            currentUserId = userId;
            document.getElementById('employeeName').textContent = userName;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            currentUserId = null;
        }

        document.getElementById('confirmDelete').addEventListener('click', function() {
            if (currentUserId) {
                document.getElementById('delete-form-' + currentUserId).submit();
            }
        });

        // Close modal when clicking outside
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeDeleteModal();
            }
        });
    </script>
</x-app-layout>
