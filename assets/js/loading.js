var body = document.getElementsByTagName('body'),
	button = document.getElementById('submit-button');
console.log(body[0]);
console.log(button);

var loader = document.createElement('div');
loader.classList.add('loader');

button.addEventListener('click', function() {
	var d = document.createElement("div");
	d.classList.add('loading');
	d.appendChild(loader);

	document.body.appendChild(d);
})