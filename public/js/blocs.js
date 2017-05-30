// Blocs.js Minified
function setFillScreenBlocHeight(){$(".bloc-fill-screen").each(function(t){var i=$(this);window.fillBodyHeight=0,$(this).find(".container").each(function(t){fillPadding=2*parseInt($(this).css("padding-top")),i.hasClass("bloc-group")?fillBodyHeight=fillPadding+$(this).outerHeight()+50:fillBodyHeight=fillBodyHeight+fillPadding+$(this).outerHeight()+50}),$(this).css("height",getFillHeight()+"px")})}function getFillHeight(){var t=$(window).height();return t<fillBodyHeight&&(t=fillBodyHeight+100),t}function scrollToTarget(t){1==t?t=0:2==t?t=$(document).height():(t=$(t).offset().top,$(".sticky-nav").length&&(t-=100)),$("html,body").animate({scrollTop:t},"slow")}function animateWhenVisible(){hideAll(),inViewCheck(),$(window).scroll(function(){inViewCheck(),scrollToTopView(),stickyNavToggle()})}function setUpDropdownSubs(){$("ul.dropdown-menu [data-toggle=dropdown]").on("click",function(t){t.preventDefault(),t.stopPropagation(),$(this).parent().siblings().removeClass("open"),$(this).parent().toggleClass("open");var i=$(this).parent().children(".dropdown-menu"),o=i.offset().left+i.width();o>$(window).width()&&i.addClass("dropmenu-flow-right")})}function stickyNavToggle(){var t=0,i="sticky";if($(".sticky-nav").hasClass("fill-bloc-top-edge")){var o=$(".fill-bloc-top-edge.sticky-nav").parent().css("background-color");"rgba(0, 0, 0, 0)"==o&&(o="#FFFFFF"),$(".sticky-nav").css("background",o),t=$(".sticky-nav").height(),i="sticky animated fadeInDown"}$(window).scrollTop()>t?($(".sticky-nav").addClass(i),"sticky"==i&&$(".page-container").css("padding-top",$(".sticky-nav").height())):($(".sticky-nav").removeClass(i).removeAttr("style"),$(".page-container").removeAttr("style"))}function hideAll(){$(".animated").each(function(t){$(this).closest(".hero").length||$(this).removeClass("animated").addClass("hideMe")})}function inViewCheck(){$($(".hideMe").get().reverse()).each(function(t){var i=jQuery(this),o=i.offset().top+i.height(),e=$(window).scrollTop()+$(window).height();if(i.height()>$(window).height()&&(o=i.offset().top),e>o){var a=i.attr("class").replace("hideMe","animated");i.css("visibility","hidden").removeAttr("class"),setTimeout(function(){i.attr("class",a).css("visibility","visible")},.01)}})}function scrollToTopView(){$(window).scrollTop()>$(window).height()/3?$(".scrollToTop").hasClass("showScrollTop")||$(".scrollToTop").addClass("showScrollTop"):$(".scrollToTop").removeClass("showScrollTop")}function setUpLightBox(){window.targetLightbox,$(document).on("click","[data-lightbox]",function(t){t.preventDefault(),targetLightbox=$(this);var i='<p class="lightbox-caption">'+$(this).attr("data-caption")+"</p>";$(this).attr("data-caption")||(i="");var o=$('<div id="lightbox-modal" class="modal fade"><div class="modal-dialog"><div class="modal-content '+$(this).attr("data-frame")+'"><button type="button" class="close close-lightbox" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div class="modal-body"><a href="#" class="prev-lightbox" aria-label="prev"></a><a href="#" class="next-lightbox" aria-label="next"></a><img id="lightbox-image" class="img-responsive" src="'+$(this).attr("data-lightbox")+'">'+i+"</div></div></div></div>");$("body").append(o),$("#lightbox-modal").modal("show"),0==$("a[data-lightbox]").index(targetLightbox)&&$(".prev-lightbox").hide(),$("a[data-lightbox]").index(targetLightbox)==$("a[data-lightbox]").length-1&&$(".next-lightbox").hide()}).on("hidden.bs.modal","#lightbox-modal",function(){$("#lightbox-modal").remove()}),$(document).on("click",".next-lightbox, .prev-lightbox",function(t){t.preventDefault();var i=$("a[data-lightbox]").index(targetLightbox),o=$("a[data-lightbox]").eq(i+1);$(this).hasClass("prev-lightbox")&&(o=$("a[data-lightbox]").eq(i-1)),$("#lightbox-image").attr("src",o.attr("data-lightbox")),$(".lightbox-caption").html(o.attr("data-caption")),targetLightbox=o,$(".next-lightbox, .prev-lightbox").hide(),$("a[data-lightbox]").index(o)!=$("a[data-lightbox]").length-1&&$(".next-lightbox").show(),$("a[data-lightbox]").index(o)>0&&$(".prev-lightbox").show()})}$(document).ready(function(){$(".bloc-fill-screen").css("height",$(window).height()+"px"),$("#scroll-hero").click(function(t){t.preventDefault(),$("html,body").animate({scrollTop:$("#scroll-hero").closest(".bloc").height()},"slow")}),setUpDropdownSubs(),setUpLightBox()}),$(window).load(function(){setFillScreenBlocHeight(),animateWhenVisible()}).resize(function(){setFillScreenBlocHeight()}),$(function(){$('[data-toggle="tooltip"]').tooltip()});