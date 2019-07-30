$(document).ready(function() {
  /*general js code*/
  $("img").attr("draggable", "false");
  $("input, textarea, select").prop("required", true);
  $(".btn-modal").click(function() {
    $("body").addClass("xy-noscroll");
    $(this).next().addClass("visible");
  });
  var profileDescription = $("#profilPage figcaption").outerHeight();
  $("#profilPage + main section .container").css("padding-top", profileDescription + 75 + 20); /*value padding top == figpcation + 1/2 height gambar + 20px*/
  $(".modal__close").click(function() {
    $(".modal-overlay").removeClass("visible");
    $("body").removeClass("xy-noscroll");
  });
  $("#showDetails").click(function() {
    $(this).prev().toggleClass("show");
  });
  $(window).scroll(function() {
    if($(document).scrollTop() > 50) {
      $('nav').addClass('navScrolled');
    }
    else {
      $('nav').removeClass('navScrolled');
    }
  });
  $("nav #brandNav box-icon").click(function() {
    $(this).parents("nav").toggleClass("navOpen");
  });
  $("#peraturanPage .nav-pills .nav-link:first-of-type").addClass("active").attr("aria-selected", "true")
  $("#peraturanPage .tab-content .tab-pane.fade:first-of-type").addClass("show active");
  $("#hargaDesktop .row > .col-12:first-of-type").addClass("bisnis");
  $("#hargaDesktop .row > .col-12:nth-of-type(2)").addClass("profesional");
  $("#hargaDesktop .row > .col-12:last-of-type").addClass("pemula");
  /*end of general js code*/
  /*plugin option down here*/
  $("#slideshowMobile").slick({
    dots: true,
    infinite: false,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: true,
    slidesToScroll: 1,
    rows: 2,
    slidesToShow: 1
  });
  $("#slideshowDesktop").slick({
    dots: true,
    infinite: false,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: true,
    slidesToScroll: 3,
    rows: 2,
    slidesToShow: 3
  });
  $("#faqMobile").slick({
    infinite: false,
    mobileFirst: true,
    dots: true,
    arrows: false,
    adaptiveHeight: true
  });
  $("#faqDesktop").slick({
    infinite: true,
    mobileFirst: true,
    dots: true,
    arrows: true,
    slidesToShow: 2,
    slidesPerRow: 2,
    centerPadding: "70px"
  });
  /*end of plugin option*/
});
