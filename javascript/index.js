
// bu slide yani bir nevi kayma - geçiş denebilir giriş sayfasında kullandım
// yani sayfaya girerken bir animasyon gibi geçişler oluyor ya ve görsel kısmının hareketi
const btns = document.querySelectorAll('.btns');
const authsection = document.querySelectorAll('.authsection');

var slideNav = function (manual) {
  btns.forEach((btn) => {
    btn.classList.remove('active');
  });
  authsection.forEach((slide) => {
    slide.classList.remove('active');
  });

  btns[manual].classList.add('active');
  authsection[manual].classList.add('active');
};

btns.forEach((btn, i) => {
  btn.addEventListener('click', () => {
    slideNav(i);
  });
});

