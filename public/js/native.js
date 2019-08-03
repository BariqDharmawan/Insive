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
  else if (window.location.href.indexOf('custom/sheet') > -1) {
    $("body").attr("id", 'custom-sheet-page');
  }
  else if (window.location.href.indexOf('custom/fragrance') > -1) {
    $("body").attr("id", "custom-fragrance-page");
  }
  else {
    $("body").attr("id", window.location.pathname.replace('/', '') + '-page');
  }
});
