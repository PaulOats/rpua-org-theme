/*! jQuery & Zepto Lazy - YouTube Plugin v1.5 - http://jquery.eisbehr.de/lazy - MIT&GPL-2.0 license - Copyright 2012-2018 Daniel 'Eisbehr' Kern */
!function(t){t.lazy(["yt","youtube"],function(t,e){if("iframe"===t[0].tagName.toLowerCase()){var o=/1|true/.test(t.attr("data-nocookie"));t.attr("src","https://www.youtube"+(o?"-nocookie":"")+".com/embed/"+t.attr("data-src")+"?rel=0&amp;showinfo=0"),this.config("removeAttribute")&&t.removeAttr("data-src")}else e(!1)})}(window.jQuery||window.Zepto);