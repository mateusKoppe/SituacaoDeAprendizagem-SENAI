class BannerSlider {

	constructor(banner, config) {
		this._banner = banner;
		this._config = config;

		this.create();
	}

	create(){
		this._sliders = this._banner.querySelectorAll(".banner-slider__slide");
		this._actualIndexSlider = 0;
		
		setInterval(() => this._nextSlider(), 5000);
		this._nextSlider();
	}

	_nextSlider(){
		if(this._activeSlide) this._activeSlide.classList.remove('banner-slider__slide--active');
		if(!this._sliders[this._actualIndexSlider]){
			this._actualIndexSlider = 0;
		}
		this._activeSlide = this._sliders[this._actualIndexSlider];
		this._activeSlide.classList.add('banner-slider__slide--active')
		this._actualIndexSlider++;
	}

	_prevSlider(){
		this._actualIndexSlider--;
		if(!this._sliders[this._actualIndexSlider]){
			this._actualIndexSlider = this._sliders.length - 1;
		}
		console.log(this._sliders[this._actualIndexSlider]);
	}
	
}