yoastWebpackJsonp([18],{

/***/ 543:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
eval("var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;\n\nvar _typeof = typeof Symbol === \"function\" && typeof Symbol.iterator === \"symbol\" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === \"function\" && obj.constructor === Symbol && obj !== Symbol.prototype ? \"symbol\" : typeof obj; };\n\n!function (e, t) {\n  \"object\" == ( false ? \"undefined\" : _typeof(exports)) && \"undefined\" != typeof module ? module.exports = t() :  true ? !(__WEBPACK_AMD_DEFINE_FACTORY__ = (t),\n\t\t\t\t__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?\n\t\t\t\t(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :\n\t\t\t\t__WEBPACK_AMD_DEFINE_FACTORY__),\n\t\t\t\t__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : (e.ReactIntlLocaleData = e.ReactIntlLocaleData || {}, e.ReactIntlLocaleData.ur = t());\n}(undefined, function () {\n  \"use strict\";\n  return [{ locale: \"ur\", pluralRuleFunction: function pluralRuleFunction(e, t) {\n      var a = !String(e).split(\".\")[1];return t ? \"other\" : 1 == e && a ? \"one\" : \"other\";\n    }, fields: { year: { displayName: \"سال\", relative: { 0: \"اس سال\", 1: \"اگلے سال\", \"-1\": \"گزشتہ سال\" }, relativeTime: { future: { one: \"{0} سال میں\", other: \"{0} سال میں\" }, past: { one: \"{0} سال پہلے\", other: \"{0} سال پہلے\" } } }, month: { displayName: \"مہینہ\", relative: { 0: \"اس مہینہ\", 1: \"اگلے مہینہ\", \"-1\": \"پچھلے مہینہ\" }, relativeTime: { future: { one: \"{0} مہینہ میں\", other: \"{0} مہینے میں\" }, past: { one: \"{0} مہینہ پہلے\", other: \"{0} مہینے پہلے\" } } }, day: { displayName: \"دن\", relative: { 0: \"آج\", 1: \"آئندہ کل\", 2: \"آنے والا پرسوں\", \"-2\": \"گزشتہ پرسوں\", \"-1\": \"گزشتہ کل\" }, relativeTime: { future: { one: \"{0} دن میں\", other: \"{0} دنوں میں\" }, past: { one: \"{0} دن پہلے\", other: \"{0} دنوں پہلے\" } } }, hour: { displayName: \"گھنٹہ\", relative: { 0: \"اس گھنٹے\" }, relativeTime: { future: { one: \"{0} گھنٹہ میں\", other: \"{0} گھنٹے میں\" }, past: { one: \"{0} گھنٹہ پہلے\", other: \"{0} گھنٹے پہلے\" } } }, minute: { displayName: \"منٹ\", relative: { 0: \"اس منٹ\" }, relativeTime: { future: { one: \"{0} منٹ میں\", other: \"{0} منٹ میں\" }, past: { one: \"{0} منٹ پہلے\", other: \"{0} منٹ پہلے\" } } }, second: { displayName: \"سیکنڈ\", relative: { 0: \"اب\" }, relativeTime: { future: { one: \"{0} سیکنڈ میں\", other: \"{0} سیکنڈ میں\" }, past: { one: \"{0} سیکنڈ پہلے\", other: \"{0} سیکنڈ پہلے\" } } } } }, { locale: \"ur-IN\", parentLocale: \"ur\", fields: { year: { displayName: \"سال\", relative: { 0: \"اس سال\", 1: \"اگلے سال\", \"-1\": \"گزشتہ سال\" }, relativeTime: { future: { one: \"{0} سال میں\", other: \"{0} سالوں میں\" }, past: { one: \"{0} سال پہلے\", other: \"{0} سال پہلے\" } } }, month: { displayName: \"مہینہ\", relative: { 0: \"اس ماہ\", 1: \"اگلے ماہ\", \"-1\": \"گزشتہ ماہ\" }, relativeTime: { future: { one: \"{0} ماہ میں\", other: \"{0} ماہ میں\" }, past: { one: \"{0} ماہ قبل\", other: \"{0} ماہ قبل\" } } }, day: { displayName: \"دن\", relative: { 0: \"آج\", 1: \"آئندہ کل\", 2: \"آنے والا پرسوں\", \"-2\": \"گزشتہ پرسوں\", \"-1\": \"گزشتہ کل\" }, relativeTime: { future: { one: \"{0} دن میں\", other: \"{0} دنوں میں\" }, past: { one: \"{0} دن پہلے\", other: \"{0} دنوں پہلے\" } } }, hour: { displayName: \"گھنٹہ\", relative: { 0: \"اس گھنٹے\" }, relativeTime: { future: { one: \"{0} گھنٹہ میں\", other: \"{0} گھنٹے میں\" }, past: { one: \"{0} گھنٹہ پہلے\", other: \"{0} گھنٹے پہلے\" } } }, minute: { displayName: \"منٹ\", relative: { 0: \"اس منٹ\" }, relativeTime: { future: { one: \"{0} منٹ میں\", other: \"{0} منٹ میں\" }, past: { one: \"{0} منٹ قبل\", other: \"{0} منٹ قبل\" } } }, second: { displayName: \"سیکنڈ\", relative: { 0: \"اب\" }, relativeTime: { future: { one: \"{0} سیکنڈ میں\", other: \"{0} سیکنڈ میں\" }, past: { one: \"{0} سیکنڈ قبل\", other: \"{0} سیکنڈ قبل\" } } } } }];\n});\n\n//////////////////\n// WEBPACK FOOTER\n// /Users/jip/Yoast/wp-content/plugins/wordpress-seo/node_modules/react-intl/locale-data/ur.js\n// module id = 543\n// module chunks = 18\n\n//# sourceURL=webpack:////Users/jip/Yoast/wp-content/plugins/wordpress-seo/node_modules/react-intl/locale-data/ur.js?");

/***/ })

});