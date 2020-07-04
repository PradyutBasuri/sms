var baseUrl = window.location.hostname+'/';

// mCustomScrollbar 
(function ($) {
    $(window).on("load", function () {

        $("#content-1").mCustomScrollbar({
            theme: "minimal"
        });

    });
})(jQuery);





// Prodile Image Upload
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function () {
  //  readURL(this);
});


function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview_resume').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview_resume').hide();
            $('#imagePreview_resume').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload_resume").change(function () {
    previewImage(this);
});



// Clients’ experience Slider
var swiper = new Swiper('.swiper-container.client-experience-slider', {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: false,
    // loopFillGroupWithBlank: true,
    // pagination: {
    //     el: '.swiper-pagination',
    //     clickable: true,
    // },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        200: {
            slidesPerView: 1,
            spaceBetween: 20,
        },

        576: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
    }
});


// Header Fixed
$(function () {
    $(window).on("scroll", function () {
        if ($(window).scrollTop() > 50) {
            $(".header-home").addClass("fixed_header");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
            $(".header-home").removeClass("fixed_header");
        }
    });
});

// Dropdown Slider
$('.dropdown').on('show.bs.dropdown', function (e) {
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
});

$('.dropdown').on('hide.bs.dropdown', function (e) {
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
});

//toggle two classes on button element
$('.input_icon').on('click', function () {
    $('body').toggleClass('overflow-hide');
});




// resent_job_slider
var swiper = new Swiper('.swiper-container.resent_job_slider_js', {
    slidesPerView: 4,
    spaceBetween: 40,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        200: {
            slidesPerView: 1,
            spaceBetween: 20,
        },

        576: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1850: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
    },
});

// talent_ slider
var swiper = new Swiper('.swiper-container.talent_sec_slider', {
    slidesPerView: 4,
    spaceBetween: 40,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        200: {
            slidesPerView: 1,
            spaceBetween: 20,
        },

        576: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1850: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
    },
});


// latents_slider
var swiperTalents = new Swiper('.swiper-container.talents_slider', {
    // centeredSlides: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        200: {
            slidesPerView: 1,
            spaceBetween: 20,
        },

        576: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1850: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
    },
});


jQuery(".talent_btn").click(function () {
    // setTimeout(() => {
    //     swiperTalents.init();
    //     swiper.update();
    // }, 10);

    setTimeout(function () { swiperTalents.resizeFix(true) }, 100)
});

// $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
//     var paneTarget = $(e.target).attr('href');
//     var $thePane = $('.tab-pane' + paneTarget);
//     var paneIndex = $thePane.index();
//     if ($thePane.find('.swiper-container').length > 0 && 0 === $thePane.find('.swiper-slide-active').length) {
//         swiperTalents[paneIndex].update();
//     }
// });

// 
// document.querySelector('.prepend-2-slides').addEventListener('click', function (e) {
//     e.preventDefault();
//     swiper.prependSlide([
//         '<div class="swiper-slide">Slide ' + (--prependNumber) + '</div>',
//         '<div class="swiper-slide">Slide ' + (--prependNumber) + '</div>'
//     ]);
// });



$(document).ready(function () {

    // password show hide
    // $(".click_hideshow").click(function () {
    //     $(".click_hideshow").toggleClass("add_img");
    // });
    // $("#password_showhide_cnfrm").click(function () {
    //     $("#password_showhide_cnfrm").toggleClass("add_img");
    // });
    // $("#password_showhide_new").click(function () {
    //     $("#password_showhide_new").toggleClass("add_img");
    // });


    // show hide
    $('.email_btn_id').on('click', function () {
        if ($('.frm_id_show').css('opacity') == 0) {
            $('.frm_id_show').css('opacity', 1);
        }
        else {
        }
        $(".email_btn_id").addClass("hide_div");
        $(".or_text").addClass("hide_div");
    });
});

// ToolTip
// Tooltips Initialization
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})


//Animate
AOS.init({
    // disable: 'mobile',
    once: true,
});

// Sidebar
$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("body").toggleClass("toggled");
});





//jQuery plugin
$(document).ready(function () {
   
    
    $.fn.uploader = function( options ) {
      var settings = $.extend({
        MessageAreaText: "No files selected.",
        // DefaultErrorMessage: "Unable to open this file.",
        // BadTypeErrorMessage: "We cannot accept this file type at this time.",
        acceptedFileTypes: ['pdf', 'doc', 'docx']
      }, options );



   
      var uploadId = 1;
      //update the messaging 
       $('.file-uploader__message-area p').text(options.MessageAreaText || settings.MessageAreaText);
      
      //create and add the file list and the hidden input list
      // var fileList = $('<ul class="file-list"></ul>');
      // var hiddenInputs = $('<div class="hidden-inputs hidden"></div>');
      // $('.file-uploader__message-area').after(fileList);
      // $('.file-list').after(hiddenInputs);
      
     //when choosing a file, add the name to the list and copy the file input into the hidden inputs
      $('.file-chooser__input').on('change', function(){

        var fileExtension = ['doc', 'docx', 'pdf'];
                    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1)
                    {
                        Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: 'Allow only PDF,DOC,DOCX',
                        });
                        return false; 
                    }

         var file = $('.file-chooser__input').val();
         var fileName = (file.match(/([^\\\/]+)$/)[0]);
 
        //clear any error condition
        $('.file-chooser').removeClass('error');
        $('.error-message').remove();
        
        //validate the file
        var check = checkFile(fileName);
        if(check === "valid") {


          
          // move the 'real' one to hidden list 
          $('.hidden-inputs').append($('.file-chooser__input')); 
        
          //insert a clone after the hiddens (copy the event handlers too)
          $('.file-chooser').append($('.file-chooser__input').clone({ withDataAndEvents: true})); 

            var token = $("input[name='_token']").val();
            var fd = new FormData();
            var imageUpload_resume=$('#imageUpload_resume')[0].files;

            for(var i=0;i<imageUpload_resume.length;i++)
                {
                    //$('.file-chooser__input').after('<p class="error-message">Invalid File</p>');
                    fd.append(['imageUpload_resume['+i+']'], imageUpload_resume[i]);
                }
            fd.append('_token', token);

            //ajax file upload
            
            $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: 'user-upload-file',
            data: fd,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(result) {
            if(result.status==1)
            {
              $('.file-list').append('<li id="rmv'+result.id+'" style="display: none;"><span class="file-list__name">' + result.total_file + '</span><button class="removal-button" data-uploadid="'+ result.id +'" ></button></li>');
              $('.file-list').find("li:last").show(800);
              $('#imageUpload_resume').val('');
              Swal.fire({
                icon: 'success',
                title: 'Success',
                html: 'Resume uploaded successfully',
                footer: ''
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                    });
            }
            else
            {
                Swal.fire({
                icon: 'error',
                title: 'Error',
                html: result.message,
                });
            }

            },
            error: function(jqXHR, textStatus, errorThrown) {
            var msg = "";
            if (jqXHR.status !== 422 && jqXHR.status !== 400) {
            msg += "<strong>" + jqXHR.status + ": " + errorThrown + "</strong>";
            } else {
            if (jqXHR.responseJSON.hasOwnProperty('exception')) {
            msg += "Exception: <strong>" + jqXHR.responseJSON.exception_message + "</strong>";
            } else {
            msg += "<strong><ul>";
            var count = 0;
            $.each(jqXHR.responseJSON['errors'], function(key, value) {
            count++;
            msg += "<li>" + value + "</li>";
            });
            msg += "</ul></strong>";
            }
            }
            Swal.fire({
                icon: 'error',
                title: '',
                html: msg,
                footer: ''
                });
            }
            });


        
          //add the name and a remove button to the file-list
          // $('.file-list').append('<li style="display: none;"><span class="file-list__name">' + fileName + '</span><button class="removal-button" data-uploadid="'+ uploadId +'"></button></li>');
          // $('.file-list').find("li:last").show(800);
         
          //removal button handler
          //$('.removal-button').on('click', function(e){
        //     $(document).on('click', '.removal-button', function (e) {
        //     e.preventDefault();

        //     var data = $(this).data('uploadid');
        //     $.ajax({
        //     type: 'GET',
        //     url: "user-remove-resume/"+data,
        //     data: {},
        //     processData: false,
        //     success: function(result) {
                
        //         if(result.status==1)
        //         {
        //             $('#rmv'+data).remove(); 
                   
        //             //remove the corresponding hidden input
        //             //$('.hidden-inputs input[data-uploadid="'+ data +'"]').remove(); 
                  
        //             //remove the name from file-list that corresponds to the button clicked
        //             //$(this).parent().hide("puff").delay(10).queue(function(){$(this).remove();});
                    
        //             //if the list is now empty, change the text back 
                    

        //         }
        //     },
        //     error: function(jqXHR, textStatus, errorThrown) {}
        //     });

        //   });
        
          //so the event handler works on the new "real" one
          $('.hidden-inputs .file-chooser__input').removeClass('file-chooser__input').attr('data-uploadId', uploadId); 
        
          //update the message area
          $('.file-uploader__message-area').text(options.MessageAreaTextWithFiles || settings.MessageAreaTextWithFiles);
          
          uploadId++;
          
        } else {
          //indicate that the file is not ok
          $('.file-chooser').addClass("error");
          var errorText = options.DefaultErrorMessage || settings.DefaultErrorMessage;
          
          if(check === "badFileName") {
            errorText = options.BadTypeErrorMessage || settings.BadTypeErrorMessage;
          }
          
          $('.file-chooser__input').after('<p class="error-message">'+ errorText +'</p>');
        }
      });
      
      var checkFile = function(fileName) {
        var accepted          = "invalid",
            acceptedFileTypes = this.acceptedFileTypes || settings.acceptedFileTypes,
            regex;
 
        for ( var i = 0; i < acceptedFileTypes.length; i++ ) {
          regex = new RegExp("\\." + acceptedFileTypes[i] + "$", "i");
 
          if ( regex.test(fileName) ) {
            accepted = "valid";
            break;
          } else {
            accepted = "badFileName";
          }
        }
 
        return accepted;
     };
   }; 
 }( jQuery ));
 
 //init 
 $(document).ready(function(){
   $('.fileUploader').uploader({
     MessageAreaText: "No files selected. Please select a file."
   });
 });
  
// Search Mobile
var sp = document.querySelector('.search-open');
var searchbar = document.querySelector('.search-inline');
var shclose = document.querySelector('.search-close');
function changeClass() {
    searchbar.classList.add('search-visible');
}
function closesearch() {
    searchbar.classList.remove('search-visible');
}
sp.addEventListener('click', changeClass);
shclose.addEventListener('click', closesearch);


// Select Tags
 $(".tag_the_job_list").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})

$(".skillsTag_list").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})

$(".addSkiils_sec").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})

$(".addLanguage").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})

$(".addskills_modal").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})


// ADd tag body add class
$(document).ready(function(){
    $("#addTag_clss").click(function(){
      $("body").addClass("backgnd_hide");
    });
    // $("#remove_menu").click(function(){
    //     $("body").addClass("f");
    // });

    // $(".addtag_list").select2({
    //     tags: true,
    //     tokenSeparators: [',', ' ']
    // })
    $("#createNewTag_btn").click(function(){
        $("body").addClass("backgnd_hide");
    });
});



// Calender Start


// Calender ENd


// Notification 
$(document).ready(function(){
    $(".sidebarBtn_noti").click(function(){
      $('.sidebar_noti').toggleClass("active_noti");
      $('.sidebarBtn_noti').toggleClass('toggle')
    })
})

// Pipeline Start
$( init );
function init() {
  $( ".droppable-area1, .droppable-area2, .droppable-area3, .droppable-area4, .droppable-area5, .droppable-area6,.droppable-area7" ).sortable({
      connectWith: ".connected-sortable",
      stack: '.connected-sortable ul'
    }).disableSelection();
}
// Pipeline End


// Multiselect
$(document).ready(function() {
    $('#example-enableCollapsibleOptGroups-enableClickableOptGroups-enableFiltering-includeSelectAllOption').multiselect({
        enableClickableOptGroups: true,
        enableCollapsibleOptGroups: true,
        enableFiltering: true,
        includeSelectAllOption: true
    });
});
// Multiselect End


// Tooltips Initialization
$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    // $('.datepicker').pickadate();
});

// $(document).ready(function () {

//     //when the page is done loading, disable autocomplete on all inputs[text]
//     $('input[type="text"]').attr('autocomplete', 'off');

//     //do the same when a bootstrap modal dialog is opened
//     $(window).on('.modal', function () {
//         $('input[type="text"]').attr('autocomplete', 'off');
//     });
// });



(function($) {
    "use strict";

    jQuery(document).ready(function($) {

    });

    jQuery(window).load(function() {
        $(".preloader").fadeOut(1000);

    });

}(jQuery));