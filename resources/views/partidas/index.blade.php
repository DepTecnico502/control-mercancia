@extends('layouts.app')

@section('titulo', 'Partidas')
    
@section('contenido')
    {{-- Mensaje --}}
    <div class="py-5">
        @if (session()->has('mensaje'))
            <div role="alert" class="alert alert-success text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('mensaje') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div role="alert" class="alert alert-error text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif
    </div>

    {{-- Filtro --}}
    <livewire:filtrar-partidas>

    {{-- Tabla --}}
    <livewire:ver-partidas>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el modal
            var modal = document.getElementById('my_modal_2');

            // Obtener la imagen dentro del modal
            var modalImg = document.getElementById("imagenModalSrc");

            // Obtener todas las imágenes con la clase "imagen-modal"
            var imgs = document.getElementsByClassName('imagen-modal');

            // Agregar un controlador de eventos a cada imagen
            Array.from(imgs).forEach(function(img) {
                img.addEventListener('click', function() {
                    // Obtener la URL de la imagen clicada
                    var imgSrc = this.src;

                    // Asignar la URL de la imagen al src del elemento de imagen dentro del modal
                    modalImg.src = imgSrc;

                    // Mostrar el modal
                    modal.showModal();
                });
            });
        });
    </script>
@endpush