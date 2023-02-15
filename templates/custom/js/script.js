function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Mobile_menu =
    /*#__PURE__*/
    function () {
      function Mobile_menu() {
        _classCallCheck(this, Mobile_menu);

        this.menu = document.querySelector('nav.mobile');
        this.openBtn = document.querySelector('header button.mobile.open');
        this.closeBtn = document.querySelector('button.mobile.close');
        this.links = document.querySelectorAll('header nav.mobile a');
        this.body = document.querySelector('body');

        this.__default();
      }

      _createClass(Mobile_menu, [{
        key: "open",
        value: function open() {
          this.menu.classList.add('open');
          this.body.classList.add('fixed');
        }
      }, {
        key: "close",
        value: function close() {
          this.menu.classList.remove('open');
          this.body.classList.remove('fixed');
        }
      }, {
        key: "__default",
        value: function __default() {
          var _this8 = this;

          this.openBtn.addEventListener('click', function () {
            return _this8.open();
          });
          [this.closeBtn].concat(_toConsumableArray(this.links)).forEach(function (link) {
            return link.addEventListener('click', function () {
              return _this8.close();
            });
          });
        }
      }]);

      return Mobile_menu;
    }();

new Mobile_menu();

new ClipboardJS('.clipboard');

var app = {
  update_online: function(){
    $.ajax({
      url: '/engine/ajax.php?type=online',
      dataType: 'json', type: 'POST',
      async: true, cache: false, contentType: false, processData: false,
      error: function(data){ console.log(data); },
      complete: function(){ setTimeout(function(){ app.update_online(); }, 5172); },
      success: function(data){
        $('#online, #online-mobile').html(data.online);
      }
    });
  }
};

setTimeout(function(){ app.update_online(); }, 0);