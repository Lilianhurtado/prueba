<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    ['name' => 'Profile'],
]">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard Administrativo</h1>
        <p>Bienvenido al panel de administración</p>
    </div>
</x-admin-layout>
