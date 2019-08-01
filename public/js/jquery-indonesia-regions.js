(function ($){
  $.fn.jqueryIndonesiaRegions = function(options){
    var settings = $.extend({
      type: "city"
    }, options);

    if (settings.type === "city"){
      var cities = {
        'Sumedang': 'Sumedang',
        'Bandung': 'Bandung',
        'Jakarta': 'Jakarta'
      };

      for(var city_val in cities) {
          $('<option />', {value: city_val, text: cities[city_val]}).appendTo(this);
      }

      return this;
    }
    if (settings.type === "island"){
      var islands = {
        'Jawa': 'Jawa',
        'Sumatra': 'Sumatra',
        'Sulawesi': 'Sulawesi'
      };

      for(var island_val in islands) {
          $('<option />', {value: island_val, text: islands[island_val]}).appendTo(this);
      }

      return this;

    }
    if (settings.type === "province"){
      var provinces = {
        'Jawa Barat': 'Jawa Barat',
        'Sumatra Utara': 'Sumatra Utara',
        'Sulawesi Tengah': 'Sulawesi Tengah'
      };

      for(var province_val in provinces) {
          $('<option />', {value: province_val, text: provinces[province_val]}).appendTo(this);
      }
      return this;
    }
  };
}(jQuery));