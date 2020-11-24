const btn_open = document.getElementsByClassName('btn-menu')[0];
const btn_close = document.getElementsByClassName('btn-close')[0];

btn_open.onclick = function () {
	document.getElementsByClassName('nav-mobile')[0].classList.add('open');
}

btn_close.onclick = function () {
	document.getElementsByClassName('nav-mobile')[0].classList.remove('open');
}
