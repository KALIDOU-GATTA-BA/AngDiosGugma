import '../css/app.css';
import $ from 'jquery';
import "popper.js";
import 'bootstrap';
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
$(document).ready(function(){
    $("iframe").attr("height", "100%");
    $("iframe").attr("width", "100%");
});
var btn =document.querySelector('.toggle_btn');
var nav =document.querySelector('.nav');
btn.onclick=function(){
nav.classList.toggle('nav_open');
}

 // document.getElementById('ip').style.backgroundColor="white";


