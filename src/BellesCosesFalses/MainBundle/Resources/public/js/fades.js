/*jQuery(document).on('app/setFade', function(evt, node, colorMatrix) {
    console.log('[app/setFade] fired node=' + node + ' colorMatrix=' + colorMatrix);
    setGradientCSS3(hcd, 231, 0, 138);
    //setTimeout(fireInterval, 250, param);
});

 APP = [];

 jQuery(document).ready(function($) {
 var black = [0, 0, 0];
 var yellow = [250, 247, 67];
 var magenta = [231, 0, 138];
 var green = [139, 203, 71];
 var blue = [44, 65, 156];
 APP.colormatrix = [black, yellow, magenta, green];
 APP.hcd = $('#hack-colors-div');
 APP.randomIndexColor = getRandomInt(0, 3);
 APP.currentcolor = APP.colormatrix[APP.randomIndexColor];
 APP.nextcolor = APP.colormatrix[APP.randomIndexColor];
 setGradientCSS3(APP.hcd, APP.currentcolor[0], APP.currentcolor[1], APP.currentcolor[2]);
 APP.fadeInInterval = setInterval(fireFadeInInterval, 25);
 //$(document).trigger('app/setFade', hcd, getRandomIntMatrix(3));
 });

 function fireFadeInInterval() {
 var color = APP.currentcolor;
 //console.log('hit ' + color);
 var red = color[0];
 var green = color[1];
 var blue = color[2];
 if (red < 255) red++;
 if (green < 255) green++;
 if (blue < 255) blue++;
 setGradientCSS3(APP.hcd, red, green, blue);
 APP.currentcolor = [red, green, blue];
 if (red == 255 && green == 255 && blue == 255) {
 window.clearInterval(APP.fadeInInterval);
 APP.randomIndexColor = getAnotherDifferentRandomInt(0, 3, APP.randomIndexColor);
 APP.nextcolor = APP.colormatrix[APP.randomIndexColor];
 APP.fadeOutInterval = setInterval(fireFadeOutInterval, 25);
 }
 }

 function fireFadeOutInterval() {
 var color = APP.currentcolor;
 //console.log('hit ' + color);
 var red = color[0];
 var green = color[1];
 var blue = color[2];
 if (red > APP.nextcolor[0]) red--;
 if (green > APP.nextcolor[1]) green--;
 if (blue > APP.nextcolor[2]) blue--;
 setGradientCSS3(APP.hcd, red, green, blue);
 APP.currentcolor = [red, green, blue];
 if (red == APP.nextcolor[0] && green == APP.nextcolor[1] && blue == APP.nextcolor[2]) {
 window.clearInterval(APP.fadeOutInterval);
 APP.randomIndexColor = getAnotherDifferentRandomInt(0, 3, APP.randomIndexColor);
 APP.currentcolor = APP.nextcolor;
 APP.nextcolor = APP.colormatrix[APP.randomIndexColor];
 APP.fadeInInterval = setInterval(fireFadeInInterval, 25);
 }
 }

 /**
 * Returns a random integer between min and max different from last parameter
 *
function getAnotherDifferentRandomInt(min, max, notequal) {
    var found = false;
    var intSearch = getRandomInt(min, max);
    while (!found) {
        if (intSearch == notequal) {
            intSearch = getRandomInt(min, max);
        } else {
            found = true;
        }
    }
    return intSearch;
}

/**
 * Returns a random integer between min and max
 * Using Math.round() will give you a non-uniform distribution!
 *
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

/**
 * Set the CSS3 gradient cross-browser
 *
function setGradientCSS3(node, red, green, blue) {
    if ($.browser.name == 'chrome' || $.browser.name == 'safari') {
        node.css('background', '-webkit-gradient(linear, left top, right top, color-stop(0%,rgb(255,255,255)), color-stop(100%,rgb('+red+','+green+','+blue+')))');
    } else if ($.browser.name == 'firefox') {
        node.css('background', '-moz-linear-gradient(left, rgb(255,255,255) 0%, rgb('+red+','+green+','+blue+') 100%)');
    } else if ($.browser.name == 'opera') {
        node.css('background', '-o-linear-gradient(left, rgb(255,255,255) 0%, rgb('+red+','+green+','+blue+') 100%)');
    } else if ($.browser.name == 'msie') {
        node.css('background', '-ms-linear-gradient(left, rgb(255,255,255) 0%, rgb('+red+','+green+','+blue+') 100%)');
    }
}
*/
