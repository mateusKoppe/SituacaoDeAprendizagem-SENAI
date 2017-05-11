onload = () => {
	let banners = document.querySelectorAll('.banner-slider--js');

	banners.forEach(banner => {
		new BannerSlider(banner);
	});
}