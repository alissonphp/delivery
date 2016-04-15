(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    var classDefault = "col m10 offset-m1 valign back-transp search-tools animated fadeInRight";
    var classItem = "col m10 offset-m1 valign back-transp search-item";

    $('.bt-search').click(function(){
      $(".search-tools").addClass('animated fadeOutLeft');
      setTimeout(function() {
        $(".search-tools").hide();
        $("#search-especialidades")
            .attr('style', 'display: block !important')
            .addClass('animated fadeInRight');
      }, 750);
    });

    $(".close-box").click(function(){
      var currentBox = $(this).parent();
      currentBox.addClass('fadeOutLeft');

      setTimeout(function(){
        currentBox
            .attr('class', classItem)
            .attr('style', 'display: none !important');
        $(".search-tools")
            .attr('class', classDefault)
            .attr('style', 'display: block !important');
      }, 750);
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space