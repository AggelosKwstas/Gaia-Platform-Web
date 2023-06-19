/*
 Highcharts JS v11.0.0 (2023-04-26)

 (c) 2009-2021 Sebastian Bochan, Rafal Sebestjanski

 License: www.highcharts.com/license
*/
'use strict';(function(a){"object"===typeof module&&module.exports?(a["default"]=a,module.exports=a):"function"===typeof define&&define.amd?define("highcharts/modules/dumbbell",["highcharts"],function(f){a(f);a.Highcharts=f;return a}):a("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(a){function f(a,e,l,h){a.hasOwnProperty(e)||(a[e]=h.apply(null,l),"function"===typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:e,module:a[e]}})))}a=a?a._modules:
{};f(a,"Series/AreaRange/AreaRangePoint.js",[a["Core/Series/SeriesRegistry.js"],a["Core/Utilities.js"]],function(a,e){var l=this&&this.__extends||function(){var a=function(b,d){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,b){a.__proto__=b}||function(a,b){for(var d in b)Object.prototype.hasOwnProperty.call(b,d)&&(a[d]=b[d])};return a(b,d)};return function(b,d){function u(){this.constructor=b}if("function"!==typeof d&&null!==d)throw new TypeError("Class extends value "+String(d)+
" is not a constructor or null");a(b,d);b.prototype=null===d?Object.create(d):(u.prototype=d.prototype,new u)}}();a=a.seriesTypes.area.prototype;var h=a.pointClass.prototype,m=e.defined,n=e.isNumber;return function(a){function b(){var b=null!==a&&a.apply(this,arguments)||this;b.high=void 0;b.low=void 0;b.options=void 0;b.plotX=void 0;b.series=void 0;return b}l(b,a);b.prototype.setState=function(){var b=this.state,a=this.series,c=a.chart.polar;m(this.plotHigh)||(this.plotHigh=a.yAxis.toPixels(this.high,
!0));m(this.plotLow)||(this.plotLow=this.plotY=a.yAxis.toPixels(this.low,!0));a.stateMarkerGraphic&&(a.lowerStateMarkerGraphic=a.stateMarkerGraphic,a.stateMarkerGraphic=a.upperStateMarkerGraphic);this.graphic=this.graphics&&this.graphics[1];this.plotY=this.plotHigh;c&&n(this.plotHighX)&&(this.plotX=this.plotHighX);h.setState.apply(this,arguments);this.state=b;this.plotY=this.plotLow;this.graphic=this.graphics&&this.graphics[0];c&&n(this.plotLowX)&&(this.plotX=this.plotLowX);a.stateMarkerGraphic&&
(a.upperStateMarkerGraphic=a.stateMarkerGraphic,a.stateMarkerGraphic=a.lowerStateMarkerGraphic,a.lowerStateMarkerGraphic=void 0);h.setState.apply(this,arguments)};b.prototype.haloPath=function(){var a=this.series.chart.polar,b=[];this.plotY=this.plotLow;a&&n(this.plotLowX)&&(this.plotX=this.plotLowX);this.isInside&&(b=h.haloPath.apply(this,arguments));this.plotY=this.plotHigh;a&&n(this.plotHighX)&&(this.plotX=this.plotHighX);this.isTopInside&&(b=b.concat(h.haloPath.apply(this,arguments)));return b};
b.prototype.isValid=function(){return n(this.low)&&n(this.high)};return b}(a.pointClass)});f(a,"Series/Dumbbell/DumbbellPoint.js",[a["Series/AreaRange/AreaRangePoint.js"],a["Core/Utilities.js"]],function(a,e){var l=this&&this.__extends||function(){var a=function(c,b){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,b){a.__proto__=b}||function(a,b){for(var d in b)Object.prototype.hasOwnProperty.call(b,d)&&(a[d]=b[d])};return a(c,b)};return function(c,b){function d(){this.constructor=
c}if("function"!==typeof b&&null!==b)throw new TypeError("Class extends value "+String(b)+" is not a constructor or null");a(c,b);c.prototype=null===b?Object.create(b):(d.prototype=b.prototype,new d)}}(),h=e.extend,m=e.pick;e=function(a){function c(){var b=null!==a&&a.apply(this,arguments)||this;b.series=void 0;b.options=void 0;b.connector=void 0;b.pointWidth=void 0;return b}l(c,a);c.prototype.setState=function(){var a=this.series,d=a.chart,c=a.options.marker,e=this.options,l=m(e.lowColor,a.options.lowColor,
e.color,this.zone&&this.zone.color,this.color,a.color),n="attr";this.pointSetState.apply(this,arguments);if(!this.state){n="animate";var f=this.graphics||[],k=f[0];f=f[1];k&&!d.styledMode&&(k.attr({fill:l}),f&&(d={y:this.y,zone:this.zone},this.y=this.high,this.zone=this.zone?this.getZone():void 0,c=m(this.marker?this.marker.fillColor:void 0,c?c.fillColor:void 0,e.color,this.zone?this.zone.color:void 0,this.color),f.attr({fill:c}),h(this,d)))}this.connector[n](a.getConnectorAttribs(this))};c.prototype.destroy=
function(){this.graphic||(this.graphic=this.connector,this.connector=void 0);return a.prototype.destroy.call(this)};return c}(a);h(e.prototype,{pointSetState:a.prototype.setState});return e});f(a,"Series/Dumbbell/DumbbellSeries.js",[a["Series/Column/ColumnSeries.js"],a["Series/Dumbbell/DumbbellPoint.js"],a["Core/Globals.js"],a["Core/Series/Series.js"],a["Core/Series/SeriesRegistry.js"],a["Core/Renderer/SVG/SVGRenderer.js"],a["Core/Utilities.js"]],function(a,e,f,h,m,n,c){var b=this&&this.__extends||
function(){var a=function(b,g){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,g){a.__proto__=g}||function(a,g){for(var b in g)Object.prototype.hasOwnProperty.call(g,b)&&(a[b]=g[b])};return a(b,g)};return function(b,g){function d(){this.constructor=b}if("function"!==typeof g&&null!==g)throw new TypeError("Class extends value "+String(g)+" is not a constructor or null");a(b,g);b.prototype=null===g?Object.create(g):(d.prototype=g.prototype,new d)}}(),d=a.prototype;f=f.noop;var l=
h.prototype;h=m.seriesTypes;var r=h.arearange;h=h.columnrange.prototype;var t=r.prototype,v=c.extend,w=c.merge,k=c.pick;c=function(a){function c(){var g=null!==a&&a.apply(this,arguments)||this;g.data=void 0;g.options=void 0;g.points=void 0;g.columnMetrics=void 0;return g}b(c,a);c.prototype.getConnectorAttribs=function(a){var b=this.chart,g=a.options,c=this.options,d=this.xAxis,e=this.yAxis,f=k(g.connectorWidth,c.connectorWidth),h=k(g.connectorColor,c.connectorColor,g.color,a.zone?a.zone.color:void 0,
a.color),l=k(c.states&&c.states.hover&&c.states.hover.connectorWidthPlus,1),m=k(g.dashStyle,c.dashStyle),q=k(a.plotLow,a.plotY),p=e.toPixels(c.threshold||0,!0);p=k(a.plotHigh,b.inverted?e.len-p:p);if("number"!==typeof q)return{};a.state&&(f+=l);0>q?q=0:q>=e.len&&(q=e.len);0>p?p=0:p>=e.len&&(p=e.len);if(0>a.plotX||a.plotX>d.len)f=0;a.graphics&&a.graphics[1]&&(d={y:a.y,zone:a.zone},a.y=a.high,a.zone=a.zone?a.getZone():void 0,h=k(g.connectorColor,c.connectorColor,g.color,a.zone?a.zone.color:void 0,a.color),
v(a,d));a={d:n.prototype.crispLine([["M",a.plotX,q],["L",a.plotX,p]],f,"ceil")};b.styledMode||(a.stroke=h,a["stroke-width"]=f,m&&(a.dashstyle=m));return a};c.prototype.drawConnector=function(a){var b=k(this.options.animationLimit,250);b=a.connector&&this.chart.pointCount<b?"animate":"attr";a.connector||(a.connector=this.chart.renderer.path().addClass("highcharts-lollipop-stem").attr({zIndex:-1}).add(this.group));a.connector[b](this.getConnectorAttribs(a))};c.prototype.getColumnMetrics=function(){var a=
d.getColumnMetrics.apply(this,arguments);a.offset+=a.width/2;return a};c.prototype.translate=function(){var a=this,b=this.chart.inverted;this.setShapeArgs.apply(this);this.translatePoint.apply(this,arguments);this.points.forEach(function(c){var g=c.pointWidth,d=c.shapeArgs;d=void 0===d?{}:d;var e=c.tooltipPos;c.plotX=d.x||0;d.x=c.plotX-g/2;e&&(b?e[1]=a.xAxis.len-c.plotX:e[0]=c.plotX)});this.columnMetrics.offset-=this.columnMetrics.width/2};c.prototype.drawPoints=function(){var a=this.chart,b=this.points.length,
c=this.lowColor=this.options.lowColor,d=0;for(this.seriesDrawPoints.apply(this,arguments);d<b;){var e=this.points[d];var f=e.graphics||[];var h=f[0];f=f[1];this.drawConnector(e);f&&(f.element.point=e,f.addClass("highcharts-lollipop-high"));e.connector.element.point=e;h&&(f=e.zone&&e.zone.color,e=k(e.options.lowColor,c,e.options.color,f,e.color,this.color),a.styledMode||h.attr({fill:e}),h.addClass("highcharts-lollipop-low"));d++}};c.prototype.markerAttribs=function(){var a=t.markerAttribs.apply(this,
arguments);a.x=Math.floor(a.x||0);a.y=Math.floor(a.y||0);return a};c.prototype.pointAttribs=function(a,b){var c=l.pointAttribs.apply(this,arguments);"hover"===b&&delete c.fill;return c};c.defaultOptions=w(r.defaultOptions,{trackByArea:!1,fillColor:"none",lineWidth:0,pointRange:1,connectorWidth:1,stickyTracking:!1,groupPadding:.2,crisp:!1,pointPadding:.1,lowColor:"#333333",states:{hover:{lineWidthPlus:0,connectorWidthPlus:1,halo:!1}}});return c}(r);v(c.prototype,{crispCol:d.crispCol,drawGraph:f,drawTracker:a.prototype.drawTracker,
pointClass:e,setShapeArgs:h.translate,seriesDrawPoints:t.drawPoints,trackerGroups:["group","markerGroup","dataLabelsGroup"],translatePoint:t.translate});m.registerSeriesType("dumbbell",c);"";return c});f(a,"masters/modules/dumbbell.src.js",[],function(){})});
//# sourceMappingURL=dumbbell.js.map