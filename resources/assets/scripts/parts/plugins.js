import "slick-carousel";

export class Plugins {

  init() {
    this.BrandSlider();
    this.ResourcesSlider();
  }

  BrandSlider() {
    $(".brand-slider").slick({
      dots: false,
      infinite: true,
      arrows: false,
      autoplay: true,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
    });
  }

  ResourcesSlider() {
    $(".resource-slider").slick({
      dots: false,
      infinite: false,
      arrows: false,
      autoplay: true,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
    });
  }
}
