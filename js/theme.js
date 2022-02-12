document.addEventListener("DOMContentLoaded", function() {
	var div, n,
		v = document.getElementsByClassName("youtube-player");
	for (n = 0; n < v.length; n++) {
		div = document.createElement("div");
		div.setAttribute("data-id", v[n].dataset.id);
		div.innerHTML = labnolThumb(v[n].dataset.id);
		div.onclick = labnolIframe;
		v[n].appendChild(div);
	}
});

function labnolThumb(id) {
//     var thumb = '<img src="https://i.ytimg.com/vi/ID/maxresdefault.jpg">',
	var thumb = '<div class="triple-box-graphic-image" style="background-image: url(https://i.ytimg.com/vi/ID/maxresdefault.jpg);">',
        play = '<div class="play"></div>';
    return thumb.replace("ID", id) + play;
}

function labnolIframe() {
    var iframe = document.createElement("iframe");
    var embed = "https://www.youtube.com/embed/ID?autoplay=1";
    iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
    iframe.setAttribute("frameborder", "0");
    iframe.setAttribute("allowfullscreen", "1");
    this.parentNode.replaceChild(iframe, this);
}

jQuery(document).ready(function($){
	// $('.menu-item-has-children > a').after('<span class="nav-dropdown-button"><img src="/wp-content/uploads/2020/06/dropdown-arrow.svg" alt="dropdown-icon"></span>');
	$('.panel-dropdown-icon').click(function(){
		let panelBio = $(this).parent().parent().find('.panel-bio-wrapper');
		if (!$(panelBio).hasClass('active')) {
			$(this).text('-');
			$(panelBio).addClass('active');
		} else {
			$(panelBio).removeClass('active');
			$(this).text('+');
		}
		$(panelBio).slideToggle();
	});
	
	$('#fs-dropdown-icon').click(function(){
		
		if (!$(this).hasClass('active')) {
			$(this).text('-');
			$(this).addClass('active');
		} else {
			$(this).removeClass('active');
			$(this).text('+');
		}
		
		$('#fs-bio').slideToggle();
	});
	
	$('.sponsorship-dropdown-icon').click(function(){
		let sponsorshipNumber = $(this).attr('data-id');
		let sponsorshipInfo = '#information-' + sponsorshipNumber;
		if (!$(sponsorshipInfo).hasClass('active')) {
			$(this).text('-');
			$(this).toggleClass('active');
			$(sponsorshipInfo).addClass('active');
		} else {
			$(this).toggleClass('active');
			$(sponsorshipInfo).removeClass('active');
			$(this).text('+');
		}
		$(sponsorshipInfo).slideToggle();
	});
	
	if (jQuery('.js-mobile-menu').length){
        jQuery('.js-mobile-menu button').on('click', function (e) {
            jQuery('#menu-stepping-up-for-stingrays-1').slideToggle();
            jQuery(this).toggleClass('menu-active');
        });
    };
	
	$('.masonry-sponsor-container2').masonry({
		itemSelector: '.sg-single-wrapper',
		horizontalOrder: false,
		percentPosition: true,
		columnWidth: '.col-md-6',
	});
	
	$('.masonry-sponsor-container3').masonry({
		itemSelector: '.sg-single-wrapper',
		horizontalOrder: false,
		percentPosition: true,
		columnWidth: '.col-md-4',
	});
});