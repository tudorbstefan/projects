var counter = 0;
function slider(direction) {
    
    var surse = ['images/imac.jpg','images/controller.jpg', 'images/playstation.jpg']
    if (direction == 'left') {
        if (counter == 0) {
            counter = surse.length-1;
        } else {
            counter -= 1;
        }
    }

    if (direction == 'right') {
        if (counter == surse.length-1) {
            counter = 0;
        } else {
            counter += 1;
        }
    }

        document.getElementById('slider-image').src = surse[counter];
}