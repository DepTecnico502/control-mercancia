<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
        {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-qr3ydK4O.css') }}"> --}}
        @livewireStyles
        @stack('styles')
    </head>
    <body>
        <div class="navbar bg-base-100 bg-opacity-90 backdrop-blur shadow-lg fixed top-0 w-full z-50"> 
            @auth   
                <div class="flex-none">
                    <label for="my-drawer" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                </div>
            @endauth
            <div class="flex-1">
                <a class="btn btn-ghost text-xl">
                    @auth
                        {{ Auth::user()->name }}
                    @else
                        <img src="{{ asset('assets/img/logo.png') }}" width="100" alt="Logo">
                    @endauth
                </a>
            </div>
            <div class="flex-none">
                {{-- <button
                    data-toggle-theme="light,dark" data-act-class="ACTIVECLASS"
                    id="theme-toggle"
                    type="button"
                    class="btn btn-ghost btn-circle"
                    >
    
                    <svg id="theme-toggle-dark-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                    </svg>
    
                    <svg id="theme-toggle-light-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
                </button> --}}
                @auth   
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full">
                            <img alt="Tailwind CSS Navbar component" src="{{ asset('assets/img/icon_user.png') }}" />
                            </div>
                        </div>
                        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                            <li>
                            <a class="justify-between">
                                Profile
                            </a>
                            </li>
                            {{-- <li><a>Settings</a></li> --}}
                            <li><a href="{{ route('login.destroy') }}">Logout</a></li>
                        </ul>
                    </div>
                @else
                    <div class="flex-none">
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                                <div class="rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>                             
                                </div>
                            </div>
                            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                                <li><a href="{{ route('login.index') }}">Log In</a></li>
                                {{-- <li><a href="">Logout</a></li> --}}
                            </ul>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    
        <!-- Drawer -->
        <div class="drawer">
            <input id="my-drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
                <!-- Contenido de la págin -->
                <div class="w-full px-4 pt-20 md:px-20">
                    <div class="flex flex-col items-center gap-6">
                        <h1 class="font-title text-success text-3xl font-extrabold lg:text-4xl xl:text-6xl uppercase">@yield('titulo')</h1>
                    </div>
    
                    @yield('contenido')
                </div>
            </div> 
            <div class="drawer-side z-50">
                <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu p-4 w-80 min-h-full bg-base-100 text-base-content space-y-2">
                    <!-- LOGO -->
                    <div class="bg-base-100 sticky top-0 z-20 hidden items-center gap-2 bg-opacity-90 px-4 py-2 backdrop-blur lg:flex">
                        <a href="/" aria-current="page" aria-label="Homepage" class="flex-0 btn btn-ghost px-2" data-svelte-h="svelte-nce89e">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="120">
                            {{-- <div class="font-title inline-flex text-lg md:text-2xl">
                                502Business
                            </div> --}}
                        </a>  
                        <div tabindex="0" role="button" class="link link-hover inline-block font-mono text-xs">
                            1.0.0
                        </div>
                    </div>
                    <!-- Sidebar content here -->
                    <li>
                        <a
                            href="{{ route('dashboard.index') }}"
                            class="
                                {{ request()->routeIs([
                                        'dashboard.index',
                                    ]) ? 'active' : ''
                                }}"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                                </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <details 
                            {{ request()->routeIs
                                ([
                                    'recepcion.index',
                                    'recepcion.create',
                                    'partida.create'
                                ]) ? 'open' : 'close'
                            }}
                        >
                            <summary>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                </svg>                              
                                Recepciones
                            </summary>
                            <ul>
                                <li>
                                    <a 
                                        href="{{ route('recepcion.index') }}" 
                                        class="
                                        {{ request()->routeIs([
                                                'recepcion.index',
                                                'partida.create'
                                            ]) ? 'active' : ''
                                        }}"
                                    >
                                        Ver Recepciones
                                    </a>
                                </li>
                                <li>
                                    <a 
                                        href="{{ route('recepcion.create') }}"
                                        class="
                                        {{ request()->routeIs([
                                                'recepcion.create',
                                            ]) ? 'active' : ''
                                        }}"    
                                    >
                                        Crear Recepción
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details 
                            {{ request()->routeIs
                                ([
                                    'partida.index',
                                ]) ? 'open' : 'close'
                            }}
                        >
                            <summary>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                </svg>
                                Partidas
                            </summary>
                            <ul>
                                <li>
                                    <a 
                                        href="{{ route('partida.index') }}"
                                        class="
                                            {{ request()->routeIs([
                                                    'partida.index',
                                                ]) ? 'active' : ''
                                            }}"    
                                    >
                                        Ver Partidas
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details 
                            {{ request()->routeIs
                                ([
                                    'proveedores.index',
                                    'proveedores.crear',
                                ]) ? 'open' : 'close'
                            }}
                        >
                            <summary>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                  </svg>                                                  
                                Proveedores
                            </summary>
                            <ul>
                                <li>
                                    <a 
                                        href="{{ route('proveedores.index') }}" 
                                        class="
                                        {{ request()->routeIs([
                                                'proveedores.index'
                                            ]) ? 'active' : ''
                                        }}"
                                    >
                                        Ver Proveedores
                                    </a>
                                </li>
                                <li>
                                    <a 
                                        href="{{ route('proveedores.crear') }}"
                                        class="
                                        {{ request()->routeIs([
                                                'proveedores.crear',
                                            ]) ? 'active' : ''
                                        }}"    
                                    >
                                        Importar Proveedores
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details 
                            {{ request()->routeIs
                                ([
                                    'transportes.index',
                                    'transportes.crear',
                                ]) ? 'open' : 'close'
                            }}
                        >
                            <summary>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                  </svg>                          
                                Transportes
                            </summary>
                            <ul>
                                <li>
                                    <a 
                                        href="{{ route('transportes.index') }}" 
                                        class="
                                        {{ request()->routeIs([
                                                'transportes.index'
                                            ]) ? 'active' : ''
                                        }}"
                                    >
                                        Ver Transportes
                                    </a>
                                </li>
                                <li>
                                    <a 
                                        href="{{ route('transportes.crear') }}"
                                        class="
                                        {{ request()->routeIs([
                                                'transportes.crear',
                                            ]) ? 'active' : ''
                                        }}"    
                                    >
                                        Importar Transportes
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details 
                            {{ request()->routeIs
                                ([
                                    'usuarios.index',
                                    'usuario.create',
                                    'usuario.edit',
                                ]) ? 'open' : 'close'
                            }}
                        >
                            <summary>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                </svg>                                                          
                                Usuarios
                            </summary>
                            <ul>
                                <li>
                                    <a 
                                        href="{{ route('usuarios.index') }}" 
                                        class="
                                        {{ request()->routeIs([
                                                'usuarios.index',
                                                'usuario.edit'
                                            ]) ? 'active' : ''
                                        }}"
                                    >
                                        Ver Usuarios
                                    </a>
                                </li>
                                <li>
                                    <a 
                                        href="{{ route('usuario.create') }}"
                                        class="
                                        {{ request()->routeIs([
                                                'usuario.create',
                                            ]) ? 'active' : ''
                                        }}"    
                                    >
                                        Crear Usuarios
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </div>
        </div>
    
        <!-- Footer -->
        <footer class="py-10">
            <div class="flex flex-col items-center space-y-4 px-20 mx-auto md:space-y-0 md:flex-row md:justify-between">
                <div class="text-center text-sm text-slate-600">
                    © 502Business All Rights Reserved {{ now()->year }}
                </div>
                <div class="flex space-x-4">
                    <a href="">
                        <svg class="w-6 fill-current text-slate-600 duration-300 hover:text-blue-500" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z"/></svg>
                    </a>
                    <a href="">
                        <svg class="w-6 fill-current text-slate-600 duration-300 hover:text-green-500" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>WhatsApp</title><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </a>
                    <a href="">
                        <svg class="w-6 fill-current text-slate-600 duration-300 hover:text-pink-500" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                    </a>
                </div>
            </div>
        </footer>
        @vite('resources/js/app.js')
        {{-- <script src="{{ asset('build/assets/app-gkggixxs.js') }}"></script> --}}
        @livewireScripts
        @stack('scripts')
    </body>
</html>
