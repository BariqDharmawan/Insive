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
  else if (window.location.href.indexOf('catalog/selected') > -1) { //jika url catalog/selected/{parameter}
    $("body").attr("id", "catalog-selected-page");
  }
  else if (window.location.href.indexOf('custom/package') > -1) { //jika url custom/package/{parameter}
    $("body").attr("id", 'custom-package-page');
  }
  else {
    $("body").attr("id", window.location.pathname.replace('/', '') + '-page');
  }
});
