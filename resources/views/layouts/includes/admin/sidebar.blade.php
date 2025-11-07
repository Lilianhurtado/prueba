@php
    $links = [
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-gauge',
            'href' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'header' => 'Administrar Páginas',
        ],
        [
            'name' => 'Menú Desplegable',
            'icon' => 'fa-solid fa-box',
            'active' => false,
            'submenu' => [
                [
                    'name' => 'Products',
                    'href' => '#',
                    'active' => false,
                ],
                [
                    'name' => 'Billing',
                    'href' => '#',
                    'active' => false,
                ],
                [
                    'name' => 'Invoice',
                    'href' => '#',
                    'active' => false,
                ],
            ],
        ],
    ];
@endphp

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                <li>
                    @isset($link['header'])
                        {{-- Es un encabezado de sección, no un enlace --}}
                        <div class="px-2 py-2 text-xs font-semibold text-gray-500 uppercase"> 
                            {{ $link['header'] }}
                        </div>
                    @elseif(isset($link['submenu']))
                        {{-- Es un menú desplegable, que requiere lógica de Livewire o Alpine.js --}}
                        <div class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group cursor-pointer">
                             <span class="w-6 h-6 inline-flex items-center justify-center text_gray-500"><i
                                class="{{$link['icon']}}"></i></span> 
                            <span class="ms-3">{{ $link['name'] }}</span>
                            {{-- Aquí iría la lógica del icono de flecha del menú desplegable --}}
                        </div>

                        {{-- Aquí iría el bloque del submenú (`@foreach ($link['submenu'] as $sub) ... @endforeach`) --}}
                        
                    @else
                        {{-- Es un enlace normal con href, icon y name --}}
                        <a href="{{ $link['href'] }}" 
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                            <span class="w-6 h-6 inline-flex items-center justify-center text_gray-500"><i
                                class="{{$link['icon']}}"></i></span> 
                            <span class="ms-3">{{ $link['name'] }}</span>
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</aside>