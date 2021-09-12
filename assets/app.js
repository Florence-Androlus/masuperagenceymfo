/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
let $ = require ('jquery')
import './styles/app.css';
require ('select2');

let $contactButton =$('#contactButton')
$(`select`).select2();
$contactButton.click(e =>{
    e.preventDefault();
    $('#contactForm').slideDown();
    $contactButton.slideUp();
})
// start the Stimulus application
console.log('Hello Webpack Encore! Edit me in assets/app.js');