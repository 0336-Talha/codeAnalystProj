/*_____ Toggle _____*/
$(document).on("click", ".toggle", function () {
  $(".toggle").toggleClass("active");
  $("body").toggleClass("flow");
  $("nav").toggleClass("active");
  $(".upperlay").toggleClass("active");
  $("nav > ul > li > .sub").slideUp();
});
w = $(window).width();
if (w <= 991) {
  $(document).on("click", "nav > ul > li.drop > a", function (e) {
    e.preventDefault();
    $(".sub").not($(this).parent().children(".sub").slideToggle()).slideUp();
  });
}
$(window).on("resize", function () {
  $("nav > ul > li > .sub").removeAttr("style");
});

let offset = 0;
$(function () {
  // header fix
  offSet = $("body").offset().top;
  offSet = offSet + 5;
  $(window).scroll(function () {
    scrollPos = $(window).scrollTop();
    if (scrollPos >= offSet) {
      $("header").addClass("fix");
    } else {
      $("header").removeClass("fix");
    }
  });
});


// testi-carousel
$(".testi-carousel").owlCarousel({
  autoplay: true,
  nav: false,
  navText: [
    '<i class="fa fa-arrow-left"></i>',
    '<i class="fa fa-arrow-right"></i>',
  ],
  // navText: [ 'prev', 'next' ],
  dots: true,
  loop: true,
  center: true,
  autoWidth: false,
  autoHeight: true,
  smartSpeed: 1000,
  autoplayTimeout: 10000,
  margin: 20,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1,
      autoplay: true,
      autoHeight: true,
      dots: true,
      nav: false,
    },
    600: {
      items: 1,
    },
    768: {
      items: 1,
      dots: true,
      nav: false,
    },
    1000: {
      items: 1,
    },
  },
});




/*_____ FAQ's _____*/
$(document).on("click", ".faqBlk > h5", function () {
  $(".faqBlk")
    .not($(this).parent().toggleClass("active"))
    .removeClass("active");
  $(".faqBlk > .txt")
    .not($(this).parent().children(".txt").slideToggle())
    .slideUp();
});




// // banner-carousel
// $(".banner-carousel").owlCarousel({
//   autoplay: true,
//   nav: true,
//   navText: [
//     '<i class="fa-solid fa-arrow-left-long"></i>',
//     '<i class="fa-solid fa-arrow-right-long"></i>',
//   ],
//   // navText: [ 'prev', 'next' ],
//   dots: false,
//   loop: true,
//   center: true,
//   autoWidth: false,
//   autoHeight: true,
//   smartSpeed: 1000,
//   autoplayTimeout: 10000,
//   margin: 20,
//   autoplayHoverPause: true,
//   responsive: {
//     0: {
//       items: 1,
//       autoplay: true,
//       autoHeight: true,
//       dots: true,
//       nav: false,
//     },
//     600: {
//       items: 2,
//     },
//     768: {
//       items: 2,
//       dots: true,
//       nav: false,
//     },
//     1000: {
//       items: 3,
//     },
//   },
// });



// $(document).ready(function () {
//   const bannerCarousel = $(".banner-carousel");

//   function updateCenterContent() {
//     // Remove content visibility from all items
//     $(".banner-carousel .item").removeClass("active-center");
//     $(".banner-carousel .item .image .content").css({
//       opacity: 0,
//       visibility: "hidden",
//       bottom: "-30%", // Move out of view
//     });

//     // Find the exact center item dynamically (even on page load)
//     const centerItem = $(".banner-carousel .owl-item.center .item");
//     if (centerItem.length) {
//       centerItem.addClass("active-center");
//       centerItem.find(".image .content").css({
//         opacity: 1,
//         visibility: "visible",
//         bottom: "40px", // Move into view
//       });
//     }
//   }

//   bannerCarousel
//     .owlCarousel({
//       autoplay: true,
//       nav: true,
//       navText: [
//         '<i class="fa-solid fa-arrow-left-long"></i>',
//         '<i class="fa-solid fa-arrow-right-long"></i>',
//       ],
//       dots: false,
//       loop: true,
//       center: true,
//       autoWidth: false,
//       autoHeight: true,
//       smartSpeed: 1000,
//       autoplayTimeout: 10000,
//       margin: 20,
//       autoplayHoverPause: true,
//       responsive: {
//         0: {
//           items: 1,
//           autoplay: true,
//           autoHeight: true,
//           dots: true,
//           nav: false,
//         },
//         600: {
//           items: 2,
//         },
//         768: {
//           items: 2,
//           dots: true,
//           nav: false,
//         },
//         1000: {
//           items: 3,
//         },
//       },
//     })
//     .on("initialized.owl.carousel", function () {
//       // Ensure the center content is shown when page loads
//       setTimeout(updateCenterContent, 200); // Add delay for rendering
//     })
//     .on("changed.owl.carousel", function () {
//       // Update content when carousel changes
//       setTimeout(updateCenterContent, 200); // Add delay for rendering
//     });

//   // Ensure content is updated on page load itself (for the initial center item)
//   setTimeout(updateCenterContent, 200); // Delay to ensure rendering
// });


$(document).ready(function () {
  const bannerCarousel = $(".banner-carousel");

  function updateCenterContent() {
    // Remove content visibility from all items
    $(".banner-carousel .item").removeClass("active-center");
    $(".banner-carousel .item .image .content").css({
      opacity: 0,
      visibility: "hidden",
      bottom: "-30%", // Move out of view
    });

    // Remove border from all images
    $(".banner-carousel .item .image img").css({
      borderTop: "10px solid transparent",
      borderBottom: "10px solid transparent",
    });

    // Find the exact center item dynamically
    const centerItem = $(".banner-carousel .owl-item.center .item");
    if (centerItem.length) {
      centerItem.addClass("active-center");
      centerItem.find(".image .content").css({
        opacity: 1,
        visibility: "visible",
        bottom: "40px", // Move into view
      });

      // Add border to the center item image
      centerItem.find(".image img").css({
        borderTop: "10px solid var(--blue)",
        borderBottom: "10px solid var(--blue)",
      });
    }
  }

  bannerCarousel
    .owlCarousel({
      autoplay: true,
      nav: true,
      navText: [
        '<i class="fa-solid fa-arrow-left-long"></i>',
        '<i class="fa-solid fa-arrow-right-long"></i>',
      ],
      dots: false,
      loop: true,
      center: true,
      autoWidth: false,
      autoHeight: true,
      smartSpeed: 1000,
      autoplayTimeout: 10000,
      margin: 20,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1,
          autoplay: true,
          autoHeight: true,
          dots: true,
          nav: false,
        },
        600: {
          items: 2,
        },
        768: {
          items: 2,
          dots: true,
          nav: false,
        },
        1000: {
          items: 3,
        },
      },
    })
    .on("initialized.owl.carousel", function () {
      // Ensure the center content is shown when page loads
      setTimeout(updateCenterContent, 200); // Add delay for rendering
    })
    .on("changed.owl.carousel", function () {
      // Update content when carousel changes
      setTimeout(updateCenterContent, 200); // Add delay for rendering
    });

  // Ensure content is updated on page load itself (for the initial center item)
  setTimeout(updateCenterContent, 200); // Delay to ensure rendering
});

// popup

$(document).on("click", ".popBtn", function () {
  var popUp = $(this).data("popup");
  $("body").addClass("flow");
  $(".popup[data-popup= " + popUp + "]").fadeIn();
});
$(document).on("click", ".crosBtn", function () {
  $(".popup").fadeOut();
  $("body").removeClass("flow");
});


$(document).ready(function () {
       
  $('.bttn').click(function () {
     
      let id = $(this).data('id');
      console.log(id);

      $.ajax({
          url: '/getportfolio/' +id, // Laravel Route
          type: 'GET',
          success: function (data) {
              // console.log(data);
                            // ✅ Image Set Karna
          $('#popupImage').attr('src', '/storage/portfolio/' + data.image); 

// ✅ Title Set Karna
$('#pro_title').text(data.heading);

// ✅ Description Set Karna (HTML render ke liye .html())
$('#pro_description').html(data.discription);

// ✅ Modal Show Karna
$('.popup[data-popup="project"]').fadeIn();

              
          },
          error: function () {
              alert('Something went wrong!');
          }
      });
     
  });
});