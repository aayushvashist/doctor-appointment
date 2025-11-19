<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <!-- Left Section (Logo + Navigation Links) -->
            <div class="flex items-center space-x-10">

                <!-- Logo -->
                <a href="{{ route('doctors.index') }}" class="font-bold text-xl text-gray-700">
                    DoctorApp
                </a>

                <!-- Navigation Links -->
                <div class="hidden sm:flex space-x-8">

                    <a href="{{ route('doctors.index') }}"
                       class="text-gray-700 hover:text-blue-600 font-medium">
                        Doctors
                    </a>

                    <a href="{{ route('doctors.create') }}"
                       class="text-gray-700 hover:text-blue-600 font-medium">
                        Add Doctor
                    </a>

                    <a href="#"
                       class="text-gray-700 hover:text-blue-600 font-medium">
                        Specializations
                    </a>

                    <a href="#"
                       class="text-gray-700 hover:text-blue-600 font-medium">
                        Appointments
                    </a>

                </div>
            </div>

            <!-- Hamburger button for mobile -->
            <div class="sm:hidden flex items-center">
                <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden');"
                    class="text-gray-600 p-2">
                    ☰
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden sm:hidden bg-gray-100 p-3 space-y-2">

        <a href="{{ route('doctors.index') }}"
           class="block text-gray-700 font-medium">
            Doctors
        </a>

        <a href="{{ route('doctors.create') }}"
           class="block text-gray-700 font-medium">
            Add Doctor
        </a>

        <a href="#"
           class="block text-gray-700 font-medium">
            Specializations
        </a>

        <a href="#"
           class="block text-gray-700 font-medium">
            Appointments
        </a>
        
    </div>
</nav>
