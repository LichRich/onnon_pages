jQuery(document).ready(function() {
    /* ---------------------------------------------- /*
     * ZoomIn
    /* ---------------------------------------------- */
    const imageList = ["./img/items_dongseo/detail/IMG_1099.jpg", "./img/items_dongseo/detail/IMG_1089.jpg", "./img/items_dongseo/detail/IMG_1096.jpg"];
    const items = [document.getElementById('item1'), document.getElementById('item2'), document.getElementById('item3')];

    const zoomFrame = document.querySelector('.carousel-inner');
    const zoomLens = document.querySelector('.zoomed-image');
    const zoomWindow = document.querySelector('.zoomed-result');

    function changeImage() {
        switch(true) {
            case items[1].classList.contains('active'):
                zoomWindow.style.backgroundImage = "url(" + imageList[1] + ")";
                break;
            case items[2].classList.contains('active'):
                zoomWindow.style.backgroundImage = "url(" + imageList[2] + ")";
                break;
            default:
                zoomWindow.style.backgroundImage = "url(" + imageList[0] + ")";
        }
    }

    zoomFrame.addEventListener('mousemove', handleMouseMove);

    function handleMouseMove(e) {
        changeImage();

        zoomLens.style.display = 'block';
        zoomWindow.style.display = 'block';

        const {left, top} = zoomFrame.getBoundingClientRect();
        const x = e.clientX - left;
        const y = e.clientY - top;

        console.log("x=" + x);
        console.log("y=" + y);

        const coord = {x: x - 100 + 'px', y: y - 75 + 'px'};
        const boundary = {xMin: 100, yMin: 75, xMax: 585, yMax: 348};

        switch (true) {

            case (x <= boundary.xMin && y <= boundary.yMin) :
              zoomLens.style.left = '0';
              zoomLens.style.top = '0';
              break;
          
            case (x > boundary.xMin && x < boundary.xMax && y <= boundary.yMin) :
              zoomLens.style.left = coord.x;
              zoomLens.style.top = '0';
              break;
          
            case (x >= boundary.xMax && y <= boundary.yMin) :
              zoomLens.style.left = '585px';
              zoomLens.style.top = '0';
              break;
          
            case (x <= boundary.xMin && y > boundary.yMin && y < boundary.yMax) :
              zoomLens.style.left = '0';
              zoomLens.style.top = coord.y;
              break;
          
            case (x <= boundary.xMin && y >= boundary.yMax) :
              zoomLens.style.left = '0';
              zoomLens.style.top = '348px';
              break;
          
            case (x > boundary.xMin && x < boundary.xMax && y >= boundary.yMax) :
              zoomLens.style.left = coord.x;
              zoomLens.style.top = '348px';
              break;
          
            case (x >= boundary.xMax && y >= boundary.yMax) :
              zoomLens.style.left = '585px';
              zoomLens.style.top = '348px';
              break;
          
            case (x >= boundary.xMax && y > boundary.yMin && y < boundary.yMax) :
              zoomLens.style.left = '585px';
              zoomLens.style.top = coord.y;
              break;
          
            default :
              zoomLens.style.left = coord.x;
              zoomLens.style.top = coord.y;
        }

        const {x: lensLeft, y: lensTop} = zoomLens.getBoundingClientRect();

        zoomWindow.style.backgroundPosition = `${(lensLeft - left) * 100 / 585}% ${(lensTop - top) * 100 / 348}%`

    }

    zoomFrame.addEventListener('mouseleave', function() {
        console.log('mouse leaved');
        zoomLens.style.display = 'none';
        zoomWindow.style.display = 'none';
    })
});