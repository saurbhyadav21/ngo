$(document).ready(function () {
// $('.owl-carousel').owlCarousel({
//     loop: false,
//     rewind: true,
//     margin: 10,
//     nav: true,
//     autoWidth: true,
//     stagePadding: 50, // gives a peek at next item
//     // responsive: {
//     //     1: {
//     //         items: 2,
//     //         stagePadding: 30
//     //     },
//     //     600: {
//     //         items: 3,
//     //         stagePadding: 40
//     //     },
//     //     1000: {
//     //         items: 5,
//     //         stagePadding: 50
//     //     }
//     // }
// });

$('.owl-carousel').owlCarousel({
    loop: false,
    rewind: true,
    margin: 10,
    nav: true,
    autoWidth: false, // set to false for uniform size
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 5
        }
    }
});

});

  function showInModal(img) {
        const modalImg = document.getElementById("modalImage");
        modalImg.src = img.src;
        modalImg.alt = img.alt;
    }
