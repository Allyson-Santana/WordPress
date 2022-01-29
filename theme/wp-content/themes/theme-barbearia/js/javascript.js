$(window).scroll(function() { 
    var scroll = $(window).scrollTop();

    if (scroll > 0) {
        $('#menu').css('background-color','black');
        $('#menu').css('opacity','0.8');
        $('#logo').css('width','85');
    } else {
        $('#menu').css('background-color','transparent');
        $('#logo').css('width','150');
    }
});

const menuScroll = document.querySelectorAll('#linha-horizontal-menu');


menuScroll.forEach(item => {
  if(item == document.querySelector("a[href='#Top']") ) {
      $("a[href='#Top']").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });
  }else{
    item.addEventListener('click', scroll_to_id_click);
  }
});

function getScroll(element){
  const id = element.getAttribute('href');
  return document.querySelector(id).offsetTop;
}

function scroll_to_id_click(event){
    event.preventDefault();
    const to_section_id = getScroll(event.target) - 90 ;

    scrollPosition(to_section_id)
}

function scrollPosition(to){
    // window.scroll({
    //     top: to,
    //     behavior: 'smooth'
    // });
    smoothScrollTo(0, to);
}

// Caso deseje suporte a browsers antigos / que não suportam scroll smooth nativo
/**
 * Smooth scroll animation
 * @param {int} endX: destination x coordinate
 * @param {int) endY: destination y coordinate
 * @param {int} duration: animation duration in ms
 */
function smoothScrollTo(endX, endY, duration) {
  const startX = window.scrollX || window.pageXOffset;
  const startY = window.scrollY || window.pageYOffset;
  const distanceX = endX - startX;
  const distanceY = endY - startY;
  const startTime = new Date().getTime();

  duration = typeof duration !== 'undefined' ? duration : 750;

  // Easing function
  const easeInOutQuart = (time, from, distance, duration) => {
    if ((time /= duration / 2) < 1) return distance / 2 * time * time * time * time + from;
    return -distance / 2 * ((time -= 2) * time * time * time - 2) + from;
  };

  const timer = setInterval(() => {
    const time = new Date().getTime() - startTime;
    const newX = easeInOutQuart(time, startX, distanceX, duration);
    const newY = easeInOutQuart(time, startY, distanceY, duration);
    if (time >= duration) {
      clearInterval(timer);
    }
    window.scroll(newX, newY);
  }, 1000 / 60); // 60 fps
};


