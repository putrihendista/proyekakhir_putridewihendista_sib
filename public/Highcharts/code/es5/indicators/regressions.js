/**
 * Highstock JS v11.2.0 (2023-10-30)
 *
 * Indicator series type for Highcharts Stock
 *
 * (c) 2010-2021 Kamil Kulig
 *
 * License: www.highcharts.com/license
 */!function(t){"object"==typeof module&&module.exports?(t.default=t,module.exports=t):"function"==typeof define&&define.amd?define("highcharts/indicators/regressions",["highcharts","highcharts/modules/stock"],function(e){return t(e),t.Highcharts=e,t}):t("undefined"!=typeof Highcharts?Highcharts:void 0)}(function(t){"use strict";var e=t?t._modules:{};function n(t,e,n,o){t.hasOwnProperty(e)||(t[e]=o.apply(null,n),"function"==typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:e,module:t[e]}})))}n(e,"Stock/Indicators/LinearRegression/LinearRegressionIndicator.js",[e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(t,e){var n,o=this&&this.__extends||(n=function(t,e){return(n=Object.setPrototypeOf||({__proto__:[]})instanceof Array&&function(t,e){t.__proto__=e}||function(t,e){for(var n in e)Object.prototype.hasOwnProperty.call(e,n)&&(t[n]=e[n])})(t,e)},function(t,e){if("function"!=typeof e&&null!==e)throw TypeError("Class extends value "+String(e)+" is not a constructor or null");function o(){this.constructor=t}n(t,e),t.prototype=null===e?Object.create(e):(o.prototype=e.prototype,new o)}),r=t.seriesTypes.sma,i=e.isArray,s=e.extend,a=e.merge,p=function(t){function e(){var e=null!==t&&t.apply(this,arguments)||this;return e.data=void 0,e.options=void 0,e.points=void 0,e}return o(e,t),e.prototype.getRegressionLineParameters=function(t,e){var n,o,r=this.options.params.index,s=function(t,e){return i(t)?t[e]:t},a=t.reduce(function(t,e){return e+t},0),p=e.reduce(function(t,e){return s(e,r)+t},0),u=a/t.length,c=p/e.length,l=0,f=0;for(o=0;o<t.length;o++)l+=(n=t[o]-u)*(s(e[o],r)-c),f+=Math.pow(n,2);var d=f?l/f:0;return{slope:d,intercept:c-d*u}},e.prototype.getEndPointY=function(t,e){return t.slope*e+t.intercept},e.prototype.transformXData=function(t,e){var n=t[0];return t.map(function(t){return(t-n)/e})},e.prototype.findClosestDistance=function(t){var e,n,o;for(o=1;o<t.length-1;o++)(e=t[o]-t[o-1])>0&&(void 0===n||e<n)&&(n=e);return n},e.prototype.getValues=function(t,e){var n,o,r,i,s,a,p,u,c,l=t.xData,f=t.yData,d=e.period,y={xData:[],yData:[],values:[]},g=this.options.params.xAxisUnit||this.findClosestDistance(l);for(o=d-1;o<=l.length-1;o++)r=o-d+1,i=o+1,s=l[o],p=l.slice(r,i),u=f.slice(r,i),c=this.transformXData(p,g),n=this.getRegressionLineParameters(c,u),a=this.getEndPointY(n,c[c.length-1]),y.values.push({regressionLineParameters:n,x:s,y:a}),y.xData.push(s),y.yData.push(a);return y},e.defaultOptions=a(r.defaultOptions,{params:{xAxisUnit:null},tooltip:{valueDecimals:4}}),e}(r);return s(p.prototype,{nameBase:"Linear Regression Indicator"}),t.registerSeriesType("linearRegression",p),p}),n(e,"Stock/Indicators/LinearRegressionSlopes/LinearRegressionSlopesIndicator.js",[e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(t,e){var n,o=this&&this.__extends||(n=function(t,e){return(n=Object.setPrototypeOf||({__proto__:[]})instanceof Array&&function(t,e){t.__proto__=e}||function(t,e){for(var n in e)Object.prototype.hasOwnProperty.call(e,n)&&(t[n]=e[n])})(t,e)},function(t,e){if("function"!=typeof e&&null!==e)throw TypeError("Class extends value "+String(e)+" is not a constructor or null");function o(){this.constructor=t}n(t,e),t.prototype=null===e?Object.create(e):(o.prototype=e.prototype,new o)}),r=t.seriesTypes.linearRegression,i=e.extend,s=e.merge,a=function(t){function e(){var e=null!==t&&t.apply(this,arguments)||this;return e.data=void 0,e.options=void 0,e.points=void 0,e}return o(e,t),e.prototype.getEndPointY=function(t){return t.slope},e.defaultOptions=s(r.defaultOptions),e}(r);return i(a.prototype,{nameBase:"Linear Regression Slope Indicator"}),t.registerSeriesType("linearRegressionSlope",a),a}),n(e,"Stock/Indicators/LinearRegressionIntercept/LinearRegressionInterceptIndicator.js",[e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(t,e){var n,o=this&&this.__extends||(n=function(t,e){return(n=Object.setPrototypeOf||({__proto__:[]})instanceof Array&&function(t,e){t.__proto__=e}||function(t,e){for(var n in e)Object.prototype.hasOwnProperty.call(e,n)&&(t[n]=e[n])})(t,e)},function(t,e){if("function"!=typeof e&&null!==e)throw TypeError("Class extends value "+String(e)+" is not a constructor or null");function o(){this.constructor=t}n(t,e),t.prototype=null===e?Object.create(e):(o.prototype=e.prototype,new o)}),r=t.seriesTypes.linearRegression,i=e.extend,s=e.merge,a=function(t){function e(){var e=null!==t&&t.apply(this,arguments)||this;return e.data=void 0,e.options=void 0,e.points=void 0,e}return o(e,t),e.prototype.getEndPointY=function(t){return t.intercept},e.defaultOptions=s(r.defaultOptions),e}(r);return i(a.prototype,{nameBase:"Linear Regression Intercept Indicator"}),t.registerSeriesType("linearRegressionIntercept",a),a}),n(e,"Stock/Indicators/LinearRegressionAngle/LinearRegressionAngleIndicator.js",[e["Core/Series/SeriesRegistry.js"],e["Core/Utilities.js"]],function(t,e){var n,o=this&&this.__extends||(n=function(t,e){return(n=Object.setPrototypeOf||({__proto__:[]})instanceof Array&&function(t,e){t.__proto__=e}||function(t,e){for(var n in e)Object.prototype.hasOwnProperty.call(e,n)&&(t[n]=e[n])})(t,e)},function(t,e){if("function"!=typeof e&&null!==e)throw TypeError("Class extends value "+String(e)+" is not a constructor or null");function o(){this.constructor=t}n(t,e),t.prototype=null===e?Object.create(e):(o.prototype=e.prototype,new o)}),r=t.seriesTypes.linearRegression,i=e.extend,s=e.merge,a=function(t){function e(){var e=null!==t&&t.apply(this,arguments)||this;return e.data=void 0,e.options=void 0,e.points=void 0,e}return o(e,t),e.prototype.slopeToAngle=function(t){return Math.atan(t)*(180/Math.PI)},e.prototype.getEndPointY=function(t){return this.slopeToAngle(t.slope)},e.defaultOptions=s(r.defaultOptions,{tooltip:{pointFormat:'<span style="color:{point.color}">●</span>{series.name}: <b>{point.y}\xb0</b><br/>'}}),e}(r);return i(a.prototype,{nameBase:"Linear Regression Angle Indicator"}),t.registerSeriesType("linearRegressionAngle",a),a}),n(e,"masters/indicators/regressions.src.js",[],function(){})});//# sourceMappingURL=regressions.js.map