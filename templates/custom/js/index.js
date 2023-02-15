"use strict";

var Slider =
	/*#__PURE__*/
	function () {
		function Slider(section) {
			_classCallCheck(this, Slider);

			this.section = section;
			this.slider = this.section.querySelector('.slider');

			this.__clone();

			this.banners = this.slider.querySelectorAll('.banner');
			this.banner_width = this.banners[0].clientWidth;
			this.button_forward = this.section.querySelector('button.forward');
			this.count = 0;
			this.maxCount = this.banners.length - 3;
			this.animationOver = true;
			this.timeout = undefined;

			this.__default();
		}

		_createClass(Slider, [{
			key: "setActiveBanner",
			value: function setActiveBanner() {
				var _this = this;

				this.banners.forEach(function (number, i) {
					var banner = _this.banners[i];
					if (i === _this.count || i === 0) banner.classList.add('active');else banner.classList.remove('active');
				});
			}
		}, {
			key: "clicked",
			value: function clicked() {
				var _this2 = this;

				clearTimeout(_this2.timeout);

				if (this.animationOver) this.sliderForward();
				this.animationOver = false;
				setTimeout(function () {
					_this2.timeout = setTimeout(function(){
						_this2.clicked();
					}, 5000);
					return _this2.animationOver = true;
				}, 400);
			}
		}, {
			key: "sliderForward",
			value: function sliderForward() {
				var _this3 = this;

				if (this.maxCount > this.count) {
					this.sliderSetTransform(++this.count * -this.banner_width);
					this.setActiveBanner();
				} else {
					this.sliderSetTransform(++this.count * -this.banner_width);
					this.setActiveBanner();
					setTimeout(function () {
						_this3.slider.style.transitionDuration = '0s';

						_this3.sliderSetTransform(0);

						_this3.count = 0;
						setTimeout(function () {
							_this3.slider.style.transitionDuration = '0.4s';
						}, 10);
					}, 400);
				}
			}
		}, {
			key: "sliderSetTransform",
			value: function sliderSetTransform(value) {
				this.slider.style.transform = "translateX(".concat(value, "px)");
			}
		}, {
			key: "__clone",
			value: function __clone() {
				var banners = this.slider.querySelectorAll('.banner');
				var first = this.banners = banners[0].cloneNode(true);
				var second = this.banners = banners[1].cloneNode(true);
				this.slider.appendChild(first);
				this.slider.appendChild(second);
			}
		}, {
			key: "__default",
			value: function __default() {
				var _this4 = this;

				this.button_forward.addEventListener('click', function () {
					if (_this4.animationOver) _this4.clicked();
				});
				window.addEventListener('resize', function () {
					_this4.banner_width = _this4.banners[0].clientWidth;

					_this4.sliderSetTransform(_this4.count);
				});

				setTimeout(function(){ _this4.button_forward.click(); }, 5000);
			}
		}]);

		return Slider;
	}();

document.querySelectorAll('section.slider').forEach(function (section) {
	return new Slider(section);
});

var Items =
	/*#__PURE__*/
	function () {
		function Items() {
			_classCallCheck(this, Items);

			this.serverButtons = document.querySelectorAll('section#params .point.server button');
			this.categorySwitches = document.querySelectorAll('section#params .point.category .switch');
			this.itemsBlock_list = document.querySelectorAll('section#items .items_list');
			this.categoryButtons = [];
			this.server = 0;
			this.category = '1';

			this.__default();
		}

		_createClass(Items, [{
			key: "chosenServer",
			value: function chosenServer(i) {
				this.server = i;
				this.showCurrentServer();
				this.showCurrentCategoryList();
				this.chosenCategory(this.categoryButtons[i][0]);
			}
		}, {
			key: "showCurrentServer",
			value: function showCurrentServer() {
				var _this5 = this;

				this.serverButtons.forEach(function (button, i) {
					if (i === _this5.server) {
						button.classList.add('active');

						_this5.categorySwitches[i].classList.add('show');
					} else {
						button.classList.remove('active');

						_this5.categorySwitches[i].classList.remove('show');
					}
				});
			}
		}, {
			key: "chosenCategory",
			value: function chosenCategory(button) {
				this.category = button.dataset.targetCategory;
				this.showCategoryButton(button);
				this.showCurrentCategoryList();
			}
		}, {
			key: "showCategoryButton",
			value: function showCategoryButton(selectedButton) {
				if (selectedButton) {
					this.categoryButtons[this.server].forEach(function (button) {
						if (button !== selectedButton) button.classList.remove('active');else button.classList.add('active');
					});
				} else this.categoryButtons[this.server].forEach(function (button) {
					button.classList.remove('active');
				});
			}
		}, {
			key: "showCurrentCategoryList",
			value: function showCurrentCategoryList() {
				var _this6 = this;

				this.itemsBlock_list.forEach(function (list) {
					list.classList.remove('show');

					if (list.dataset.idCategory === _this6.category) {
						list.classList.add('show');
					}
				});
			}
		}, {
			key: "__default",
			value: function __default() {
				var _this7 = this;

				this.showCurrentCategoryList();
				this.serverButtons.forEach(function (button, i) {
					button.addEventListener('click', function () {
						_this7.chosenServer(i);
					});
				});
				this.categorySwitches.forEach(function (swtch, i) {
					var buttons = swtch.querySelectorAll('button');
					var options = swtch.querySelectorAll('option');
					_this7.categoryButtons[i] = [].concat(_toConsumableArray(buttons), _toConsumableArray(options));
					buttons.forEach(function (button) {
						button.addEventListener('click', function () {
							_this7.chosenCategory(button);
						});
					});
					var select = swtch.querySelector('select');
					select.addEventListener('change', function () {
						_this7.chosenCategory(select.querySelector('option:checked'));
					});
				});
			}
		}]);

		return Items;
	}();

new Items();

var Modal =
	/*#__PURE__*/
	function () {
		function Modal() {
			var _this9 = this;

			_classCallCheck(this, Modal);

			this.body = document.querySelector('body');
			this.modal = document.querySelector('section#modal');
			this.modal.addEventListener('click', function () {
				return _this9.checkTarget(event);
			});
			this.modal.querySelector('button.close').addEventListener('click', function () {
				return _this9.close();
			});
			document.querySelectorAll('.modal-open').forEach(function (el) {
				el.addEventListener('click', function () {
					return _this9.open(this);
				});
			});
		}

		_createClass(Modal, [{
			key: "open",
			value: function open(e) {

				var by = e.getAttribute('data-by');

				if(by == 'slider'){
					var e_id = e.getAttribute('data-id');

					e = document.querySelector('.items_list > .item[data-id="'+e_id+'"]');
				}

				var id = e.querySelector('[name="id"]').value;
				var name = e.querySelector('[name="name"]').value;
				var price = e.querySelector('[name="price"]').value;
				var text = e.querySelector('[name="text"]').value;
				var image = e.querySelector('[name="image"]').value;

				document.getElementById('modal-id').value = id;
				document.getElementById('modal-title').innerHTML = name;
				document.getElementById('modal-price').innerHTML = 'Купить за '+price+' ₽';
				document.getElementById('modal-text').innerHTML = text;
				//document.getElementById('modal-image').innerHTML = image;

				this.modal.classList.add('open');
				this.body.classList.add('fixed');

				app.price();
			}
		}, {
			key: "close",
			value: function close() {
				this.modal.classList.remove('open');
				this.body.classList.remove('fixed');
			}
		}, {
			key: "checkTarget",
			value: function checkTarget(_ref) {
				var target = _ref.target;
				if (target === this.modal) this.close();
			}
		}]);

		return Modal;
	}();

document.querySelector('section#modal') && new Modal();

app.update_donaters_cache = null;

app.update_donaters = function(){
	$.ajax({
		url: '/engine/ajax.php?type=donaters',
		dataType: 'json', type: 'POST',
		async: true, cache: false, contentType: false, processData: false,
		error: function(data){ console.log(data); },
		complete: function(){ setTimeout(function(){ app.update_donaters(); }, 4172); },
		success: function(data){
			var donaters = $('#donaters');

			var json = JSON.stringify(data);

			if(app.update_donaters_cache == json){
				return;
			}

			app.update_donaters_cache = json;

			donaters.html('');

			$.each(data, function(k, v){
				donaters.append('<div class="buyer">' +
						'<div class="img" style="background-image: url('+v.image+')"></div>' +
						'<div class="name">'+v.username+'</div>' +
						'<div class="status">' +
							'<span>Выдано</span> ' +
							'<img src="'+theme_url+'img/check-mark.svg" alt="">' +
						'</div>' +
					'</div>');
			});
		}
	});
};

app.price_timeout = undefined;

app.price = function(method){
	document.getElementById('modal-message').innerHTML = '';

	if(typeof app.price_timeout != 'undefined'){
		return;
	}

	if(typeof method == 'undefined'){
		method = 'check';
	}

	var form = document.getElementById('modal-form');

	var formData = new FormData(form);

	formData.append('method', method);

	$.ajax({
		url: '/engine/ajax.php?type=view',
		type: 'POST', data: formData,
		async: true, cache: false, contentType: false, processData: false,
		error: function(data){ console.log(data); },
		complete: function(){ if(typeof app.price_timeout != 'undefined'){ clearTimeout(app.price_timeout); } },
		success: function(data) {
			var split = data.split('|');

			if(split[0] == 'ok' && method == 'check'){
				form.querySelector('[type="submit"]').innerHTML = split[1];
			}else if(split[0] == 'error' && method == 'buy'){
				document.getElementById('modal-message').innerHTML = split[1];
			}else if(split[0] == 'ok' && method == 'buy'){
				window.location.href = split[1];
			}
		}
	});
};

setTimeout(function(){ app.update_donaters(); }, 0);

$('body').on('input', '#modal-form input', function(){
	app.price();
}).on('click', '#modal-form [type="submit"]', function(e){
	e.preventDefault();

	app.price('buy');
});
