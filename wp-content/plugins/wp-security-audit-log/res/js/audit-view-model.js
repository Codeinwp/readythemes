var AuditLogViewModel = (function($, ko) {
    "use strict";
    /*global AjaxLoaderShow, AjaxLoaderHide, ajaxurl, __ajaxLoaderTargetElement__*/
    /*jshint curly:false,devel:true*/

    var error = ko.observable('');
    var loading = ko.observable(false);
    var events = ko.observableArray([]);
    var totalEventsCount = ko.observable(0);
    var offset = ko.observable(0);
    var availablePageSize = ko.observableArray([25, 50, 100]);
    var isMainSite = ko.observable(false);
    var _blogId = ko.observable();
    var blogId = ko.computed({
        read: function() {
            var parsedValue = parseInt(_blogId(), 10);
            return isNaN(parsedValue) ? undefined : parsedValue;
        },
        write: function(newValue) {
            newValue = parseInt(newValue, 10);
            if (isNaN(newValue)) newValue = undefined;
            if (_blogId() !== newValue) {
   //             console.warn('blogId changed from %o to %o', _blogId(), newValue);
                var refresh = false;
                if (_blogId() !== undefined) {
                    refresh = true;
                }
                _blogId(newValue);
                if (refresh) {
                    refreshEvents(0, newValue);
                }
            }
        }
    });
    var blogList = ko.observableArray();

    var columns = ko.observableArray([
        {columnHeader: 'Event', columnName: 'EventNumber', sortable: true, columnWidth: '5%', sorted: ko.observable(false), sortedDescending: ko.observable(false), visible: true },
        {columnHeader: 'ID', columnName: 'EventID', sortable: true, columnWidth: '5%', sorted: ko.observable(false), sortedDescending: ko.observable(false), visible: true},
        {columnHeader: 'Date', columnName: 'EventDate', sortable: true, columnWidth: '11%', sorted: ko.observable(false), sortedDescending: ko.observable(false), visible: true},
        {columnHeader: 'Type', columnName: 'EventType', sortable: true, columnWidth: '6%', sorted: ko.observable(false), sortedDescending: ko.observable(false), visible: true},
        {columnHeader: 'IP Address', columnName: 'UserIP', sortable: true, columnWidth: '9%', sorted: ko.observable(false), sortedDescending: ko.observable(false), visible: true},
        {columnHeader: 'User', columnName: 'UserID', sortable: true, columnWidth: '10%', sorted: ko.observable(false), sortedDescending: ko.observable(false), visible: true},
        {columnHeader: 'Site', columnName: 'SiteName', sortable: true, columnWidth: '10%', sorted: ko.observable(true), sortedDescending: ko.observable(false), visible: ko.computed(function() {
            return blogId() === 0;
        })},
        {columnHeader: 'Description', columnName: 'EventDescription', sortable: false, columnWidth: 'auto', sorted: ko.observable(false), sortedDescending: ko.observable(false), visible: true}
    ]);


    var _initialPageSize = parseInt($.cookie('wpph_ck_page_size'), 10);
    if (availablePageSize.indexOf(_initialPageSize) < 0) {
        _initialPageSize = availablePageSize()[1];
    }

    var pageSize = ko.observable(_initialPageSize);
    var selectedPageSize = ko.observable(_initialPageSize);
    var pageCount = ko.computed(function() {
        return Math.ceil(totalEventsCount() / pageSize());
    });

    var _currentPageIndex = 1;
    var currentPage = ko.computed({
        read: function() {
            return _currentPageIndex;
        },
        write: function(value) {
            value = parseInt(value, 10);
            if (isNaN(value) || value < 1 || value > pageCount()) {
                return;
            }
            _currentPageIndex = value;
            currentPage.notifySubscribers();
            $('#fdr').val(_currentPageIndex);
        }
    });

    var orderBy = ko.computed({
        read: function() {
            var columnInfo = ko.utils.arrayFirst(columns(), function(item) { return item.sorted(); });
            return columnInfo && columnInfo.columnName || '';
        },
        write: function(value) {
            var columnInfo = ko.utils.arrayFirst(columns(), function(item) {
                return item.columnName === value;
            });
            if (columnInfo) {
                ko.utils.arrayForEach(columns(), function(item) {
                    item.sorted(false);
                    item.sortedDescending(false);
                });
                columnInfo.sorted(value);
            }
        }
    });
    var orderByDescending = ko.computed({
        read: function() {
            var columnInfo = ko.utils.arrayFirst(columns(), function(item) { return item.sorted(); });
            return !!(columnInfo && columnInfo.sortedDescending());
        },
        write: function(value) {
            var columnInfo = ko.utils.arrayFirst(columns(), function(item) { return item.sorted(); });
            if (columnInfo) columnInfo.sortedDescending(value);
        }
    });


    function loadRemoteData(newOffset, bid) {
        newOffset = newOffset || 0;

        var _blogId = null;

        if(bid !== null){
            _blogId = bid;
        }
        else {
            _blogId = parseInt(blogId(), 10);
            if (isNaN(_blogId)) _blogId = undefined;
        }

        var data = {
            action: 'wpph_get_events',
            orderBy: orderBy(),
            sort: orderByDescending() ? 'desc' : 'asc',
            offset: newOffset,
            count: pageSize(),
            blogID: _blogId
        };

        // busy property possible?
        AjaxLoaderShow(__ajaxLoaderTargetElement__);
        loading(true);

        $.ajax({ url: ajaxurl, cache: false, type: 'POST', data: data, dataType: 'json' })
            .then(function (response) {
                if (response.dataSource.blogs) {
                    blogList.removeAll();
                    ko.utils.arrayPushAll(blogList(), response.dataSource.blogs);
                }

                if (response.error.length > 0) {
                    error(response.error);
                    events.removeAll();
                    totalEventsCount(0);
                    offset(0);
                    $('#wpph_ew').attr('colspan', _blogId===undefined ? 8 : 7);
                    return;
                }
                events(response.dataSource.events);
                totalEventsCount(response.dataSource.eventsCount);
                offset(newOffset);

                if (response.dataSource.blogID) {
                    blogId(response.dataSource.blogID);
                }

                if (totalEventsCount() < offset()) {
                    offset(0);
                }

                if (offset() === 0) {
                    currentPage(1);
                }
                else { currentPage(1 + offset() / pageSize()); }
            })
            .fail(function () {
                //Report data loading error
                error("An error occurred while loading data. Please try again in a few moments.");
                events.removeAll();
                totalEventsCount(0);
                offset(0);
            })
            .always(function () {
                loading(false);
                AjaxLoaderHide(__ajaxLoaderTargetElement__);
            });
    }

    function onCurrentPageInputKeyDown(viewModel, event) {
        if (event.keyCode === 13) {
            var value = parseInt(event.currentTarget.value, 10);
            if (isNaN(value) || value < 1 || value > pageCount()) {
                currentPage(_currentPageIndex);
                currentPage.notifySubscribers();
                return;
            }
            currentPage(value);
            refreshEvents((_currentPageIndex - 1) * pageSize());
            return false;
        }
        return true;
    }

    function onRefreshEvents() {
        refreshEvents(0, blogId());
    }

    function onApplyPageSize() {
        applyPageSize();
    }

    function onApplySorting(columnItem) {
        applySorting(columnItem);
    }


    function applyPageSize(){
        var newPageSize = parseInt(selectedPageSize(), 10);
        pageSize(newPageSize);
        var secureCookie = false;
        if (window.location.href.indexOf('https://') > -1) {
            secureCookie = true;
        }
        $.cookie('wpph_ck_page_size', newPageSize, {secure: secureCookie});
        refreshEvents(0);
    }

    function applySorting(columnInfo) {
        if (orderBy() === columnInfo.columnName) {
            orderByDescending(! orderByDescending());
        }
        else {
            orderBy(columnInfo.columnName);
            orderByDescending(false);
        }
        refreshEvents(0);
    }


    function nextPage() {
        var currentOffset = offset();
        var newOffset = currentOffset + pageSize();

        if (newOffset < totalEventsCount()) {
            refreshEvents(newOffset);
        }
    }

    function prevPage() {
        var currentOffset = offset();
        var newOffset = currentOffset - pageSize();

        if (newOffset >= 0) {
            refreshEvents(newOffset);
        }
    }

    function firstPage() {
        if (offset() > 0)
            refreshEvents(0);
    }

    function lastPage() {
        var offset = Math.min(
            totalEventsCount(),
            pageSize() * (pageCount() - 1)
        );
        if (offset() !== offset)
            refreshEvents(offset);
    }


    function refreshEvents(offset, bid) {
        if (loading()) {
            console.warn('Cannot refresh events. Still busy!!!');
            return;
        }
    //    console.warn('refreshEvents: %d', offset);
        if(bid !== null){
            loadRemoteData(offset, bid);
        }
        else { loadRemoteData(offset); }
    }


    return {
        columns: columns,
        error: error,
        loading: loading,
        events: events,
        totalEventsCount: totalEventsCount,
        offset: offset,
        availablePageSize: availablePageSize,

        isMainSite: isMainSite,
        blogId: blogId,
        blogList: blogList,

        pageSize: pageSize,
        selectedPageSize: selectedPageSize,
        pageCount: pageCount,


        currentPage: currentPage,
        orderBy: orderBy,
        orderByDescending: orderByDescending,

        onCurrentPageInputKeyDown: onCurrentPageInputKeyDown,
        onRefreshEvents: onRefreshEvents,
        onApplyPageSize: onApplyPageSize,
        onApplySorting: onApplySorting,

        nextPage: nextPage,
        prevPage: prevPage,
        firstPage: firstPage,
        lastPage: lastPage,

        applyPageSize: applyPageSize,
        applySorting: applySorting,
        refreshEvents: refreshEvents
    };

})(window.jQuery, window.ko);

