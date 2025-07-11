import $ from 'jquery';
import '@popperjs/core';
import 'bootstrap/dist/js/bootstrap';
import WOW from 'wow.js';
import "../../node_modules/wow.js"
import { App } from './parts/app.js'
import { Plugins } from './parts/plugins.js'
import { Parts } from './parts/parts.js'
import { Truncate } from './parts/truncate.js';
import { Privacy } from './parts/privacy.js';
import { Handlebar } from './parts/handlebar.js';
import { Header } from './parts/header.js';


// export for others scripts to use
window.$ = $;
window.jQuery = jQuery;

$(function () {

  window.windowWidth = $(window).width();
  window.windowHeight = $(window).height();

  window.isiPhone = navigator.userAgent.toLowerCase().indexOf('iphone');
  window.isiPad = navigator.userAgent.toLowerCase().indexOf('ipad');
  window.isiPod = navigator.userAgent.toLowerCase().indexOf('ipod');

  //Functions List Below

  window.app = new App();
  window.app.init();

  window.plugins = new Plugins();
  window.plugins.init();

  window.parts = new Parts();
  window.parts.init();

  window.truncate = new Truncate();
  window.truncate.init();

  window.privacy = new Privacy();
  window.privacy.init();

  window.handlebar = new Handlebar();
  window.handlebar.init();

  window.header = new Header();
  window.header.init();
});

// ===========================================================================

jQuery(document).ready(function ($) {
  new WOW({
    boxClass: 'wow',
    // animateClass: 'animated',
    once: true,
    mobile: true,
  }).init();
});