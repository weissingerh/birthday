require('./bootstrap');
global.$ = global.jQuery = require('jquery');

require('./draw/drawingboard');
var canvas = new DrawingBoard.Board('canvas', {
    color: 'black',
    webStorage: 'local',
});

$('#submit-drawing').on('click', function(e) {
    //get drawingboard content
   var img = canvas.getImg();

   //we keep drawingboard content only if it's not the 'blank canvas'
   var imgInput = (canvas.blankCanvas == img) ? '' : img;

   //put the drawingboard content in the form field to send it to the server
   $('input[name=drawing]').val( imgInput );

   //we can also assume that everything goes well server-side
   //and directly clear webstorage here so that the drawing isn't shown again after form submission
   //but the best would be to do when the server answers that everything went well
   canvas.clearWebStorage();
 });

import Alpine from 'alpinejs';

window.Alpine = Alpine
Alpine.start()
