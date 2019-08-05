$(document).ready(function(){
  $("#show-menu").click(function(e) {
    e.preventDefault();
    $("nav").addClass("menu-visible");
  });
  $("#close-menu").click(function(e) {
    e.preventDefault();
    $("nav").removeClass("menu-visible");
  });

  if (window.location.pathname === '/') {
    $("body").attr("id", "landing-page");
  }
  else if (window.location.href.indexOf('catalog/selected') > -1) {
    $("body").attr("id", "catalog-selected-page");
  }
  else {
    $("body").attr("id", window.location.pathname.replace('/', '') + '-page');
  }
});
