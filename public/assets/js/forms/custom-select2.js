(function($) {
    "use strict";
    $(".basic").select2({
        tags: true,
    });
    $(".nested").select2({
        tags: true
    });
    $(".multiple").select2({
        tags: true
    });
    $(".placeholder").select2({
        placeholder: "--Pilih salah satu--",
    });
    $(".disabled").select2({
        placeholder: "--Pilih salah satu--",
    });
    $(".maximumSelected").select2({
        maximumSelectionLength: 2,
    });
    $(".no-search-box").select2({
        minimumResultsForSearch: Infinity
    });
})(jQuery);