<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
<div class="flex h-screen bg-gray-200 font-roboto">
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-white shadow hidden">
        @include('admin.partials.sidebar')
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('admin.partials.header')

        <button id="toggleSidebar" class="p-2 bg-blue-500 text-white">
            Toggle Sidebar
        </button>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">
                @yield('body')
            </div>
        </main>
    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleSidebar');
    const openBtn = document.getElementById('openSidebar'); // from header
    const overlay = document.getElementById('sidebarOverlay');
    const notifBtn = document.getElementById('toggleNotifications');
    const notifPanel = document.getElementById('notificationsPanel');
    const dropdownBtn = document.getElementById('toggleDropdown');
    const dropdownMenu = document.getElementById('dropdownMenu');

    // Toggle sidebar (extra button inside main content)
    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });
    }

    // Open sidebar (header button)
    if (openBtn && sidebar && overlay) {
        openBtn.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            overlay.classList.remove('hidden');
        });
    }

    // Close sidebar when overlay clicked
    if (overlay) {
        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    }

    // Notifications toggle
    if (notifBtn && notifPanel) {
        notifBtn.addEventListener('click', () => {
            notifPanel.classList.toggle('hidden');
        });
    }

    // Dropdown toggle
    if (dropdownBtn && dropdownMenu) {
        dropdownBtn.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    }
</script>

</body>
</html>
