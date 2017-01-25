var menu_inf = document.getElementById('menu_inf');
var altura = menu_inf.offsetTop;
window.addEventListener('scroll', function()
{
   if (window.pageYOffset > altura)
       {
           menu_inf.classList.add('fixed');
    }else{
        menu_inf.classList.remove('fixed');
    }
})