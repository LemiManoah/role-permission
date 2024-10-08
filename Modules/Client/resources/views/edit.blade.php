<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Edit User</h1>
    </x-slot>

    <br>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $client->name) }}" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" 
                    required>
                @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Location</label>
                <input type="text" id="location" name="location" value="{{ old('location', $client->location) }}" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" 
                    required>
                @error('location')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="facility_level" class="block text-sm font-medium text-gray-700 dark:text-gray-800">Facility Level</label>
                <select id="facility_level" name="facility_level" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" 
                    required>
                    <option value="" disabled selected>Select a facility level</option>
                    @foreach(['HCI', 'HCII', 'HCIII', 'HCIV', 'Clinic', 'Hospital', 'Referral Hospital'] as $level) 
                        <option value="{{ $level }}" {{ old('facility_level') == $level ? 'selected' : '' }}>
                            {{ ucfirst($level) }}
                        </option>
                    @endforeach
                </select>
                @error('facility_level')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="client_email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Client Email</label>
                <input type="email" id="client_email" name="client_email" value="{{ old('client_email', $client->client_email) }}" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" 
                    required>
                @error('client_email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="contact_person_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contact person</label>
                <input type="text" id="contact_person_name" name="contact_person_name" value="{{ old('contact_person_name', $client->contact_person_name) }}" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" 
                    required>
                @error('contact_person_name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="contact_person_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contact person Phone</label>
                <input type="tel" id="contact_person_phone" name="contact_person_phone" value="{{ old('contact_person_phone', $client->contact_person_phone) }}" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" 
                    required>
                @error('contact_person_phone')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="streamline_engineer_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Streamline engineer</label>
                <input type="tel" id="streamline_engineer_name" name="streamline_engineer_name" value="{{ old('streamline_engineer_name', $client->streamline_engineer_name) }}" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" 
                    required>
                @error('streamline_engineer_name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="streamline_engineer_email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Streamline engineer email</label>
                <input type="email" id="streamline_engineer_email" name="streamline_engineer_email" value="{{ old('streamline_engineer_email', $client->streamline_engineer_email) }}" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" 
                    required>
                @error('streamline_engineer_email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <div class="flex items-center justify-between">
                <a href="{{ route('clients.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-md shadow-md hover:bg-gray-700 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                    Back to Clients List
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white text-xs uppercase tracking-widest shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update Client
                </button>
            </div>
        </form>
    </div>
</x-app-layout>