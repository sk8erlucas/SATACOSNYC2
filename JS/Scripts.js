// JavaScript Document


$(document).ready(function() {
	//Preloader
	preloaderFadeOutTime = 500;

	function hidePreloader() {
		var preloader = $('.preloader');
		preloader.fadeOut(preloaderFadeOutTime);
	}
	
	hidePreloader();
});