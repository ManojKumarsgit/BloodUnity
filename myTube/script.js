window.addEventListener('scroll', function() {
    var scrollY = window.scrollY;
    if (scrollY > 50) {
      document.querySelector('.navbar').classList.add('navbar-transparent');
    } else {
      document.querySelector('.navbar').classList.remove('navbar-transparent');
    }
  });

 function openDiv() {
   window.open('movie-info.html','mywindow');
 }