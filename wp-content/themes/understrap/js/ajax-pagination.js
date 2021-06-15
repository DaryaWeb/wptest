(function( $ ) {

    $.fn.wpPagination = function( options ) {
        options = $.extend({
            links: "a",
            action: "pagination",
            ajaxURL: "http://" + location.host + "/wp-admin/admin-ajax.php",
            next: ".next"
        }, options);

        function WPPagination( element ) {
            this.$el = $( element );
            this.init();
        }

        WPPagination.prototype = {
            init: function() {
                this.createLoader();
                this.createEnd();
                this.handleNext();
                this.handleLinks();
            },
            createLoader: function() {
                var self = this;
                $('#pagination').prepend( "<span id='pagination-loader'>Loading...</span>" );
                $('#pagination-loader').hide();
            },
            createEnd: function() {
                var self = this;
                $('#pagination').prepend( "<span id='pagination-end'>End</span>" );
                $('#pagination-end').hide();
            },
            handleNext: function() {
                var self = this;
                var $next = $( options.next, self.$el );
            },
            handleLinks: function() {
                var self = this,
                    $links = $( options.links, self.$el ),
                    $pagination = $( "#pagination" ),
                $loader = $( "#pagination-loader" );
                $end = $( "#pagination-end" );

                $links.click(function( e ) {
                    e.preventDefault();

                    $('#pagination .next').fadeOut();
                    $loader.fadeIn();

                    var $a = $( this ),
                        url = $a.attr("href"),
                        page = url.match( /\d+/ ),
                        pageNumber = page[1],
                        data = {
                            action: options.action,
                            page: pageNumber,
                            posttype: $('#pagination-post-type').text()
                        };

                    $.get( options.ajaxURL, data, function( html ) {
                        $pagination.before( "<div id='page-" + pageNumber + "'></div>" );
                        $pagination.before( html );
                        $a.attr("href", url.replace('/' + pageNumber + '/', '/' + ( parseInt(pageNumber) + 1 ) + '/'));

                        if ( !html ) {
                            $('#pagination .next').remove();
                            $loader.fadeOut();
                            $end.fadeIn();
                        } else {
                            $loader.fadeOut();
                            $('#pagination .next').fadeIn();
                            smoothScroll($('#page-' + pageNumber), 85);
                        }
                    });
                });
            }
        };

        return this.each(function() {
            var element = this;
            var pagination = new WPPagination( element );
        });
    };

    $(function() {
        if( $( "#pagination" ).length ) {
            $( "#pagination" ).wpPagination();
        }
    });

})( jQuery );