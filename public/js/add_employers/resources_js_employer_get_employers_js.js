(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_employer_get_employers_js"],{

/***/ "./resources/js/employer/get_employers.js":
/*!************************************************!*\
  !*** ./resources/js/employer/get_employers.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
var searchParams = new URLSearchParams(window.location.search);

if (searchParams.has('page')) {
  console.log(searchParams.get('page'));
  getEmployers(searchParams.get('page'));
} else {
  getEmployers(1);
}

function getEmployers(page_number) {
  $.ajax({
    url: "/api/employers?page=".concat(page_number),
    type: 'get',
    dataType: 'json',
    success: function success(data) {
      $('#employers_table').empty();
      data.data.map(function (value, key) {
        $('#employers_table').append("<tr>\n                        <td> ".concat(value.FIO, " </td>\n                        <td> ").concat(value.age, " </td>\n                        <td> ").concat(value.photo ? value.photo : 'Отсутствует', " </td>\n                        <td>\n                            <button onclick=\"showEmployer(").concat(value.id, ")\" class=\"btn btn-sm btn-primary\">\u041F\u043E\u0434\u0440\u043E\u0431\u043D\u0435\u0435</button>\n                        </td>\n                    </tr>"));
      });
    },
    error: function error(data) {
      $('.alert-success').empty().hide();
      $('.alert-danger').empty().show().append(data);
    }
  });
}

/***/ })

}]);