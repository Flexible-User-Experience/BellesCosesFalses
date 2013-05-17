APP = [];

/**
 * Returns a random integer between min and max
 * Using Math.round() will give you a non-uniform distribution!
 */
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

/**
 * Returns a random matrix of 4 integrers from 0 to n
 * todo implementar aleatoris no repetits
 */
function getRandomIntMatrix(n) {
    var first = getRandomInt(0, n);
    var second = getRandomInt(0, n);
    var third = getRandomInt(0, n);
    var four = getRandomInt(0, n);
    return [first, second, third, four];
}

/**
 * Set the CSS3 gradient cross-browser
 */
function setGradientCSS3(node, red, green, blue) {
    node.css('background', '-webkit-gradient(linear,left top,right top,color-stop(0%,rgb(255,255,255)), color-stop(100%,rgb('+red+','+green+','+blue+')))');
}

jQuery(document).on('app/setFade', function(evt, node, colorMatrix) {
    console.log('[app/setFade] fired node=' + node + ' colorMatrix=' + colorMatrix);
    setGradientCSS3(hcd, 231, 0, 138);
    //setTimeout(fireInterval, 250, param);
});
