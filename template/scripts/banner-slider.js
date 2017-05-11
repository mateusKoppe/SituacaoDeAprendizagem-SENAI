class BannerSlider {

	constructor(banner, config) {
		this._banner = banner;
		this._config = config;

		this.create();
	}

	create(){
		this.sliders = this._banner.querySelectorAll(".banner-slider__slide");
		this.actualIndexSlider = 0;
		

		setInterval(() => this._nextSlider(), 2000);
		this._nextSlider();
	}

	_nextSlider(){
		if(this._activeSlide) this._activeSlide.classList.remove('banner-slider__slide--active');
		if(!this.sliders[this.actualIndexSlider]){
			this.actualIndexSlider = 0;
		}
		this._activeSlide = this.sliders[this.actualIndexSlider];
		this._activeSlide.classList.add('banner-slider__slide--active')
		this.actualIndexSlider++;
	}

	_prevSlider(){
		this.actualIndexSlider--;
		if(!this.sliders[this.actualIndexSlider]){
			this.actualIndexSlider = this.sliders.length - 1;
		}
		console.log(this.sliders[this.actualIndexSlider]);
	}
	
}