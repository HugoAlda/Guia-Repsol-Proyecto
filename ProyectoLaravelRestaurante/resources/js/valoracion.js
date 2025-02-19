// document.addEventListener("DOMContentLoaded", function() {
//     const estrellas = document.querySelectorAll('.estrella');
//     const inputValoracion = document.getElementById('valoracion');

//     estrellas.forEach(function(estrella) {
//         estrella.addEventListener('click', function() {
//             const rating = this.getAttribute('data-value');
//             inputValoracion.value = rating;

//             // Actualiza visualmente las estrellas
//             estrellas.forEach(function(star) {
//                 if (star.getAttribute('data-value') <= rating) {
//                     star.textContent = '⭐';
//                 } else {
//                     star.textContent = '☆';
//                 }
//             });
//         });
//     });
// });
