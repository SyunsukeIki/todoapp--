/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/sample.js ***!
  \********************************/
var check_message = document.getElementById('check_message');
check_message.addEventListener('click', function (e) {
  // デフォルトのイベントをキャンセル
  e.preventDefault();

  if (confirm('本当に削除しますか？')) {
    document.doDelete.submit();
    return true;
  } else {
    alert('キャンセルされました');
    return false;
  }
});
/******/ })()
;