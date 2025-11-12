<div class ="flex items-center space-x-2">
    {{-- Botón editar: si es protegido no hace nada, si no lo es va a la ruta de edición --}}
    @if($role->id > 9)
        <x-wire-button href="{{ route('admin.roles.edit', $role)}}" blue xs>
            <i class = "fa-solid fa-pen-to-square"></i>
        </x-wire-button>
    @else
        <button type="button" onclick="event.preventDefault()" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-500 px-2 py-2 text-xs font-semibold text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <i class = "fa-solid fa-pen-to-square"></i>
        </button>
    @endif

    {{-- Botón eliminar: siempre muestra la misma confirmación; si es protegido no se borra --}}
    <button
        type="button"
        data-role-id="{{ $role->id }}"
        data-role-name="{{ $role->name }}"
        data-protected="{{ $role->id <= 9 ? 1 : 0 }}"
        onclick="confirmDelete(this)"
        class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-2 py-2 text-xs font-semibold text-white shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>

@push('scripts')
<script>
    function confirmDelete(button) {
        event.preventDefault();
        const roleId = button.dataset.roleId;
        const roleName = button.dataset.roleName;
        const isProtected = button.dataset.protected === '1';

        Swal.fire({
            icon: 'warning',
            title: '¿Estás seguro?',
            text: isProtected
                ? `Este es un rol del sistema: "${roleName}". No se puede eliminar.`
                : `¿Deseas eliminar el rol "${roleName}"? Esta acción no se puede deshacer.`,
            confirmButtonText: isProtected ? 'Entendido' : 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            showCancelButton: !isProtected
        }).then((result) => {
            if (result.isConfirmed && !isProtected) {
                // Crear y enviar el formulario de eliminación para roles no protegidos
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("admin.roles.destroy", ":id") }}'.replace(':id', roleId);
                form.innerHTML = `@csrf @method('DELETE')`;
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endpush