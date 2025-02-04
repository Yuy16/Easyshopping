<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account Settings') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="accountSettings()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Profile Overview -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex items-center">
                    <div class="mr-6">
                        <img 
                            src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" 
                            alt="{{ Auth::user()->name }}" 
                            class="w-24 h-24 rounded-full object-cover"
                        >
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">{{ Auth::user()->name }}</h3>
                        <p class="text-gray-600">{{ Auth::user()->email }}</p>
                        <div class="mt-2">
                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                                Active Member
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Account Sections -->
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Personal Information -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-900">
                            <i class="fas fa-user mr-2"></i>Personal Information
                        </h3>
                        <form @submit.prevent="updateProfile">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                                    <input 
                                        type="text" 
                                        x-model="profile.name" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                        required
                                    >
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Email Address</label>
                                    <input 
                                        type="email" 
                                        x-model="profile.email" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                        required
                                    >
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                                    <input 
                                        type="tel" 
                                        x-model="profile.phone" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                    >
                                </div>
                                <button 
                                    type="submit" 
                                    class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition"
                                >
                                    Update Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Security Settings -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-900">
                            <i class="fas fa-lock mr-2"></i>Security
                        </h3>
                        <form @submit.prevent="changePassword">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Current Password</label>
                                    <input 
                                        type="password" 
                                        x-model="security.current_password" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                        required
                                    >
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">New Password</label>
                                    <input 
                                        type="password" 
                                        x-model="security.new_password" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                        required
                                    >
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                                    <input 
                                        type="password" 
                                        x-model="security.confirm_password" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                        required
                                    >
                                </div>
                                <button 
                                    type="submit" 
                                    class="w-full bg-red-600 text-white py-2 rounded-md hover:bg-red-700 transition"
                                >
                                    Change Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Preferences -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-900">
                            <i class="fas fa-cog mr-2"></i>Preferences
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span>Email Notifications</span>
                                <label class="switch">
                                    <input 
                                        type="checkbox" 
                                        x-model="preferences.email_notifications"
                                    >
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Dark Mode</span>
                                <label class="switch">
                                    <input 
                                        type="checkbox" 
                                        x-model="preferences.dark_mode"
                                    >
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <button 
                                @click="savePreferences"
                                class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition"
                            >
                                Save Preferences
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function accountSettings() {
            return {
                profile: {
                    name: '{{ Auth::user()->name }}',
                    email: '{{ Auth::user()->email }}',
                    phone: '{{ Auth::user()->phone ?? '' }}'
                },
                security: {
                    current_password: '',
                    new_password: '',
                    confirm_password: ''
                },
                preferences: {
                    email_notifications: true,
                    dark_mode: false
                },

                updateProfile() {
                    // Implement profile update logic
                    fetch('{{ route("account.update-profile") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(this.profile)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Profile updated successfully');
                        } else {
                            alert('Failed to update profile');
                        }
                    });
                },

                changePassword() {
                    // Validate password match
                    if (this.security.new_password !== this.security.confirm_password) {
                        alert('New passwords do not match');
                        return;
                    }

                    fetch('{{ route("account.change-password") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(this.security)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Password changed successfully');
                            // Clear password fields
                            this.security = {
                                current_password: '',
                                new_password: '',
                                confirm_password: ''
                            };
                        } else {
                            alert(data.message || 'Failed to change password');
                        }
                    });
                },

                savePreferences() {
                    fetch('{{ route("account.save-preferences") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(this.preferences)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Preferences saved successfully');
                        } else {
                            alert('Failed to save preferences');
                        }
                    });
                }
            }
        }
    </script>

    <!-- Custom Toggle Switch Styles -->
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    @endpush
</x-app-layout>