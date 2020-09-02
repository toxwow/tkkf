(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[2],{

/***/ "./node_modules/@fullcalendar/daygrid/main.css":
/*!*****************************************************!*\
  !*** ./node_modules/@fullcalendar/daygrid/main.css ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../css-loader??ref--6-1!../../postcss-loader/src??ref--6-2!./main.css */ "./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/@fullcalendar/daygrid/main.css");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/@fullcalendar/daygrid/main.js":
/*!****************************************************!*\
  !*** ./node_modules/@fullcalendar/daygrid/main.js ***!
  \****************************************************/
/*! exports provided: default, DayGridView, DayTable, DayTableSlicer, Table, TableView, buildDayTableModel */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DayGridView", function() { return DayTableView; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DayTable", function() { return DayTable; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DayTableSlicer", function() { return DayTableSlicer; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Table", function() { return Table; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "TableView", function() { return TableView; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "buildDayTableModel", function() { return buildDayTableModel; });
/* harmony import */ var _main_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./main.css */ "./node_modules/@fullcalendar/daygrid/main.css");
/* harmony import */ var _main_css__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_main_css__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @fullcalendar/common */ "./node_modules/@fullcalendar/common/main.js");
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! tslib */ "./node_modules/@fullcalendar/daygrid/node_modules/tslib/tslib.es6.js");
/*!
FullCalendar v5.2.1
Docs & License: https://fullcalendar.io/
(c) 2020 Adam Shaw
*/





/* An abstract class for the daygrid views, as well as month view. Renders one or more rows of day cells.
----------------------------------------------------------------------------------------------------------------------*/
// It is a manager for a Table subcomponent, which does most of the heavy lifting.
// It is responsible for managing width/height.
var TableView = /** @class */ (function (_super) {
    Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__extends"])(TableView, _super);
    function TableView() {
        var _this = _super !== null && _super.apply(this, arguments) || this;
        _this.headerElRef = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createRef"])();
        return _this;
    }
    TableView.prototype.renderSimpleLayout = function (headerRowContent, bodyContent) {
        var _a = this, props = _a.props, context = _a.context;
        var sections = [];
        var stickyHeaderDates = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["getStickyHeaderDates"])(context.options);
        if (headerRowContent) {
            sections.push({
                type: 'header',
                key: 'header',
                isSticky: stickyHeaderDates,
                chunk: {
                    elRef: this.headerElRef,
                    tableClassName: 'fc-col-header',
                    rowContent: headerRowContent
                }
            });
        }
        sections.push({
            type: 'body',
            key: 'body',
            liquid: true,
            chunk: { content: bodyContent }
        });
        return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["ViewRoot"], { viewSpec: context.viewSpec }, function (rootElRef, classNames) { return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { ref: rootElRef, className: ['fc-daygrid'].concat(classNames).join(' ') },
            Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["SimpleScrollGrid"], { liquid: !props.isHeightAuto && !props.forPrint, cols: [] /* TODO: make optional? */, sections: sections }))); }));
    };
    TableView.prototype.renderHScrollLayout = function (headerRowContent, bodyContent, colCnt, dayMinWidth) {
        var ScrollGrid = this.context.pluginHooks.scrollGridImpl;
        if (!ScrollGrid) {
            throw new Error('No ScrollGrid implementation');
        }
        var _a = this, props = _a.props, context = _a.context;
        var stickyHeaderDates = !props.forPrint && Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["getStickyHeaderDates"])(context.options);
        var stickyFooterScrollbar = !props.forPrint && Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["getStickyFooterScrollbar"])(context.options);
        var sections = [];
        if (headerRowContent) {
            sections.push({
                type: 'header',
                key: 'header',
                isSticky: stickyHeaderDates,
                chunks: [{
                        key: 'main',
                        elRef: this.headerElRef,
                        tableClassName: 'fc-col-header',
                        rowContent: headerRowContent
                    }]
            });
        }
        sections.push({
            type: 'body',
            key: 'body',
            liquid: true,
            chunks: [{
                    key: 'main',
                    content: bodyContent
                }]
        });
        if (stickyFooterScrollbar) {
            sections.push({
                type: 'footer',
                key: 'footer',
                isSticky: true,
                chunks: [{
                        key: 'main',
                        content: _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["renderScrollShim"]
                    }]
            });
        }
        return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["ViewRoot"], { viewSpec: context.viewSpec }, function (rootElRef, classNames) { return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { ref: rootElRef, className: ['fc-daygrid'].concat(classNames).join(' ') },
            Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(ScrollGrid, { liquid: !props.isHeightAuto && !props.forPrint, colGroups: [{ cols: [{ span: colCnt, minWidth: dayMinWidth }] }], sections: sections }))); }));
    };
    return TableView;
}(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DateComponent"]));

function splitSegsByRow(segs, rowCnt) {
    var byRow = [];
    for (var i = 0; i < rowCnt; i++) {
        byRow[i] = [];
    }
    for (var _i = 0, segs_1 = segs; _i < segs_1.length; _i++) {
        var seg = segs_1[_i];
        byRow[seg.row].push(seg);
    }
    return byRow;
}
function splitSegsByFirstCol(segs, colCnt) {
    var byCol = [];
    for (var i = 0; i < colCnt; i++) {
        byCol[i] = [];
    }
    for (var _i = 0, segs_2 = segs; _i < segs_2.length; _i++) {
        var seg = segs_2[_i];
        byCol[seg.firstCol].push(seg);
    }
    return byCol;
}
function splitInteractionByRow(ui, rowCnt) {
    var byRow = [];
    if (!ui) {
        for (var i = 0; i < rowCnt; i++) {
            byRow[i] = null;
        }
    }
    else {
        for (var i = 0; i < rowCnt; i++) {
            byRow[i] = {
                affectedInstances: ui.affectedInstances,
                isEvent: ui.isEvent,
                segs: []
            };
        }
        for (var _i = 0, _a = ui.segs; _i < _a.length; _i++) {
            var seg = _a[_i];
            byRow[seg.row].segs.push(seg);
        }
    }
    return byRow;
}

var DEFAULT_WEEK_NUM_FORMAT = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createFormatter"])({ week: 'narrow' });
var TableCell = /** @class */ (function (_super) {
    Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__extends"])(TableCell, _super);
    function TableCell() {
        var _this = _super !== null && _super.apply(this, arguments) || this;
        _this.handleRootEl = function (el) {
            _this.rootEl = el;
            Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["setRef"])(_this.props.elRef, el);
        };
        _this.handleMoreLinkClick = function (ev) {
            var props = _this.props;
            if (props.onMoreClick) {
                var allSegs = props.segsByEachCol;
                var hiddenSegs = allSegs.filter(function (seg) { return props.segIsHidden[seg.eventRange.instance.instanceId]; });
                props.onMoreClick({
                    date: props.date,
                    allSegs: allSegs,
                    hiddenSegs: hiddenSegs,
                    moreCnt: props.moreCnt,
                    dayEl: _this.rootEl,
                    ev: ev
                });
            }
        };
        return _this;
    }
    TableCell.prototype.render = function () {
        var _this = this;
        var _a = this.context, options = _a.options, viewApi = _a.viewApi;
        var props = this.props;
        var date = props.date, dateProfile = props.dateProfile;
        var hookProps = {
            num: props.moreCnt,
            text: props.buildMoreLinkText(props.moreCnt),
            view: viewApi
        };
        var navLinkAttrs = options.navLinks
            ? { 'data-navlink': Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["buildNavLinkData"])(date, 'week'), tabIndex: 0 }
            : {};
        return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DayCellRoot"], { date: date, dateProfile: dateProfile, todayRange: props.todayRange, showDayNumber: props.showDayNumber, extraHookProps: props.extraHookProps, elRef: this.handleRootEl }, function (rootElRef, classNames, rootDataAttrs, isDisabled) { return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("td", Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({ ref: rootElRef, className: ['fc-daygrid-day'].concat(classNames, props.extraClassNames || []).join(' ') }, rootDataAttrs, props.extraDataAttrs),
            Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { className: 'fc-daygrid-day-frame fc-scrollgrid-sync-inner', ref: props.innerElRef /* different from hook system! RENAME */ },
                props.showWeekNumber &&
                    Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["WeekNumberRoot"], { date: date, defaultFormat: DEFAULT_WEEK_NUM_FORMAT }, function (rootElRef, classNames, innerElRef, innerContent) { return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("a", Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({ ref: rootElRef, className: ['fc-daygrid-week-number'].concat(classNames).join(' ') }, navLinkAttrs), innerContent)); }),
                !isDisabled &&
                    Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(TableCellTop, { date: date, dateProfile: dateProfile, showDayNumber: props.showDayNumber, forceDayTop: props.forceDayTop, todayRange: props.todayRange, extraHookProps: props.extraHookProps }),
                Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { className: 'fc-daygrid-day-events', ref: props.fgContentElRef, style: { paddingBottom: props.fgPaddingBottom } },
                    props.fgContent,
                    Boolean(props.moreCnt) &&
                        Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { className: 'fc-daygrid-day-bottom', style: { marginTop: props.moreMarginTop } },
                            Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["RenderHook"], { hookProps: hookProps, classNames: options.moreLinkClassNames, content: options.moreLinkContent, defaultContent: renderMoreLinkInner, didMount: options.moreLinkDidMount, willUnmount: options.moreLinkWillUnmount }, function (rootElRef, classNames, innerElRef, innerContent) { return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("a", { onClick: _this.handleMoreLinkClick, ref: rootElRef, className: ['fc-daygrid-more-link'].concat(classNames).join(' ') }, innerContent)); }))),
                Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { className: 'fc-daygrid-day-bg' }, props.bgContent)))); }));
    };
    return TableCell;
}(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DateComponent"]));
function renderTopInner(props) {
    return props.dayNumberText;
}
function renderMoreLinkInner(props) {
    return props.text;
}
var TableCellTop = /** @class */ (function (_super) {
    Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__extends"])(TableCellTop, _super);
    function TableCellTop() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    TableCellTop.prototype.render = function () {
        var props = this.props;
        var navLinkAttrs = this.context.options.navLinks
            ? { 'data-navlink': Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["buildNavLinkData"])(props.date), tabIndex: 0 }
            : {};
        return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DayCellContent"], { date: props.date, dateProfile: props.dateProfile, todayRange: props.todayRange, showDayNumber: props.showDayNumber, extraHookProps: props.extraHookProps, defaultContent: renderTopInner }, function (innerElRef, innerContent) { return ((innerContent || props.forceDayTop) &&
            Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { className: 'fc-daygrid-day-top', ref: innerElRef },
                Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("a", Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({ className: 'fc-daygrid-day-number' }, navLinkAttrs), innerContent || Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, "\u00A0")))); }));
    };
    return TableCellTop;
}(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["BaseComponent"]));

var DEFAULT_TABLE_EVENT_TIME_FORMAT = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createFormatter"])({
    hour: 'numeric',
    minute: '2-digit',
    omitZeroMinute: true,
    meridiem: 'narrow'
});
function hasListItemDisplay(seg) {
    var display = seg.eventRange.ui.display;
    return display === 'list-item' || (display === 'auto' &&
        !seg.eventRange.def.allDay &&
        seg.firstCol === seg.lastCol && // can't be multi-day
        seg.isStart && // "
        seg.isEnd // "
    );
}

var TableListItemEvent = /** @class */ (function (_super) {
    Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__extends"])(TableListItemEvent, _super);
    function TableListItemEvent() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    TableListItemEvent.prototype.render = function () {
        var _a = this, props = _a.props, context = _a.context;
        var timeFormat = context.options.eventTimeFormat || DEFAULT_TABLE_EVENT_TIME_FORMAT;
        var timeText = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["buildSegTimeText"])(props.seg, timeFormat, context, true, props.defaultDisplayEventEnd);
        return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["EventRoot"], { seg: props.seg, timeText: timeText, defaultContent: renderInnerContent, isDragging: props.isDragging, isResizing: false, isDateSelecting: false, isSelected: props.isSelected, isPast: props.isPast, isFuture: props.isFuture, isToday: props.isToday }, function (rootElRef, classNames, innerElRef, innerContent) { return ( // we don't use styles!
        Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("a", Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({ className: ['fc-daygrid-event', 'fc-daygrid-dot-event'].concat(classNames).join(' '), ref: rootElRef }, getSegAnchorAttrs(props.seg)), innerContent)); }));
    };
    return TableListItemEvent;
}(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["BaseComponent"]));
function renderInnerContent(innerProps) {
    return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null,
        Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { className: 'fc-daygrid-event-dot', style: { borderColor: innerProps.borderColor || innerProps.backgroundColor } }),
        innerProps.timeText &&
            Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { className: 'fc-event-time' }, innerProps.timeText),
        Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { className: 'fc-event-title' }, innerProps.event.title || Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, "\u00A0"))));
}
function getSegAnchorAttrs(seg) {
    var url = seg.eventRange.def.url;
    return url ? { href: url } : {};
}

var TableBlockEvent = /** @class */ (function (_super) {
    Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__extends"])(TableBlockEvent, _super);
    function TableBlockEvent() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    TableBlockEvent.prototype.render = function () {
        var props = this.props;
        return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["StandardEvent"], Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({}, props, { extraClassNames: ['fc-daygrid-event', 'fc-daygrid-block-event', 'fc-h-event'], defaultTimeFormat: DEFAULT_TABLE_EVENT_TIME_FORMAT, defaultDisplayEventEnd: props.defaultDisplayEventEnd, disableResizing: !props.seg.eventRange.def.allDay })));
    };
    return TableBlockEvent;
}(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["BaseComponent"]));

function computeFgSegPlacement(// for one row. TODO: print mode?
cellModels, segs, dayMaxEvents, dayMaxEventRows, eventHeights, maxContentHeight, colCnt, eventOrderSpecs) {
    var colPlacements = []; // if event spans multiple cols, its present in each col
    var moreCnts = []; // by-col
    var segIsHidden = {};
    var segTops = {}; // always populated for each seg
    var segMarginTops = {}; // simetimes populated for each seg
    var moreTops = {};
    var paddingBottoms = {}; // for each cell's inner-wrapper div
    for (var i = 0; i < colCnt; i++) {
        colPlacements.push([]);
        moreCnts.push(0);
    }
    segs = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["sortEventSegs"])(segs, eventOrderSpecs);
    for (var _i = 0, segs_1 = segs; _i < segs_1.length; _i++) {
        var seg = segs_1[_i];
        var instanceId = seg.eventRange.instance.instanceId;
        var eventHeight = eventHeights[instanceId + ':' + seg.firstCol];
        placeSeg(seg, eventHeight || 0); // will keep colPlacements sorted by top
    }
    if (dayMaxEvents === true || dayMaxEventRows === true) {
        limitByMaxHeight(moreCnts, segIsHidden, colPlacements, maxContentHeight); // populates moreCnts/segIsHidden
    }
    else if (typeof dayMaxEvents === 'number') {
        limitByMaxEvents(moreCnts, segIsHidden, colPlacements, dayMaxEvents); // populates moreCnts/segIsHidden
    }
    else if (typeof dayMaxEventRows === 'number') {
        limitByMaxRows(moreCnts, segIsHidden, colPlacements, dayMaxEventRows); // populates moreCnts/segIsHidden
    }
    // computes segTops/segMarginTops/moreTops/paddingBottoms
    for (var col = 0; col < colCnt; col++) {
        var placements = colPlacements[col];
        var currentNonAbsBottom = 0;
        var runningAbsHeight = 0;
        for (var _a = 0, placements_1 = placements; _a < placements_1.length; _a++) {
            var placement = placements_1[_a];
            var seg = placement.seg;
            if (!segIsHidden[seg.eventRange.instance.instanceId]) {
                segTops[seg.eventRange.instance.instanceId] = placement.top; // from top of container
                if (seg.firstCol === seg.lastCol && seg.isStart && seg.isEnd) { // TODO: simpler way? NOT DRY
                    segMarginTops[seg.eventRange.instance.instanceId] =
                        placement.top - currentNonAbsBottom; // from previous seg bottom
                    runningAbsHeight = 0;
                    currentNonAbsBottom = placement.bottom;
                }
                else { // multi-col event, abs positioned
                    runningAbsHeight += placement.bottom - placement.top;
                }
            }
        }
        if (runningAbsHeight) {
            if (moreCnts[col]) {
                moreTops[col] = runningAbsHeight;
            }
            else {
                paddingBottoms[col] = runningAbsHeight;
            }
        }
    }
    function placeSeg(seg, segHeight) {
        if (!tryPlaceSegAt(seg, segHeight, 0)) {
            for (var col = seg.firstCol; col <= seg.lastCol; col++) {
                for (var _i = 0, _a = colPlacements[col]; _i < _a.length; _i++) { // will repeat multi-day segs!!!!!!! bad!!!!!!
                    var placement = _a[_i];
                    if (tryPlaceSegAt(seg, segHeight, placement.bottom)) {
                        return;
                    }
                }
            }
        }
    }
    function tryPlaceSegAt(seg, segHeight, top) {
        if (canPlaceSegAt(seg, segHeight, top)) {
            for (var col = seg.firstCol; col <= seg.lastCol; col++) {
                var placements = colPlacements[col];
                var insertionIndex = 0;
                while (insertionIndex < placements.length &&
                    top >= placements[insertionIndex].top) {
                    insertionIndex++;
                }
                placements.splice(insertionIndex, 0, {
                    seg: seg,
                    top: top,
                    bottom: top + segHeight
                });
            }
            return true;
        }
        else {
            return false;
        }
    }
    function canPlaceSegAt(seg, segHeight, top) {
        for (var col = seg.firstCol; col <= seg.lastCol; col++) {
            for (var _i = 0, _a = colPlacements[col]; _i < _a.length; _i++) {
                var placement = _a[_i];
                if (top < placement.bottom && top + segHeight > placement.top) { // collide?
                    return false;
                }
            }
        }
        return true;
    }
    // what does this do!?
    for (var instanceIdAndFirstCol in eventHeights) {
        if (!eventHeights[instanceIdAndFirstCol]) {
            segIsHidden[instanceIdAndFirstCol.split(':')[0]] = true;
        }
    }
    var segsByFirstCol = colPlacements.map(extractFirstColSegs); // operates on the sorted cols
    var segsByEachCol = colPlacements.map(function (placements, col) {
        var segs = extractAllColSegs(placements);
        segs = resliceDaySegs(segs, cellModels[col].date, col);
        return segs;
    });
    return {
        segsByFirstCol: segsByFirstCol,
        segsByEachCol: segsByEachCol,
        segIsHidden: segIsHidden,
        segTops: segTops,
        segMarginTops: segMarginTops,
        moreCnts: moreCnts,
        moreTops: moreTops,
        paddingBottoms: paddingBottoms
    };
}
function extractFirstColSegs(oneColPlacements, col) {
    var segs = [];
    for (var _i = 0, oneColPlacements_1 = oneColPlacements; _i < oneColPlacements_1.length; _i++) {
        var placement = oneColPlacements_1[_i];
        if (placement.seg.firstCol === col) {
            segs.push(placement.seg);
        }
    }
    return segs;
}
function extractAllColSegs(oneColPlacements) {
    var segs = [];
    for (var _i = 0, oneColPlacements_2 = oneColPlacements; _i < oneColPlacements_2.length; _i++) {
        var placement = oneColPlacements_2[_i];
        segs.push(placement.seg);
    }
    return segs;
}
function limitByMaxHeight(hiddenCnts, segIsHidden, colPlacements, maxContentHeight) {
    limitEvents(hiddenCnts, segIsHidden, colPlacements, true, function (placement) {
        return placement.bottom <= maxContentHeight;
    });
}
function limitByMaxEvents(hiddenCnts, segIsHidden, colPlacements, dayMaxEvents) {
    limitEvents(hiddenCnts, segIsHidden, colPlacements, false, function (placement, levelIndex) {
        return levelIndex < dayMaxEvents;
    });
}
function limitByMaxRows(hiddenCnts, segIsHidden, colPlacements, dayMaxEventRows) {
    limitEvents(hiddenCnts, segIsHidden, colPlacements, true, function (placement, levelIndex) {
        return levelIndex < dayMaxEventRows;
    });
}
/*
populates the given hiddenCnts/segIsHidden, which are supplied empty.
TODO: return them instead
*/
function limitEvents(hiddenCnts, segIsHidden, colPlacements, moreLinkConsumesLevel, isPlacementInBounds) {
    var colCnt = hiddenCnts.length;
    var segIsVisible = {}; // TODO: instead, use segIsHidden with true/false?
    var visibleColPlacements = []; // will mirror colPlacements
    for (var col = 0; col < colCnt; col++) {
        visibleColPlacements.push([]);
    }
    for (var col = 0; col < colCnt; col++) {
        var placements = colPlacements[col];
        var level = 0;
        for (var _i = 0, placements_2 = placements; _i < placements_2.length; _i++) {
            var placement = placements_2[_i];
            if (isPlacementInBounds(placement, level)) {
                recordVisible(placement);
            }
            else {
                recordHidden(placement);
            }
            // only considered a level if the seg had height
            if (placement.top !== placement.bottom) {
                level++;
            }
        }
    }
    function recordVisible(placement) {
        var seg = placement.seg;
        var instanceId = seg.eventRange.instance.instanceId;
        if (!segIsVisible[instanceId]) {
            segIsVisible[instanceId] = true;
            for (var col = seg.firstCol; col <= seg.lastCol; col++) {
                visibleColPlacements[col].push(placement);
            }
        }
    }
    function recordHidden(placement) {
        var seg = placement.seg;
        var instanceId = seg.eventRange.instance.instanceId;
        if (!segIsHidden[instanceId]) {
            segIsHidden[instanceId] = true;
            for (var col = seg.firstCol; col <= seg.lastCol; col++) {
                var hiddenCnt = ++hiddenCnts[col];
                if (moreLinkConsumesLevel && hiddenCnt === 1) {
                    var lastVisiblePlacement = visibleColPlacements[col].pop();
                    if (lastVisiblePlacement) {
                        recordHidden(lastVisiblePlacement);
                    }
                }
            }
        }
    }
}
// Given the events within an array of segment objects, reslice them to be in a single day
function resliceDaySegs(segs, dayDate, colIndex) {
    var dayStart = dayDate;
    var dayEnd = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["addDays"])(dayStart, 1);
    var dayRange = { start: dayStart, end: dayEnd };
    var newSegs = [];
    for (var _i = 0, segs_2 = segs; _i < segs_2.length; _i++) {
        var seg = segs_2[_i];
        var eventRange = seg.eventRange;
        var origRange = eventRange.range;
        var slicedRange = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["intersectRanges"])(origRange, dayRange);
        if (slicedRange) {
            newSegs.push(Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({}, seg), { firstCol: colIndex, lastCol: colIndex, eventRange: {
                    def: eventRange.def,
                    ui: Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({}, eventRange.ui), { durationEditable: false }),
                    instance: eventRange.instance,
                    range: slicedRange
                }, isStart: seg.isStart && slicedRange.start.valueOf() === origRange.start.valueOf(), isEnd: seg.isEnd && slicedRange.end.valueOf() === origRange.end.valueOf() }));
        }
    }
    return newSegs;
}

var TableRow = /** @class */ (function (_super) {
    Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__extends"])(TableRow, _super);
    function TableRow() {
        var _this = _super !== null && _super.apply(this, arguments) || this;
        _this.cellElRefs = new _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["RefMap"](); // the <td>
        _this.frameElRefs = new _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["RefMap"](); // the fc-daygrid-day-frame
        _this.fgElRefs = new _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["RefMap"](); // the fc-daygrid-day-events
        _this.segHarnessRefs = new _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["RefMap"](); // indexed by "instanceId:firstCol"
        _this.rootElRef = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createRef"])();
        _this.state = {
            framePositions: null,
            maxContentHeight: null,
            segHeights: {}
        };
        return _this;
    }
    TableRow.prototype.render = function () {
        var _this = this;
        var _a = this, props = _a.props, state = _a.state, context = _a.context;
        var colCnt = props.cells.length;
        var businessHoursByCol = splitSegsByFirstCol(props.businessHourSegs, colCnt);
        var bgEventSegsByCol = splitSegsByFirstCol(props.bgEventSegs, colCnt);
        var highlightSegsByCol = splitSegsByFirstCol(this.getHighlightSegs(), colCnt);
        var mirrorSegsByCol = splitSegsByFirstCol(this.getMirrorSegs(), colCnt);
        var _b = computeFgSegPlacement(props.cells, props.fgEventSegs, props.dayMaxEvents, props.dayMaxEventRows, state.segHeights, state.maxContentHeight, colCnt, context.options.eventOrder), paddingBottoms = _b.paddingBottoms, segsByFirstCol = _b.segsByFirstCol, segsByEachCol = _b.segsByEachCol, segIsHidden = _b.segIsHidden, segTops = _b.segTops, segMarginTops = _b.segMarginTops, moreCnts = _b.moreCnts, moreTops = _b.moreTops;
        var selectedInstanceHash = // TODO: messy way to compute this
         (props.eventDrag && props.eventDrag.affectedInstances) ||
            (props.eventResize && props.eventResize.affectedInstances) ||
            {};
        return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("tr", { ref: this.rootElRef },
            props.renderIntro && props.renderIntro(),
            props.cells.map(function (cell, col) {
                var normalFgNodes = _this.renderFgSegs(segsByFirstCol[col], segIsHidden, segTops, segMarginTops, selectedInstanceHash, props.todayRange);
                var mirrorFgNodes = _this.renderFgSegs(mirrorSegsByCol[col], {}, segTops, // use same tops as real rendering
                {}, {}, props.todayRange, Boolean(props.eventDrag), Boolean(props.eventResize), false // date-selecting (because mirror is never drawn for date selection)
                );
                return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(TableCell, { key: cell.key, elRef: _this.cellElRefs.createRef(cell.key), innerElRef: _this.frameElRefs.createRef(cell.key) /* FF <td> problem, but okay to use for left/right. TODO: rename prop */, dateProfile: props.dateProfile, date: cell.date, showDayNumber: props.showDayNumbers, showWeekNumber: props.showWeekNumbers && col === 0, forceDayTop: props.showWeekNumbers /* even displaying weeknum for row, not necessarily day */, todayRange: props.todayRange, extraHookProps: cell.extraHookProps, extraDataAttrs: cell.extraDataAttrs, extraClassNames: cell.extraClassNames, moreCnt: moreCnts[col], buildMoreLinkText: props.buildMoreLinkText, onMoreClick: props.onMoreClick, segIsHidden: segIsHidden, moreMarginTop: moreTops[col] /* rename */, segsByEachCol: segsByEachCol[col], fgPaddingBottom: paddingBottoms[col], fgContentElRef: _this.fgElRefs.createRef(cell.key), fgContent: ( // Fragment scopes the keys
                    Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null,
                        Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, normalFgNodes),
                        Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, mirrorFgNodes))), bgContent: ( // Fragment scopes the keys
                    Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null,
                        _this.renderFillSegs(highlightSegsByCol[col], 'highlight'),
                        _this.renderFillSegs(businessHoursByCol[col], 'non-business'),
                        _this.renderFillSegs(bgEventSegsByCol[col], 'bg-event'))) }));
            })));
    };
    TableRow.prototype.componentDidMount = function () {
        this.updateSizing(true);
    };
    TableRow.prototype.componentDidUpdate = function (prevProps, prevState) {
        var currentProps = this.props;
        this.updateSizing(!Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["isPropsEqual"])(prevProps, currentProps));
    };
    TableRow.prototype.getHighlightSegs = function () {
        var props = this.props;
        if (props.eventDrag && props.eventDrag.segs.length) { // messy check
            return props.eventDrag.segs;
        }
        else if (props.eventResize && props.eventResize.segs.length) { // messy check
            return props.eventResize.segs;
        }
        else {
            return props.dateSelectionSegs;
        }
    };
    TableRow.prototype.getMirrorSegs = function () {
        var props = this.props;
        if (props.eventResize && props.eventResize.segs.length) { // messy check
            return props.eventResize.segs;
        }
        else {
            return [];
        }
    };
    TableRow.prototype.renderFgSegs = function (segs, segIsHidden, // does NOT mean display:hidden
    segTops, segMarginTops, selectedInstanceHash, todayRange, isDragging, isResizing, isDateSelecting) {
        var context = this.context;
        var eventSelection = this.props.eventSelection;
        var framePositions = this.state.framePositions;
        var defaultDisplayEventEnd = this.props.cells.length === 1; // colCnt === 1
        var nodes = [];
        if (framePositions) {
            for (var _i = 0, segs_1 = segs; _i < segs_1.length; _i++) {
                var seg = segs_1[_i];
                var instanceId = seg.eventRange.instance.instanceId;
                var isMirror = isDragging || isResizing || isDateSelecting;
                var isSelected = selectedInstanceHash[instanceId];
                var isInvisible = segIsHidden[instanceId] || isSelected;
                var isAbsolute = segIsHidden[instanceId] || isMirror || seg.firstCol !== seg.lastCol || !seg.isStart || !seg.isEnd; // TODO: simpler way? NOT DRY
                var marginTop = void 0;
                var top_1 = void 0;
                var left = void 0;
                var right = void 0;
                if (isAbsolute) {
                    top_1 = segTops[instanceId];
                    if (context.isRtl) {
                        right = 0;
                        left = framePositions.lefts[seg.lastCol] - framePositions.lefts[seg.firstCol];
                    }
                    else {
                        left = 0;
                        right = framePositions.rights[seg.firstCol] - framePositions.rights[seg.lastCol];
                    }
                }
                else {
                    marginTop = segMarginTops[instanceId];
                }
                /*
                known bug: events that are force to be list-item but span multiple days still take up space in later columns
                */
                nodes.push(Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { className: 'fc-daygrid-event-harness' + (isAbsolute ? ' fc-daygrid-event-harness-abs' : ''), key: instanceId, ref: isMirror ? null : this.segHarnessRefs.createRef(instanceId + ':' + seg.firstCol) /* in print mode when in mult cols, could collide */, style: {
                        visibility: isInvisible ? 'hidden' : '',
                        marginTop: marginTop || '',
                        top: top_1 || '',
                        left: left || '',
                        right: right || ''
                    } }, hasListItemDisplay(seg) ?
                    Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(TableListItemEvent, Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({ seg: seg, isDragging: isDragging, isSelected: instanceId === eventSelection, defaultDisplayEventEnd: defaultDisplayEventEnd }, Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["getSegMeta"])(seg, todayRange))) :
                    Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(TableBlockEvent, Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({ seg: seg, isDragging: isDragging, isResizing: isResizing, isDateSelecting: isDateSelecting, isSelected: instanceId === eventSelection, defaultDisplayEventEnd: defaultDisplayEventEnd }, Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["getSegMeta"])(seg, todayRange)))));
            }
        }
        return nodes;
    };
    TableRow.prototype.renderFillSegs = function (segs, fillType) {
        var isRtl = this.context.isRtl;
        var todayRange = this.props.todayRange;
        var framePositions = this.state.framePositions;
        var nodes = [];
        if (framePositions) {
            for (var _i = 0, segs_2 = segs; _i < segs_2.length; _i++) {
                var seg = segs_2[_i];
                var leftRightCss = isRtl ? {
                    right: 0,
                    left: framePositions.lefts[seg.lastCol] - framePositions.lefts[seg.firstCol]
                } : {
                    left: 0,
                    right: framePositions.rights[seg.firstCol] - framePositions.rights[seg.lastCol],
                };
                nodes.push(Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { key: Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["buildEventRangeKey"])(seg.eventRange), className: 'fc-daygrid-bg-harness', style: leftRightCss }, fillType === 'bg-event' ?
                    Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["BgEvent"], Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({ seg: seg }, Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["getSegMeta"])(seg, todayRange))) :
                    Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["renderFill"])(fillType)));
            }
        }
        return _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"].apply(void 0, Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__spreadArrays"])([_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["Fragment"], {}], nodes));
    };
    TableRow.prototype.updateSizing = function (isExternalSizingChange) {
        var _a = this, props = _a.props, frameElRefs = _a.frameElRefs;
        if (props.clientWidth !== null) { // positioning ready?
            if (isExternalSizingChange) {
                var frameEls = props.cells.map(function (cell) { return frameElRefs.currentMap[cell.key]; });
                if (frameEls.length) {
                    var originEl = this.rootElRef.current;
                    this.setState({
                        framePositions: new _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["PositionCache"](originEl, frameEls, true, // isHorizontal
                        false)
                    });
                }
            }
            var limitByContentHeight = props.dayMaxEvents === true || props.dayMaxEventRows === true;
            this.setState({
                segHeights: this.computeSegHeights(),
                maxContentHeight: limitByContentHeight ? this.computeMaxContentHeight() : null
            });
        }
    };
    TableRow.prototype.computeSegHeights = function () {
        return Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["mapHash"])(this.segHarnessRefs.currentMap, function (eventHarnessEl) { return (eventHarnessEl.getBoundingClientRect().height); });
    };
    TableRow.prototype.computeMaxContentHeight = function () {
        var firstKey = this.props.cells[0].key;
        var cellEl = this.cellElRefs.currentMap[firstKey];
        var fcContainerEl = this.fgElRefs.currentMap[firstKey];
        return cellEl.getBoundingClientRect().bottom - fcContainerEl.getBoundingClientRect().top;
    };
    TableRow.prototype.getCellEls = function () {
        var elMap = this.cellElRefs.currentMap;
        return this.props.cells.map(function (cell) { return elMap[cell.key]; });
    };
    return TableRow;
}(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DateComponent"]));
TableRow.addStateEquality({
    segHeights: _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["isPropsEqual"]
});

var PADDING_FROM_VIEWPORT = 10;
var SCROLL_DEBOUNCE = 10;
var Popover = /** @class */ (function (_super) {
    Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__extends"])(Popover, _super);
    function Popover() {
        var _this = _super !== null && _super.apply(this, arguments) || this;
        _this.repositioner = new _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DelayedRunner"](_this.updateSize.bind(_this));
        _this.handleRootEl = function (el) {
            _this.rootEl = el;
            if (_this.props.elRef) {
                Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["setRef"])(_this.props.elRef, el);
            }
        };
        // Triggered when the user clicks *anywhere* in the document, for the autoHide feature
        _this.handleDocumentMousedown = function (ev) {
            var onClose = _this.props.onClose;
            // only hide the popover if the click happened outside the popover
            if (onClose && !_this.rootEl.contains(ev.target)) {
                onClose();
            }
        };
        _this.handleDocumentScroll = function () {
            _this.repositioner.request(SCROLL_DEBOUNCE);
        };
        _this.handleCloseClick = function () {
            var onClose = _this.props.onClose;
            if (onClose) {
                onClose();
            }
        };
        return _this;
    }
    Popover.prototype.render = function () {
        var theme = this.context.theme;
        var props = this.props;
        var classNames = [
            'fc-popover',
            theme.getClass('popover')
        ].concat(props.extraClassNames || []);
        return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({ className: classNames.join(' ') }, props.extraAttrs, { ref: this.handleRootEl }),
            Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { className: 'fc-popover-header ' + theme.getClass('popoverHeader') },
                Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", { className: 'fc-popover-title' }, props.title),
                Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", { className: 'fc-popover-close ' + theme.getIconClass('close'), onClick: this.handleCloseClick })),
            Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { className: 'fc-popover-body ' + theme.getClass('popoverContent') }, props.children)));
    };
    Popover.prototype.componentDidMount = function () {
        document.addEventListener('mousedown', this.handleDocumentMousedown);
        document.addEventListener('scroll', this.handleDocumentScroll);
        this.updateSize();
    };
    Popover.prototype.componentWillUnmount = function () {
        document.removeEventListener('mousedown', this.handleDocumentMousedown);
        document.removeEventListener('scroll', this.handleDocumentScroll);
    };
    // TODO: adjust on window resize
    /*
    NOTE: the popover is position:fixed, so coordinates are relative to the viewport
    NOTE: the PARENT calls this as well, on window resize. we would have wanted to use the repositioner,
          but need to ensure that all other components have updated size first (for alignmentEl)
    */
    Popover.prototype.updateSize = function () {
        var _a = this.props, alignmentEl = _a.alignmentEl, topAlignmentEl = _a.topAlignmentEl;
        var rootEl = this.rootEl;
        if (!rootEl) {
            return; // not sure why this was null, but we shouldn't let external components call updateSize() anyway
        }
        var dims = rootEl.getBoundingClientRect(); // only used for width,height
        var alignment = alignmentEl.getBoundingClientRect();
        var top = topAlignmentEl ? topAlignmentEl.getBoundingClientRect().top : alignment.top;
        top = Math.min(top, window.innerHeight - dims.height - PADDING_FROM_VIEWPORT);
        top = Math.max(top, PADDING_FROM_VIEWPORT);
        var left;
        if (this.context.isRtl) {
            left = alignment.right - dims.width;
        }
        else {
            left = alignment.left;
        }
        left = Math.min(left, window.innerWidth - dims.width - PADDING_FROM_VIEWPORT);
        left = Math.max(left, PADDING_FROM_VIEWPORT);
        Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["applyStyle"])(rootEl, { top: top, left: left });
    };
    return Popover;
}(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["BaseComponent"]));

var MorePopover = /** @class */ (function (_super) {
    Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__extends"])(MorePopover, _super);
    function MorePopover() {
        var _this = _super !== null && _super.apply(this, arguments) || this;
        _this.handlePopoverEl = function (popoverEl) {
            _this.popoverEl = popoverEl;
            if (popoverEl) {
                _this.context.registerInteractiveComponent(_this, {
                    el: popoverEl,
                    useEventCenter: false
                });
            }
            else {
                _this.context.unregisterInteractiveComponent(_this);
            }
        };
        return _this;
    }
    MorePopover.prototype.render = function () {
        var _a = this.context, options = _a.options, dateEnv = _a.dateEnv;
        var props = this.props;
        var date = props.date, hiddenInstances = props.hiddenInstances, todayRange = props.todayRange, dateProfile = props.dateProfile, selectedInstanceId = props.selectedInstanceId;
        var title = dateEnv.format(date, options.dayPopoverFormat);
        return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DayCellRoot"], { date: date, dateProfile: dateProfile, todayRange: todayRange, elRef: this.handlePopoverEl }, function (rootElRef, dayClassNames, dataAttrs) { return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(Popover, { elRef: rootElRef, title: title, extraClassNames: ['fc-more-popover'].concat(dayClassNames), extraAttrs: dataAttrs, onClose: props.onCloseClick, alignmentEl: props.alignmentEl, topAlignmentEl: props.topAlignmentEl },
            Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DayCellContent"], { date: date, dateProfile: dateProfile, todayRange: todayRange }, function (innerElRef, innerContent) { return (innerContent &&
                Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { className: 'fc-more-popover-misc', ref: innerElRef }, innerContent)); }),
            props.segs.map(function (seg) {
                var instanceId = seg.eventRange.instance.instanceId;
                return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { className: 'fc-daygrid-event-harness', key: instanceId, style: {
                        visibility: hiddenInstances[instanceId] ? 'hidden' : ''
                    } }, hasListItemDisplay(seg) ?
                    Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(TableListItemEvent, Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({ seg: seg, isDragging: false, isSelected: instanceId === selectedInstanceId, defaultDisplayEventEnd: false }, Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["getSegMeta"])(seg, todayRange))) :
                    Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(TableBlockEvent, Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({ seg: seg, isDragging: false, isResizing: false, isDateSelecting: false, isSelected: instanceId === selectedInstanceId, defaultDisplayEventEnd: false }, Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["getSegMeta"])(seg, todayRange)))));
            }))); }));
    };
    MorePopover.prototype.queryHit = function (positionLeft, positionTop, elWidth, elHeight) {
        var date = this.props.date;
        if (positionLeft < elWidth && positionTop < elHeight) {
            return {
                component: this,
                dateSpan: {
                    allDay: true,
                    range: { start: date, end: Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["addDays"])(date, 1) }
                },
                dayEl: this.popoverEl,
                rect: {
                    left: 0,
                    top: 0,
                    right: elWidth,
                    bottom: elHeight
                },
                layer: 1
            };
        }
    };
    MorePopover.prototype.isPopover = function () {
        return true; // gross
    };
    return MorePopover;
}(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DateComponent"]));

var Table = /** @class */ (function (_super) {
    Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__extends"])(Table, _super);
    function Table() {
        var _this = _super !== null && _super.apply(this, arguments) || this;
        _this.splitBusinessHourSegs = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["memoize"])(splitSegsByRow);
        _this.splitBgEventSegs = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["memoize"])(splitSegsByRow);
        _this.splitFgEventSegs = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["memoize"])(splitSegsByRow);
        _this.splitDateSelectionSegs = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["memoize"])(splitSegsByRow);
        _this.splitEventDrag = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["memoize"])(splitInteractionByRow);
        _this.splitEventResize = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["memoize"])(splitInteractionByRow);
        _this.buildBuildMoreLinkText = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["memoize"])(buildBuildMoreLinkText);
        _this.rowRefs = new _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["RefMap"]();
        _this.state = {
            morePopoverState: null
        };
        _this.handleRootEl = function (rootEl) {
            _this.rootEl = rootEl;
            Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["setRef"])(_this.props.elRef, rootEl);
        };
        _this.handleMoreLinkClick = function (arg) {
            var context = _this.context;
            var dateEnv = context.dateEnv;
            var clickOption = context.options.moreLinkClick;
            function segForPublic(seg) {
                var _a = seg.eventRange, def = _a.def, instance = _a.instance, range = _a.range;
                return {
                    event: new _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["EventApi"](context, def, instance),
                    start: dateEnv.toDate(range.start),
                    end: dateEnv.toDate(range.end),
                    isStart: seg.isStart,
                    isEnd: seg.isEnd
                };
            }
            if (typeof clickOption === 'function') {
                clickOption = clickOption({
                    date: dateEnv.toDate(arg.date),
                    allDay: true,
                    allSegs: arg.allSegs.map(segForPublic),
                    hiddenSegs: arg.hiddenSegs.map(segForPublic),
                    jsEvent: arg.ev,
                    view: context.viewApi
                }); // hack to handle void
            }
            if (!clickOption || clickOption === 'popover') {
                _this.setState({
                    morePopoverState: Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({}, arg), { currentFgEventSegs: _this.props.fgEventSegs })
                });
            }
            else if (typeof clickOption === 'string') { // a view name
                context.calendarApi.zoomTo(arg.date, clickOption);
            }
        };
        _this.handleMorePopoverClose = function () {
            _this.setState({
                morePopoverState: null
            });
        };
        return _this;
    }
    Table.prototype.render = function () {
        var _this = this;
        var props = this.props;
        var dateProfile = props.dateProfile, dayMaxEventRows = props.dayMaxEventRows, dayMaxEvents = props.dayMaxEvents, expandRows = props.expandRows;
        var morePopoverState = this.state.morePopoverState;
        var rowCnt = props.cells.length;
        var businessHourSegsByRow = this.splitBusinessHourSegs(props.businessHourSegs, rowCnt);
        var bgEventSegsByRow = this.splitBgEventSegs(props.bgEventSegs, rowCnt);
        var fgEventSegsByRow = this.splitFgEventSegs(props.fgEventSegs, rowCnt);
        var dateSelectionSegsByRow = this.splitDateSelectionSegs(props.dateSelectionSegs, rowCnt);
        var eventDragByRow = this.splitEventDrag(props.eventDrag, rowCnt);
        var eventResizeByRow = this.splitEventResize(props.eventResize, rowCnt);
        var buildMoreLinkText = this.buildBuildMoreLinkText(this.context.options.moreLinkText);
        var limitViaBalanced = dayMaxEvents === true || dayMaxEventRows === true;
        // if rows can't expand to fill fixed height, can't do balanced-height event limit
        // TODO: best place to normalize these options?
        if (limitViaBalanced && !expandRows) {
            limitViaBalanced = false;
            dayMaxEventRows = null;
            dayMaxEvents = null;
        }
        var classNames = [
            'fc-daygrid-body',
            limitViaBalanced ? 'fc-daygrid-body-balanced' : 'fc-daygrid-body-unbalanced',
            expandRows ? '' : 'fc-daygrid-body-natural' // will height of one row depend on the others?
        ];
        return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", { className: classNames.join(' '), ref: this.handleRootEl, style: {
                // these props are important to give this wrapper correct dimensions for interactions
                // TODO: if we set it here, can we avoid giving to inner tables?
                width: props.clientWidth,
                minWidth: props.tableMinWidth
            } },
            Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["NowTimer"], { unit: 'day' }, function (nowDate, todayRange) { return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null,
                Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("table", { className: 'fc-scrollgrid-sync-table', style: {
                        width: props.clientWidth,
                        minWidth: props.tableMinWidth,
                        height: expandRows ? props.clientHeight : ''
                    } },
                    props.colGroupNode,
                    Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])("tbody", null, props.cells.map(function (cells, row) { return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(TableRow, { ref: _this.rowRefs.createRef(row), key: cells.length
                            ? cells[0].date.toISOString() /* best? or put key on cell? or use diff formatter? */
                            : row // in case there are no cells (like when resource view is loading)
                        , showDayNumbers: rowCnt > 1, showWeekNumbers: props.showWeekNumbers, todayRange: todayRange, dateProfile: dateProfile, cells: cells, renderIntro: props.renderRowIntro, businessHourSegs: businessHourSegsByRow[row], eventSelection: props.eventSelection, bgEventSegs: bgEventSegsByRow[row].filter(isSegAllDay) /* hack */, fgEventSegs: fgEventSegsByRow[row], dateSelectionSegs: dateSelectionSegsByRow[row], eventDrag: eventDragByRow[row], eventResize: eventResizeByRow[row], dayMaxEvents: dayMaxEvents, dayMaxEventRows: dayMaxEventRows, clientWidth: props.clientWidth, clientHeight: props.clientHeight, buildMoreLinkText: buildMoreLinkText, onMoreClick: _this.handleMoreLinkClick })); }))),
                (!props.forPrint && morePopoverState && morePopoverState.currentFgEventSegs === props.fgEventSegs) && // clear popover on event mod
                    Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(MorePopover, { date: morePopoverState.date, dateProfile: dateProfile, segs: morePopoverState.allSegs, alignmentEl: morePopoverState.dayEl, topAlignmentEl: rowCnt === 1 ? props.headerAlignElRef.current : null, onCloseClick: _this.handleMorePopoverClose, selectedInstanceId: props.eventSelection, hiddenInstances: // yuck
                        (props.eventDrag ? props.eventDrag.affectedInstances : null) ||
                            (props.eventResize ? props.eventResize.affectedInstances : null) ||
                            {}, todayRange: todayRange }))); })));
    };
    // Hit System
    // ----------------------------------------------------------------------------------------------------
    Table.prototype.prepareHits = function () {
        this.rowPositions = new _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["PositionCache"](this.rootEl, this.rowRefs.collect().map(function (rowObj) { return rowObj.getCellEls()[0]; }), // first cell el in each row. TODO: not optimal
        false, true // vertical
        );
        this.colPositions = new _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["PositionCache"](this.rootEl, this.rowRefs.currentMap[0].getCellEls(), // cell els in first row
        true, // horizontal
        false);
    };
    Table.prototype.positionToHit = function (leftPosition, topPosition) {
        var _a = this, colPositions = _a.colPositions, rowPositions = _a.rowPositions;
        var col = colPositions.leftToIndex(leftPosition);
        var row = rowPositions.topToIndex(topPosition);
        if (row != null && col != null) {
            return {
                row: row,
                col: col,
                dateSpan: {
                    range: this.getCellRange(row, col),
                    allDay: true
                },
                dayEl: this.getCellEl(row, col),
                relativeRect: {
                    left: colPositions.lefts[col],
                    right: colPositions.rights[col],
                    top: rowPositions.tops[row],
                    bottom: rowPositions.bottoms[row]
                }
            };
        }
    };
    Table.prototype.getCellEl = function (row, col) {
        return this.rowRefs.currentMap[row].getCellEls()[col]; // TODO: not optimal
    };
    Table.prototype.getCellRange = function (row, col) {
        var start = this.props.cells[row][col].date;
        var end = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["addDays"])(start, 1);
        return { start: start, end: end };
    };
    return Table;
}(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DateComponent"]));
function buildBuildMoreLinkText(moreLinkTextInput) {
    if (typeof moreLinkTextInput === 'function') {
        return moreLinkTextInput;
    }
    else {
        return function (num) {
            return "+" + num + " " + moreLinkTextInput;
        };
    }
}
function isSegAllDay(seg) {
    return seg.eventRange.def.allDay;
}

var DayTable = /** @class */ (function (_super) {
    Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__extends"])(DayTable, _super);
    function DayTable() {
        var _this = _super !== null && _super.apply(this, arguments) || this;
        _this.slicer = new DayTableSlicer();
        _this.tableRef = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createRef"])();
        _this.handleRootEl = function (rootEl) {
            if (rootEl) {
                _this.context.registerInteractiveComponent(_this, { el: rootEl });
            }
            else {
                _this.context.unregisterInteractiveComponent(_this);
            }
        };
        return _this;
    }
    DayTable.prototype.render = function () {
        var _a = this, props = _a.props, context = _a.context;
        return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(Table, Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__assign"])({ ref: this.tableRef, elRef: this.handleRootEl }, this.slicer.sliceProps(props, props.dateProfile, props.nextDayThreshold, context, props.dayTableModel), { dateProfile: props.dateProfile, cells: props.dayTableModel.cells, colGroupNode: props.colGroupNode, tableMinWidth: props.tableMinWidth, renderRowIntro: props.renderRowIntro, dayMaxEvents: props.dayMaxEvents, dayMaxEventRows: props.dayMaxEventRows, showWeekNumbers: props.showWeekNumbers, expandRows: props.expandRows, headerAlignElRef: props.headerAlignElRef, clientWidth: props.clientWidth, clientHeight: props.clientHeight, forPrint: props.forPrint })));
    };
    DayTable.prototype.prepareHits = function () {
        this.tableRef.current.prepareHits();
    };
    DayTable.prototype.queryHit = function (positionLeft, positionTop) {
        var rawHit = this.tableRef.current.positionToHit(positionLeft, positionTop);
        if (rawHit) {
            return {
                component: this,
                dateSpan: rawHit.dateSpan,
                dayEl: rawHit.dayEl,
                rect: {
                    left: rawHit.relativeRect.left,
                    right: rawHit.relativeRect.right,
                    top: rawHit.relativeRect.top,
                    bottom: rawHit.relativeRect.bottom
                },
                layer: 0
            };
        }
    };
    return DayTable;
}(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DateComponent"]));
var DayTableSlicer = /** @class */ (function (_super) {
    Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__extends"])(DayTableSlicer, _super);
    function DayTableSlicer() {
        var _this = _super !== null && _super.apply(this, arguments) || this;
        _this.forceDayIfListItem = true;
        return _this;
    }
    DayTableSlicer.prototype.sliceRange = function (dateRange, dayTableModel) {
        return dayTableModel.sliceRange(dateRange);
    };
    return DayTableSlicer;
}(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["Slicer"]));

var DayTableView = /** @class */ (function (_super) {
    Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__extends"])(DayTableView, _super);
    function DayTableView() {
        var _this = _super !== null && _super.apply(this, arguments) || this;
        _this.buildDayTableModel = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["memoize"])(buildDayTableModel);
        _this.headerRef = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createRef"])();
        _this.tableRef = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createRef"])();
        return _this;
    }
    DayTableView.prototype.render = function () {
        var _this = this;
        var _a = this.context, options = _a.options, dateProfileGenerator = _a.dateProfileGenerator;
        var props = this.props;
        var dayTableModel = this.buildDayTableModel(props.dateProfile, dateProfileGenerator);
        var headerContent = options.dayHeaders &&
            Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DayHeader"], { ref: this.headerRef, dateProfile: props.dateProfile, dates: dayTableModel.headerDates, datesRepDistinctDays: dayTableModel.rowCnt === 1 });
        var bodyContent = function (contentArg) { return (Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createElement"])(DayTable, { ref: _this.tableRef, dateProfile: props.dateProfile, dayTableModel: dayTableModel, businessHours: props.businessHours, dateSelection: props.dateSelection, eventStore: props.eventStore, eventUiBases: props.eventUiBases, eventSelection: props.eventSelection, eventDrag: props.eventDrag, eventResize: props.eventResize, nextDayThreshold: options.nextDayThreshold, colGroupNode: contentArg.tableColGroupNode, tableMinWidth: contentArg.tableMinWidth, dayMaxEvents: options.dayMaxEvents, dayMaxEventRows: options.dayMaxEventRows, showWeekNumbers: options.weekNumbers, expandRows: !props.isHeightAuto, headerAlignElRef: _this.headerElRef, clientWidth: contentArg.clientWidth, clientHeight: contentArg.clientHeight, forPrint: props.forPrint })); };
        return options.dayMinWidth
            ? this.renderHScrollLayout(headerContent, bodyContent, dayTableModel.colCnt, options.dayMinWidth)
            : this.renderSimpleLayout(headerContent, bodyContent);
    };
    return DayTableView;
}(TableView));
function buildDayTableModel(dateProfile, dateProfileGenerator) {
    var daySeries = new _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DaySeriesModel"](dateProfile.renderRange, dateProfileGenerator);
    return new _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DayTableModel"](daySeries, /year|month|week/.test(dateProfile.currentRangeUnit));
}

var TableDateProfileGenerator = /** @class */ (function (_super) {
    Object(tslib__WEBPACK_IMPORTED_MODULE_2__["__extends"])(TableDateProfileGenerator, _super);
    function TableDateProfileGenerator() {
        return _super !== null && _super.apply(this, arguments) || this;
    }
    // Computes the date range that will be rendered.
    TableDateProfileGenerator.prototype.buildRenderRange = function (currentRange, currentRangeUnit, isRangeAllDay) {
        var dateEnv = this.props.dateEnv;
        var renderRange = _super.prototype.buildRenderRange.call(this, currentRange, currentRangeUnit, isRangeAllDay);
        var start = renderRange.start;
        var end = renderRange.end;
        var endOfWeek;
        // year and month views should be aligned with weeks. this is already done for week
        if (/^(year|month)$/.test(currentRangeUnit)) {
            start = dateEnv.startOfWeek(start);
            // make end-of-week if not already
            endOfWeek = dateEnv.startOfWeek(end);
            if (endOfWeek.valueOf() !== end.valueOf()) {
                end = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["addWeeks"])(endOfWeek, 1);
            }
        }
        // ensure 6 weeks
        if (this.props.monthMode &&
            this.props.fixedWeekCount) {
            var rowCnt = Math.ceil(// could be partial weeks due to hiddenDays
            Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["diffWeeks"])(start, end));
            end = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["addWeeks"])(end, 6 - rowCnt);
        }
        return { start: start, end: end };
    };
    return TableDateProfileGenerator;
}(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["DateProfileGenerator"]));

var OPTION_REFINERS = {
    moreLinkClick: _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["identity"],
    moreLinkClassNames: _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["identity"],
    moreLinkContent: _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["identity"],
    moreLinkDidMount: _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["identity"],
    moreLinkWillUnmount: _fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["identity"],
};

var main = Object(_fullcalendar_common__WEBPACK_IMPORTED_MODULE_1__["createPlugin"])({
    initialView: 'dayGridMonth',
    optionRefiners: OPTION_REFINERS,
    views: {
        dayGrid: {
            component: DayTableView,
            dateProfileGeneratorClass: TableDateProfileGenerator
        },
        dayGridDay: {
            type: 'dayGrid',
            duration: { days: 1 }
        },
        dayGridWeek: {
            type: 'dayGrid',
            duration: { weeks: 1 }
        },
        dayGridMonth: {
            type: 'dayGrid',
            duration: { months: 1 },
            monthMode: true,
            fixedWeekCount: true
        }
    }
});

/* harmony default export */ __webpack_exports__["default"] = (main);

//# sourceMappingURL=main.js.map


/***/ }),

/***/ "./node_modules/@fullcalendar/daygrid/node_modules/tslib/tslib.es6.js":
/*!****************************************************************************!*\
  !*** ./node_modules/@fullcalendar/daygrid/node_modules/tslib/tslib.es6.js ***!
  \****************************************************************************/
/*! exports provided: __extends, __assign, __rest, __decorate, __param, __metadata, __awaiter, __generator, __createBinding, __exportStar, __values, __read, __spread, __spreadArrays, __await, __asyncGenerator, __asyncDelegator, __asyncValues, __makeTemplateObject, __importStar, __importDefault, __classPrivateFieldGet, __classPrivateFieldSet */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__extends", function() { return __extends; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__assign", function() { return __assign; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__rest", function() { return __rest; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__decorate", function() { return __decorate; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__param", function() { return __param; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__metadata", function() { return __metadata; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__awaiter", function() { return __awaiter; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__generator", function() { return __generator; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__createBinding", function() { return __createBinding; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__exportStar", function() { return __exportStar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__values", function() { return __values; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__read", function() { return __read; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__spread", function() { return __spread; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__spreadArrays", function() { return __spreadArrays; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__await", function() { return __await; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__asyncGenerator", function() { return __asyncGenerator; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__asyncDelegator", function() { return __asyncDelegator; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__asyncValues", function() { return __asyncValues; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__makeTemplateObject", function() { return __makeTemplateObject; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__importStar", function() { return __importStar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__importDefault", function() { return __importDefault; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__classPrivateFieldGet", function() { return __classPrivateFieldGet; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__classPrivateFieldSet", function() { return __classPrivateFieldSet; });
/*! *****************************************************************************
Copyright (c) Microsoft Corporation.

Permission to use, copy, modify, and/or distribute this software for any
purpose with or without fee is hereby granted.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
PERFORMANCE OF THIS SOFTWARE.
***************************************************************************** */
/* global Reflect, Promise */

var extendStatics = function(d, b) {
    extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
    return extendStatics(d, b);
};

function __extends(d, b) {
    extendStatics(d, b);
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
}

var __assign = function() {
    __assign = Object.assign || function __assign(t) {
        for (var s, i = 1, n = arguments.length; i < n; i++) {
            s = arguments[i];
            for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p)) t[p] = s[p];
        }
        return t;
    }
    return __assign.apply(this, arguments);
}

function __rest(s, e) {
    var t = {};
    for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p) && e.indexOf(p) < 0)
        t[p] = s[p];
    if (s != null && typeof Object.getOwnPropertySymbols === "function")
        for (var i = 0, p = Object.getOwnPropertySymbols(s); i < p.length; i++) {
            if (e.indexOf(p[i]) < 0 && Object.prototype.propertyIsEnumerable.call(s, p[i]))
                t[p[i]] = s[p[i]];
        }
    return t;
}

function __decorate(decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
}

function __param(paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
}

function __metadata(metadataKey, metadataValue) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(metadataKey, metadataValue);
}

function __awaiter(thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
}

function __generator(thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g;
    return g = { next: verb(0), "throw": verb(1), "return": verb(2) }, typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (_) try {
            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [op[0] & 2, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
}

var __createBinding = Object.create ? (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    Object.defineProperty(o, k2, { enumerable: true, get: function() { return m[k]; } });
}) : (function(o, m, k, k2) {
    if (k2 === undefined) k2 = k;
    o[k2] = m[k];
});

function __exportStar(m, o) {
    for (var p in m) if (p !== "default" && !Object.prototype.hasOwnProperty.call(o, p)) __createBinding(o, m, p);
}

function __values(o) {
    var s = typeof Symbol === "function" && Symbol.iterator, m = s && o[s], i = 0;
    if (m) return m.call(o);
    if (o && typeof o.length === "number") return {
        next: function () {
            if (o && i >= o.length) o = void 0;
            return { value: o && o[i++], done: !o };
        }
    };
    throw new TypeError(s ? "Object is not iterable." : "Symbol.iterator is not defined.");
}

function __read(o, n) {
    var m = typeof Symbol === "function" && o[Symbol.iterator];
    if (!m) return o;
    var i = m.call(o), r, ar = [], e;
    try {
        while ((n === void 0 || n-- > 0) && !(r = i.next()).done) ar.push(r.value);
    }
    catch (error) { e = { error: error }; }
    finally {
        try {
            if (r && !r.done && (m = i["return"])) m.call(i);
        }
        finally { if (e) throw e.error; }
    }
    return ar;
}

function __spread() {
    for (var ar = [], i = 0; i < arguments.length; i++)
        ar = ar.concat(__read(arguments[i]));
    return ar;
}

function __spreadArrays() {
    for (var s = 0, i = 0, il = arguments.length; i < il; i++) s += arguments[i].length;
    for (var r = Array(s), k = 0, i = 0; i < il; i++)
        for (var a = arguments[i], j = 0, jl = a.length; j < jl; j++, k++)
            r[k] = a[j];
    return r;
};

function __await(v) {
    return this instanceof __await ? (this.v = v, this) : new __await(v);
}

function __asyncGenerator(thisArg, _arguments, generator) {
    if (!Symbol.asyncIterator) throw new TypeError("Symbol.asyncIterator is not defined.");
    var g = generator.apply(thisArg, _arguments || []), i, q = [];
    return i = {}, verb("next"), verb("throw"), verb("return"), i[Symbol.asyncIterator] = function () { return this; }, i;
    function verb(n) { if (g[n]) i[n] = function (v) { return new Promise(function (a, b) { q.push([n, v, a, b]) > 1 || resume(n, v); }); }; }
    function resume(n, v) { try { step(g[n](v)); } catch (e) { settle(q[0][3], e); } }
    function step(r) { r.value instanceof __await ? Promise.resolve(r.value.v).then(fulfill, reject) : settle(q[0][2], r); }
    function fulfill(value) { resume("next", value); }
    function reject(value) { resume("throw", value); }
    function settle(f, v) { if (f(v), q.shift(), q.length) resume(q[0][0], q[0][1]); }
}

function __asyncDelegator(o) {
    var i, p;
    return i = {}, verb("next"), verb("throw", function (e) { throw e; }), verb("return"), i[Symbol.iterator] = function () { return this; }, i;
    function verb(n, f) { i[n] = o[n] ? function (v) { return (p = !p) ? { value: __await(o[n](v)), done: n === "return" } : f ? f(v) : v; } : f; }
}

function __asyncValues(o) {
    if (!Symbol.asyncIterator) throw new TypeError("Symbol.asyncIterator is not defined.");
    var m = o[Symbol.asyncIterator], i;
    return m ? m.call(o) : (o = typeof __values === "function" ? __values(o) : o[Symbol.iterator](), i = {}, verb("next"), verb("throw"), verb("return"), i[Symbol.asyncIterator] = function () { return this; }, i);
    function verb(n) { i[n] = o[n] && function (v) { return new Promise(function (resolve, reject) { v = o[n](v), settle(resolve, reject, v.done, v.value); }); }; }
    function settle(resolve, reject, d, v) { Promise.resolve(v).then(function(v) { resolve({ value: v, done: d }); }, reject); }
}

function __makeTemplateObject(cooked, raw) {
    if (Object.defineProperty) { Object.defineProperty(cooked, "raw", { value: raw }); } else { cooked.raw = raw; }
    return cooked;
};

var __setModuleDefault = Object.create ? (function(o, v) {
    Object.defineProperty(o, "default", { enumerable: true, value: v });
}) : function(o, v) {
    o["default"] = v;
};

function __importStar(mod) {
    if (mod && mod.__esModule) return mod;
    var result = {};
    if (mod != null) for (var k in mod) if (k !== "default" && Object.prototype.hasOwnProperty.call(mod, k)) __createBinding(result, mod, k);
    __setModuleDefault(result, mod);
    return result;
}

function __importDefault(mod) {
    return (mod && mod.__esModule) ? mod : { default: mod };
}

function __classPrivateFieldGet(receiver, privateMap) {
    if (!privateMap.has(receiver)) {
        throw new TypeError("attempted to get private field on non-instance");
    }
    return privateMap.get(receiver);
}

function __classPrivateFieldSet(receiver, privateMap, value) {
    if (!privateMap.has(receiver)) {
        throw new TypeError("attempted to set private field on non-instance");
    }
    privateMap.set(receiver, value);
    return value;
}


/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/@fullcalendar/daygrid/main.css":
/*!*************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--6-1!./node_modules/postcss-loader/src??ref--6-2!./node_modules/@fullcalendar/daygrid/main.css ***!
  \*************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n:root {\n  --fc-daygrid-event-dot-width: 8px;\n}\n.fc .fc-popover {\n    position: fixed;\n    top: 0; /* for when not positioned yet */\n    box-shadow: 0 2px 6px rgba(0,0,0,.15);\n  }\n.fc .fc-popover-header {\n    display: flex;\n    flex-direction: row;\n    justify-content: space-between;\n    align-items: center;\n    padding: 3px 4px;\n  }\n.fc .fc-popover-title {\n    margin: 0 2px;\n  }\n.fc .fc-popover-close {\n    cursor: pointer;\n    opacity: 0.65;\n    font-size: 1.1em;\n  }\n.fc-theme-standard .fc-popover {\n    border: 1px solid #ddd;\n    border: 1px solid var(--fc-border-color, #ddd);\n    background: #fff;\n    background: var(--fc-page-bg-color, #fff);\n  }\n.fc-theme-standard .fc-popover-header {\n    background: rgba(208, 208, 208, 0.3);\n    background: var(--fc-neutral-bg-color, rgba(208, 208, 208, 0.3));\n  }\n/* help things clear margins of inner content */\n.fc-daygrid-day-frame,\n.fc-daygrid-day-events,\n.fc-daygrid-event-harness { /* for event top/bottom margins */\n}\n.fc-daygrid-day-frame:before, .fc-daygrid-day-events:before, .fc-daygrid-event-harness:before {\n  content: \"\";\n  clear: both;\n  display: table; }\n.fc-daygrid-day-frame:after, .fc-daygrid-day-events:after, .fc-daygrid-event-harness:after {\n  content: \"\";\n  clear: both;\n  display: table; }\n.fc .fc-daygrid-body { /* a <div> that wraps the table */\n    position: relative;\n    z-index: 1; /* container inner z-index's because <tr>s can't do it */\n  }\n.fc .fc-daygrid-day.fc-day-today {\n      background-color: rgba(255, 220, 40, 0.15);\n      background-color: var(--fc-today-bg-color, rgba(255, 220, 40, 0.15));\n    }\n.fc .fc-daygrid-day-frame {\n    position: relative;\n    min-height: 100%; /* seems to work better than `height` because sets height after rows/cells naturally do it */\n  }\n.fc {\n\n  /* cell top */\n\n}\n.fc .fc-daygrid-day-top {\n    display: flex;\n    flex-direction: row-reverse;\n  }\n.fc .fc-day-other .fc-daygrid-day-top {\n    opacity: 0.3;\n  }\n.fc {\n\n  /* day number (within cell top) */\n\n}\n.fc .fc-daygrid-day-number {\n    position: relative;\n    z-index: 4;\n    padding: 4px;\n  }\n.fc {\n\n  /* event container */\n\n}\n.fc .fc-daygrid-day-events {\n    margin-top: 1px; /* needs to be margin, not padding, so that available cell height can be computed */\n  }\n.fc {\n\n  /* positioning for balanced vs natural */\n\n}\n.fc .fc-daygrid-body-balanced .fc-daygrid-day-events {\n      position: absolute;\n      left: 0;\n      right: 0;\n    }\n.fc .fc-daygrid-body-unbalanced .fc-daygrid-day-events {\n      position: relative; /* for containing abs positioned event harnesses */\n      min-height: 2em; /* in addition to being a min-height during natural height, equalizes the heights a little bit */\n    }\n.fc .fc-daygrid-body-natural { /* can coexist with -unbalanced */\n  }\n.fc .fc-daygrid-body-natural .fc-daygrid-day-events {\n      margin-bottom: 1em;\n    }\n.fc {\n\n  /* event harness */\n\n}\n.fc .fc-daygrid-event-harness {\n    position: relative;\n  }\n.fc .fc-daygrid-event-harness-abs {\n    position: absolute;\n    top: 0; /* fallback coords for when cannot yet be computed */\n    left: 0; /* */\n    right: 0; /* */\n  }\n.fc .fc-daygrid-bg-harness {\n    position: absolute;\n    top: 0;\n    bottom: 0;\n  }\n.fc {\n\n  /* bg content */\n\n}\n.fc .fc-daygrid-day-bg .fc-non-business { z-index: 1 }\n.fc .fc-daygrid-day-bg .fc-bg-event { z-index: 2 }\n.fc .fc-daygrid-day-bg .fc-highlight { z-index: 3 }\n.fc {\n\n  /* events */\n\n}\n.fc .fc-daygrid-event {\n    z-index: 6;\n    margin-top: 1px;\n  }\n.fc .fc-daygrid-event.fc-event-mirror {\n    z-index: 7;\n  }\n.fc {\n\n  /* cell bottom (within day-events) */\n\n}\n.fc .fc-daygrid-day-bottom {\n    font-size: .85em;\n    margin: 2px 3px 0;\n  }\n.fc .fc-daygrid-more-link {\n    position: relative;\n    z-index: 4;\n    cursor: pointer;\n  }\n.fc {\n\n  /* week number (within frame) */\n\n}\n.fc .fc-daygrid-week-number {\n    position: absolute;\n    z-index: 5;\n    top: 0;\n    padding: 2px;\n    min-width: 1.5em;\n    text-align: center;\n    background-color: rgba(208, 208, 208, 0.3);\n    background-color: var(--fc-neutral-bg-color, rgba(208, 208, 208, 0.3));\n    color: #808080;\n    color: var(--fc-neutral-text-color, #808080);\n  }\n.fc {\n\n  /* popover */\n\n}\n.fc .fc-more-popover {\n    z-index: 8;\n  }\n.fc .fc-more-popover .fc-popover-body {\n    min-width: 220px;\n    padding: 10px;\n  }\n.fc-direction-ltr .fc-daygrid-event.fc-event-start,\n.fc-direction-rtl .fc-daygrid-event.fc-event-end {\n  margin-left: 2px;\n}\n.fc-direction-ltr .fc-daygrid-event.fc-event-end,\n.fc-direction-rtl .fc-daygrid-event.fc-event-start {\n  margin-right: 2px;\n}\n.fc-direction-ltr .fc-daygrid-week-number {\n    left: 0;\n    border-radius: 0 0 3px 0;\n  }\n.fc-direction-rtl .fc-daygrid-week-number {\n    right: 0;\n    border-radius: 0 0 0 3px;\n  }\n.fc-liquid-hack .fc-daygrid-day-frame {\n    position: static; /* will cause inner absolute stuff to expand to <td> */\n  }\n.fc-daygrid-event { /* make root-level, because will be dragged-and-dropped outside of a component root */\n  position: relative; /* for z-indexes assigned later */\n  white-space: nowrap;\n  border-radius: 3px; /* dot event needs this to when selected */\n  font-size: .85em;\n  font-size: var(--fc-small-font-size, .85em);\n}\n/* --- the rectangle (\"block\") style of event --- */\n.fc-daygrid-block-event .fc-event-time {\n    font-weight: bold;\n  }\n.fc-daygrid-block-event .fc-event-time,\n  .fc-daygrid-block-event .fc-event-title {\n    padding: 1px;\n  }\n/* --- the dot style of event --- */\n.fc-daygrid-dot-event {\n  display: flex;\n  align-items: center;\n  padding: 2px 0\n\n}\n.fc-daygrid-dot-event .fc-event-title {\n    flex-grow: 1;\n    flex-shrink: 1;\n    min-width: 0; /* important for allowing to shrink all the way */\n    overflow: hidden;\n    font-weight: bold;\n  }\n.fc-daygrid-dot-event:hover,\n  .fc-daygrid-dot-event.fc-event-mirror {\n    background: rgba(0, 0, 0, 0.1);\n  }\n.fc-daygrid-dot-event.fc-event-selected:before {\n    /* expand hit area */\n    top: -10px;\n    bottom: -10px;\n  }\n.fc-daygrid-event-dot { /* the actual dot */\n  margin: 0 4px;\n  box-sizing: content-box;\n  width: 0;\n  height: 0;\n  border: 4px solid #3788d8;\n  border: calc(var(--fc-daygrid-event-dot-width, 8px) / 2) solid var(--fc-event-border-color, #3788d8);\n  border-radius: 4px;\n  border-radius: calc(var(--fc-daygrid-event-dot-width, 8px) / 2);\n}\n/* --- spacing between time and title --- */\n.fc-direction-ltr .fc-daygrid-event .fc-event-time {\n    margin-right: 3px;\n  }\n.fc-direction-rtl .fc-daygrid-event .fc-event-time {\n    margin-left: 3px;\n  }\n", ""]);

// exports


/***/ })

}]);