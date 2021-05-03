jQuery(document).ready(function($){

  sticky_navigation();
  $(window).on("scroll",function(){
    sticky_navigation();
  });


  function sticky_navigation() {
    var stickyDiv = "sticky";
    var  yourHeader = $('#site-header').height() + 50;

    if( $(window).scrollTop() > yourHeader ) {
      $('#site-header').addClass(stickyDiv);
    } else {
      $('#site-header').removeClass(stickyDiv);
    }
  }

  
  change_footer_style();
  change_column_style();
  $(window).on("resize",function(){
    change_column_style();
    change_footer_style();
  });

  function change_footer_style() {
    if( $("#footcol1").length > 0 ) {
      var footWidth = $("#site-footer .section-inner").width();
      var footcol1 = $("#footcol1").outerWidth(); 
      var footcol2 = (footWidth - footcol1) - 20;
      $("#footcol2").css("width",footcol2+"px");
    }
  }

  function change_column_style() {
    if( $(".panel-grid .panel-grid-cell").length>1 ) {
      var highestBox = 0;
      $(".panel-grid .panel-grid-cell").each(function(){
        var target = $(this);
        if( $(this).find(".theme-button").length>0 ) {
          var countBtn = $(this).find(".theme-button").length;
          if(countBtn==1) {
            target.addClass("has-button");
            target.parents(".panel-grid").addClass("flex");
            // $(this).each(function(){
            //   if($(this).height() > highestBox){  
            //       highestBox = $(this).height();  
            //   }
            // })
            //$(this).height(highestBox);
          }
        }
      });
    }
  }

  $("#primary-menu li.menu-item-has-children").hover(
    function(){
      $("#site-header").addClass("navHovered");
    }, function(){
      $("#site-header").removeClass("navHovered");
    }
  );

  $("#mobileMenu").click(function(e){
    e.preventDefault();
    $(this).toggleClass("open");
    $('body').toggleClass("mobileMenuOpen");
  });

  $(document).on("click",".menu-backdrop",function(e){
    e.preventDefault();
    $("#mobileMenu").removeClass("open");
    $("body").removeClass("mobileMenuOpen");
  });

  $(".menu-item a").each(function(){
    if( $(this).find(".fa-search").length>0 ) {
      $(this).addClass("searchButton");
    }
  });


  $(document).on("click",".searchButton",function(e){
    e.preventDefault();
    $("#searchForm").addClass("show fadeInDown");
    $("#searchForm input.search-field").focus();
  });

  $(document).on("click","#closeSrchForm",function(e){
    e.preventDefault();
    $("#searchForm").removeClass("show");
  });

  $(document).on("click","#primary-menu li.menu-item-has-children > a",function(e){
    e.preventDefault();
    $(this).parent().toggleClass("show-children");
  });
  
});