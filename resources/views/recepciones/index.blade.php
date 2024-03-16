@extends('layouts.app')

@section('titulo', 'Recepciones')

@section('contenido')
    <div class="py-10">
        <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold my-5">Buscar y Filtrar Recepciones</h2>
        <livewire:filtrar-recepciones />
    </div>

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