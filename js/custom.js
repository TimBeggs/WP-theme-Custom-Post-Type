jQuery(function() {
//Use for Responsive Menu    
    var nav_menu = jQuery(".navbar > ul").html();

    jQuery('.navbar').append('<span class="responsive_btn"></span></div>');
    jQuery('body').prepend('<div class="res_overlay"><div class="respon_lay"></div><div class="responsive_nav"></div></div>');
    jQuery(".responsive_nav").append('<ul>'+nav_menu+'</ul>');

    jQuery(document).on('click','.responsive_btn',function(e) {
        jQuery('body').addClass('responsive');
    });

    jQuery('.responsive_nav .menu-item-has-children > a').after('<a href="javascript:void(0)" class="dropdown-toggle"></a>');

    jQuery('.responsive_nav .menu-item-has-children > .dropdown-toggle').click(function(e){
    e.preventDefault();
    jQuery(this).siblings('.sub-menu').slideToggle('slow');
    });

    jQuery('.respon_lay').click(function () {
        jQuery('body').removeClass('responsive');
    });

// contact button class add    
    jQuery('.navbar .contact-btn a').addClass('btn-theme-transparent');

//Search
    jQuery('.header-sec').on('click','.search-btn a', function (e) {
        e.preventDefault();
        jQuery(this).parent().toggleClass('close-btn')
        jQuery('.header-top-search').slideToggle('slow');
    });
//Logos Slider
    jQuery('#retailers-logos .owl-carousel').owlCarousel({
    loop:true,
    autoHeight:true,
    margin:15,
    dots: false,
    nav:false,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:4,
            nav:false
        },
        1000:{
            items:7,
            nav:false,
            loop:true
        }
    }
    });

    // Find form class

    $('.lp-left-part form .wpcf7-submit').click(function(){

        $('body.page-template-template-landing-page').addClass('formVal');

    })

    //Find Thank you Page

      $thank_pg_length = $('body').find('.thank-pg').length;

      if ($thank_pg_length == 1) {
          $('body').addClass('thank-you-pg');
      } else {
           $('body').removeClass('thank-you-pg');
      }

});

// Client List Gallery

jQuery(function() {

    $('#list-cat-buttons a').click(function(){
        let cl_cat = $(this).attr('data-cat');
        $('#list-cat-buttons a').removeClass('active');
        $(this).addClass('active');

        if (cl_cat == 'all') {
            $('#cat-list-gallery .item'). fadeIn('slow');
        }else{
            $('#cat-list-gallery .item'). fadeOut('slow');
            $('.' + cl_cat).fadeIn('slow');
        }

    });

// Ajax used

    $( ".catSection select" ).change(function() {
        var catSlug = $('.cat-select').val(),
            orgSlug = $('.org-select').val();
        $('.ajax-load').addClass('loading');
        jQuery.ajax({
            type: "post", 
            dataType: "html", 
            url: ajax_url, 
            data: {
                action: "get_webCategories",
                catSlug: catSlug, 
                orgSlug: orgSlug
            }, 
            success: function (response) {
                $('.ajax-load').html(response);
                $('.ajax-load').removeClass('loading');
            }
        });
      });

    $( ".podcastSection select" ).change(function() {
      var catSlug = $('.podcast-select').val();
      $('.ajax-load').addClass('loading');
      jQuery.ajax({
          type: "post", 
          dataType: "html", 
          url: ajax_url, 
          data: {
              action: "get_podcastCategories",
              catSlug: catSlug, 
          }, 
          success: function (response) {
              $('.ajax-load').html(response);
              $('.ajax-load').removeClass('loading');
          }
      });
    });

    $(document).on('click', 'form.Object-search-form span', function() {
        $('form.Object-search-form').submit();
    })

    // $(document).on('keyup', 'form.Object-search-form input', function() {
    //     var searchKey = $(this).val();
    //     console.log(searchKey)
    //     if(searchKey) {
    //         $('.ajax-load').addClass('loading');
    //         jQuery.ajax({
    //           type: "post", 
    //           dataType: "html", 
    //           url: ajax_url, 
    //           data: {
    //               action: "get_retailSolutionsCategories",
    //               catSlug: searchKey, 
    //           }, 
    //           success: function (response) {
    //               $('.ajax-load').html(response);
    //               $('.ajax-load').removeClass('loading');
    //           }
    //         });
    //     }
    // })
     $( ".retailSolutionsSection select" ).change(function() {
        var catSlug = $('.retail-solutions-select').val();

        var path = window.location.pathname;

        if(catSlug) {
            var newurl = window.location.protocol + "//" + window.location.host + '/sophelle/retail-solutions/' + '' + catSlug;
        } else {
            var newurl = window.location.protocol + "//" + window.location.host + '/sophelle/retail-solutions/';
        }
        window.history.pushState({path:newurl},'',newurl);
        $('.ajax-load').addClass('loading');
        jQuery.ajax({
          type: "post", 
          dataType: "html", 
          url: ajax_url, 
          data: {
              action: "get_retailSolutionsCategories",
              catSlug: catSlug, 
          }, 
          success: function (response) {
              $('.ajax-load').html(response);
              $('.ajax-load').removeClass('loading');
          }
        });
    });

    //Success Stories

        $( ".ajax-loadMore a" ).on('click', function() {
        var live_termid = $('#cat-list-gallery').attr('live-termid');
        var par_page = parseInt($('#cat-list-gallery').attr('par-page'));
        var live_page = parseInt($(this).attr('live-page'));
        var temp_page = live_page + par_page;

        $(this).text('Loading...')

        $('.ajax-load').addClass('loading');
        jQuery.ajax({
            type: "post", 
            dataType: "html", 
            url: ajax_url, 
            data: {
                action: "get_ajaxLoadMore",
                live_termid: live_termid, 
                live_page: live_page,
                par_page: par_page
            }, 
            success: function (response) {
                console.log(response);
                $( ".ajax-loadMore a" ).attr('live-page', temp_page);
                $( ".ajax-loadMore a" ).text('Load More');
                $('.ajax-load ul').html(response);
                $('.ajax-load').removeClass('loading');
                loadMoreAjax();
            }
        });
    });

    $( ".load-parTag a" ).on('click', function() {
        var termID = $(this).attr('termID');
        $(this).parent().children().removeClass('active')
        $(this).addClass('active');

        $('.ajax-load').addClass('loading');
        jQuery.ajax({
            type: "post", 
            dataType: "html", 
            url: ajax_url, 
            data: {
                action: "get_ajaxLoadPerTag",
                termID: termID, 
            }, 
            success: function (response) {
                console.log(response);
                $( ".ajax-loadMore a" ).attr('live-page', 6);
                $('.ajax-load').html(response);
                $('.ajax-load').removeClass('loading');
                loadMoreAjax();
            }
        });
    });

    loadMoreAjax();

    function loadMoreAjax() {
        var total_post = parseInt($('#cat-list-gallery').attr('total-post'));
        var live_page = parseInt($('.ajax-loadMore a').attr('live-page'));
        if(live_page >= total_post) {
            $('.ajax-loadMore a').css('display', 'none');
        } else {
            $('.ajax-loadMore a').css('display', 'block');
        }
    }

});

jQuery( window ).on( "load", function() {
    
// Blog page word
jQuery(".c-blog-lists .post-content p").html(function() { 
    return jQuery(this).html().replace("The Challenge", "The Challenge: ");  
});

});

 // Sticky Header

 var scrollIng=false;
 jQuery(window).scroll(function() {
     //console.log('Scrolling');
     //
    if (jQuery(document).scrollTop() > 170) {
        //
        if(!scrollIng){
            syncContainer(false)
        }
        //
        jQuery('.c-header-stickymenu').fadeIn('fast');
        scrollIng = true;
    }
    else {
        //
        if(scrollIng){
            syncContainer(true)
        }
        //
        jQuery('.c-header-stickymenu').fadeOut('fast');
        scrollIng = false;
    }
});
jQuery(function () {
    syncContainer(false)
});

function syncContainer(towardParent){
    //
    var $parent=jQuery(".c-header");
    var $child=jQuery(".c-header-stickymenu");
    if(towardParent){
        $parent.html($child.children().clone())
    }else{
        $child.html($parent.children().clone())
    }
}