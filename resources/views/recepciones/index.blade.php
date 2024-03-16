@extends('layouts.app')

@section('titulo', 'Recepciones')

@section('contenido')
    <div class="py-10">
        <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold my-5">Buscar y Filtrar Recepciones</h2>
        <livewire:filtrar-recepciones />
    </div>
    @if (session()->has('mensaje'))
        <div role="alert" class="alert alert-success text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('mensaje') }}</span>
        </div>
    @endif
    <livewire:ver-recepcion>
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