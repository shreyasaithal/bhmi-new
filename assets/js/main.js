// Detect a 'touch screen' device
( function ( $ ) {
    "use strict";
    document.documentElement.className +=
        ( ( "ontouchstart" in document.documentElement ) ? ' touch' : ' no-touch' );
} )( jQuery );

function is_touch_device() {
    return 'ontouchstart' in window        // works on most browsers 
        || navigator.maxTouchPoints;       // works on IE10/11 and Surface
}

// Sticky offset top
function sticky_top_offset( height ) {
    "use strict";
    var height = height || 0,
        $ = jQuery,
        h_sticky = $( 'header.sticky:visible' ),
        hm_sticky = $( 'header.sticky.header-mobile:visible' ),
        p_wrap = $( '.passepartout-wrap.line-top' ),
        wp_adm = $( '#wpadminbar' );
    if ( h_sticky.length ) {
        height += h_sticky.height();
    }
    if ( hm_sticky.length ) {
        height += hm_sticky.find( '.header-mobile-wrap' ).height();
    }
    if ( p_wrap.length )
        height += p_wrap.height();
    if ( wp_adm.length && !hm_sticky.length )
        height += wp_adm.height();
    return height;
}

// Animation & Transition End
( function ( $ ) {
    "use strict";
    $.fn.onAnimationEnd = function ( callback, animationName ) {
        var animations = [ 'animationend', 'oAnimationEnd', 'msAnimationEnd', 'webkitAnimationEnd' ];
        return $( this ).one( animations.join( ' ' ), function ( e ) {
            var ev = e.originalEvent || e
            if ( animationName && Object.prototype.toString.call( animationName ) === '[object Array]' && animationName.indexOf( ev.animationName ) === -1 )
                return;
            if ( animationName && Object.prototype.toString.call( animationName ) !== '[object Array]' && animationName !== ev.animationName )
                return;
            callback && callback.apply( this, [ ev.animationName ] );
        } );
    };
    $.fn.onTransitionEnd = function ( callback, propertyName ) {
        var transitions = [ 'transitionend', 'oTransitionEnd', 'msTransitionEnd', 'webkitTransitionEnd' ];
        return $( this ).one( transitions.join( ' ' ), function ( e ) {
            var ev = e.originalEvent || e
            if ( propertyName && Object.prototype.toString.call( propertyName ) === '[object Array]' && propertyName.indexOf( ev.propertyName ) === -1 )
                return;
            if ( propertyName && Object.prototype.toString.call( propertyName ) !== '[object Array]' && propertyName !== ev.propertyName )
                return;
            callback && callback.apply( this, [ ev.propertyName ] );
        } );
    };
    $.fn.animated = function ( so, complete ) {
        var sd = {
            animation: '',
            before: null,
            start: null,
            complete: null,
        },
            s = { };

        if ( 'object' === typeof so ) {
            s = $.extend( true, { }, sd, so );
        } else if ( 'string' === typeof so ) {
            s = sd;
            s.animation = so;
            if ( 'function' === typeof complete ) {
                s.complete = complete;
            }
        }
        return $( this ).each( function () {
            $( this ).removeClass( 'animated' );
            function apply_amination( s ) {
                if ( 'function' === typeof s.before ) {
                    s.before.call( this );
                }
                if ( $( this ).is( ':hidden' ) ) {
                    $( this ).show();
                }
                $( this ).removeClass( 'bounce bounceIn bounceInDown bounceInLeft bounceInRight bounceInUp bounceOut bounceOutDown bounceOutLeft bounceOutRight bounceOutUp av5-fadeIn av5-fadeInUp av5-fadeInLeft av5-fadeInRight av5-fadeInLeft-long av5-fadeInRight-long av5-fadeInUp-long av5-fadeOut fadeIn fadeInDown fadeInDownBig fadeInLeft fadeInLeftBig fadeInRight fadeInRightBig fadeInUp fadeInUpBig fadeOut fadeOutDown fadeOutDownBig fadeOutLeft fadeOutLeftBig fadeOutRight fadeOutRightBig fadeOutUp fadeOutUpBig flash flipInX flipInY flipOutX flipOutY headShake hinge jackInTheBox jello lightSpeedIn lightSpeedOut pulse rollIn rollOut rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight rubberBand shake slideInDown slideInLeft slideInRight slideInUp slideOutDown slideOutLeft slideOutRight slideOutUp swing tada wobble zoomIn zoomInDown zoomInLeft zoomInRight zoomInUp zoomOut zoomOutDown zoomOutLeft zoomOutRight zoomOutUp' );
                $( this ).one( 'animationstart oAnimationStart msAnimationStart webkitAnimationStart', function ( e ) {
                    if ( 'function' === typeof s.start ) {
                        s.start.call( this, e );
                    }
                } ).one( 'animationend oAnimationEnd msAnimationEnd webkitAnimationEnd', function ( e ) {
                    if ( $( this ).is( ':hidden' ) || 'hidden' == $( this ).css( 'visibility' ) || '0' == $( this ).css( 'opacity' ) ) {
                        $( this ).hide();
                    }
                    $( this ).removeClass( 'animated' ).removeClass( s.animation );
                    if ( 'function' === typeof s.complete ) {
                        s.complete.call( this, e );
                    }
                } );
                return $( this ).addClass( 'animated' ).addClass( s.animation );
            }
            if ( s.event ) {
                $( this ).on( s.event, function ( e ) {
                    e.preventDefault();
                    apply_amination.call( this, s );
                } )
            } else {
                apply_amination.call( this, s );
            }
        } );
    };
} )( jQuery );

// modal overlay
( function ( $ ) {
    "use strict";
    $.fn.av5overlay = function ( so ) {
        var sd = {
            object: '',
            class: {
                show: 'av5-open',
                close: 'av5-close',
                bodyclass: 'av5-fixed',
            },
            wrap: {
                class: 'av5-overlay-wrap',
            },
            wrap_modal: {
                class: 'av5-overlay-modal',
                style: 'display:none',
            },
            close_object: {
                class: 'av5-overlay-close',
            }
        },
        s = $.extend( true, { }, sd, so );
        var o = $( s.object ).eq( 0 );
        function ovl( o, s ) {
            var timerId;
            if ( !o.length )
                return o;
            o = o.eq( 0 );
            if ( !o.closest( '.' + s.wrap_modal.class ).length ) {
                o.appendTo( 'body' );
                o.wrap( $( '<div>' ).attr( s.wrap_modal ) );
            }
            if ( !o.closest( '.' + s.wrap.class ).length ) {
                o.wrap( $( '<div>' ).attr( s.wrap ) );
            }
            var _o = o.closest( '.' + s.wrap_modal.class );
            if ( s.close_object && !_o.find( '.' + s.close_object.class ).length ) {
                _o.prepend( $( '<div>' ).attr( s.close_object ) );
                var oc = _o.find( '.' + s.close_object.class );
            }

            o.off( 'toggle.overlay' ).on( 'toggle.overlay', function ( e, show ) {
                var $this = $( this ),
                    $this_wrap = $this.closest( '.' + s.wrap_modal.class ),
                    show = 'undefined' === typeof show ? !$this.hasClass( s.class.show ) : show;
                if ( show ) {
                    $this.show( );
                    $this_wrap.show( );
                    if ( timerId ) {
                        clearInterval( timerId );
                    }
                } else {
                    var onEndTransitionFn = function ( e ) {
                        if ( 'hidden' === $( this ).css( 'visibility' ) || '0' == $( this ).css( 'opacity' ) ) {
                            $( this ).removeClass( s.class.show + ' ' + s.class.close ).css( 'display', 'none' );
                            $this.trigger( 'hided.overlay' );
                        }
                    };
                    $this.onTransitionEnd( onEndTransitionFn, 'opacity' );
                    $this_wrap.onTransitionEnd( onEndTransitionFn, 'opacity' );
                    timerId = setTimeout( function () {
                        if ( 'hidden' === $this_wrap.css( 'visibility' ) || '0' == $this_wrap.css( 'opacity' ) ) {
                            $this.removeClass( s.class.show + ' ' + s.class.close ).css( 'display', 'none' );
                            $this_wrap.removeClass( s.class.show + ' ' + s.class.close ).css( 'display', 'none' );
                            $this.trigger( 'hided.overlay' );
                        }
                    }, 1000 );
                }
                $this.toggleClass( s.class.close, !show ).toggleClass( s.class.show, show );
                $this_wrap.toggleClass( s.class.close, !show ).toggleClass( s.class.show, show );
                $( 'body' ).toggleClass( s.class.bodyclass, show );
                if ( show ) {
                    $this.trigger( 'showed.overlay' );
                }
            } );
            o.off( 'show.overlay' ).on( 'show.overlay', function ( ) {
                $( this ).trigger( 'toggle.overlay', [ true ] );
            } );

            o.off( 'hide.overlay' ).on( 'hide.overlay', function ( ) {
                $( this ).trigger( 'toggle.overlay', [ false ] );
            } );
            if ( oc ) {
                oc.on( 'click', function ( ) {
                    o.trigger( 'hide.overlay' );
                } );
            }
            o.trigger( 'hide.overlay' );
            return o;
        }
        if ( s.object ) {
            var o = ovl( $( s.object ), s );
            $( this ).on( 'click touchstart', function ( e ) {
                e.preventDefault();
                o.trigger( s.close_object ? 'show.overlay' : 'toggle.overlay' );
            } );
        } else {
            $( this ).each( function ( ) {
                var a = $( this ).attr( 'data-av5-overlay' );
                if ( !a )
                    return;
                var o = ovl( $( a ), s );
                return $( this ).on( 'click touchstart', function ( e ) {
                    e.preventDefault();
                    o.trigger( s.close_object ? 'show.overlay' : 'toggle.overlay' );
                } );
            } );
        }
        return $( this );
    };
    $.fn.av5overlay_a = function () {
        return $( this ).each( function () {
            if ( $( this ).attr( 'href' ) && '#' != $( this ).attr( 'href' ) ) {
                $( this ).av5overlay( {
                    object: $( this ).attr( 'href' )
                } );
            }
        } );
    };
    $( function () {
        $( '[data-av5-overlay]' ).av5overlay();
        $( 'a.av5-overlay-button' ).av5overlay_a();
    } );
} )( jQuery );

// modal slide out
( function ( $ ) {
    "use strict";
    $.fn.av5slideout = function ( so ) {
        var sd = {
            from: 'right',
            hover: $( 'body' ).hasClass( 'av5-slide-out-hover' ) && !is_touch_device(),
            object: '',
            class: {
                show: 'av5-open',
                prefix_from: 'av5-slide-out-from-',
                bodyclass: 'av5-slide-out-open',
                close: 'slideout_close',
            },
            wrap_modal: {
                class: 'av5-slide-out-modal',
                style: 'display:none',
            }
        },
        s = $.extend( true, { }, sd, so );
        var o = $( s.object ).eq( 0 );
        function ovl( o, s ) {
            if ( !o.length )
                return o;
            o = o.eq( 0 );
            if ( !o.closest( '.' + s.wrap_modal.class ).length ) {
                o.appendTo( 'body' );
                switch ( s.from ) {
                    case 'left':
                    case 'top':
                        break;
                    case 'right':
                    default:
                        s.from = 'right';
                }
                o.wrap( $( '<div>' ).attr( s.wrap_modal ).addClass( s.class.prefix_from + s.from ) );
            }
            o.off( 'toggle.slideout' ).on( 'toggle.slideout', function ( e, show ) {
                var $this = $( this ),
                    $this_wrap = $this.closest( '.' + s.wrap_modal.class ),
                    show = 'undefined' === typeof show ? !$this_wrap.hasClass( s.class.show ) : show;
                if ( show ) {
                    $( 'body' ).trigger( 'hide.slideout', [ this ] );
                    $this.show( );
                    $this_wrap.show( );
                } else {
                    $this_wrap.onTransitionEnd( function ( e ) {
                        if ( $( this ).hasClass( s.class.show ) && !$( this ).hasClass( s.class.close ) ) {
                            return;
                        }
                        $( this ).removeClass( s.class.show + ' ' + s.class.close ).css( 'display', 'none' );
                        $this.trigger( 'hided.slideout' );
                    }, 'transform' );
                }
                $this_wrap.toggleClass( s.class.close, !show ).toggleClass( s.class.show, show );
                $( 'body' ).toggleClass( s.class.bodyclass, show );
                if ( show ) {
                    $this.trigger( 'showed.slideout' );
                }
            } );
            o.off( 'show.slideout' ).on( 'show.slideout', function ( ) {
                $( this ).trigger( 'toggle.slideout', [ true ] );
            } );

            o.off( 'hide.slideout' ).on( 'hide.slideout', function ( ) {
                $( this ).trigger( 'toggle.slideout', [ false ] );
            } );
            $( 'body' ).on( 'hide.slideout', function ( e, exclude ) {
                o.each( function () {
                    if ( this == exclude ) {
                        return;
                    }

                    $( this ).trigger( 'toggle.slideout', [ false ] );
                } );
            } );
            $( 'body' ).on( 'click touchstart', '.' + s.class.close, function ( e ) {
                e.preventDefault();
                o.trigger( 'toggle.slideout', [ false ] );
            } );
            if ( s.hover ) {
                o.closest( '.' + s.wrap_modal.class ).on( 'mouseleave', function () {
                    o.trigger( 'hide.slideout' );
                } );
            }
            o.trigger( 'toggle.slideout', [ false ] );
            return o;
        }
        if ( s.object ) {
            var o = ovl( $( s.object ), s );
            $( this ).on( 'click touchstart', function ( e ) {
                e.preventDefault();
                o.trigger( 'toggle.slideout' );
            } );
            if ( s.hover ) {
                $( this ).on( 'mouseenter', function () {
                    o.trigger( 'show.slideout' );
                } );
            }
        } else {
            $( this ).each( function ( ) {
                var a = $( this ).data( 'av5-slide-out' );
                if ( !a )
                    return;
                var sf = $( this ).data( 'av5-from' );
                if ( 'undefined' !== typeof sf ) {
                    s.from = sf;
                }
                sf = $( this ).data( 'av5-slide-out-hover' );
                if ( 'undefined' !== typeof sf ) {
                    s.hover = !!sf;
                }
                var o = ovl( $( a ), s );

                $( this ).on( 'click touchstart', function ( e ) {
                    e.preventDefault();
                    o.trigger( 'toggle.slideout' );
                } );
                if ( s.hover ) {
                    $( this ).on( 'mouseenter', function () {
                        o.trigger( 'show.slideout' );
                    } );
                }

            } );
        }
        return $( this );
    };
    $.fn.av5slideout_a = function () {
        return $( this ).each( function () {
            if ( $( this ).attr( 'href' ) && '#' != $( this ).attr( 'href' ) ) {
                $( this ).av5slideout( {
                    object: $( this ).attr( 'href' ),
                    from: $( this ).hasClass( 'av5-slide-out-left-button' ) ? 'left' : 'right'
                } );
            }
        } );
    };
    $( function () {
        $( '[data-av5-slide-out]' ).av5slideout();
        $( 'a.av5-slide-out-left-button,a.av5-slide-out-right-button' ).av5slideout_a();
    } );
} )( jQuery );

( function ( $ ) {
    "use strict";
    $.fn.formData = function ( type ) {
        var $this = $( this ).eq( 0 ),
            type = type || [ 'input', 'select', 'textarea' ],
            form = { };

        type = Array.isArray( type ) ? type.join( ',' ) : type;
        $this.find( type ).each( function () {
            var name_elm = $( this ).attr( 'name' ),
                type_elm = $( this ).attr( 'type' ),
                value_elm = $( this ).val(),
                count = 10,
                ti_merge_value = function ( o1, o2 ) {
                    if ( 'object' === typeof o2 ) {
                        if ( 'undefined' === typeof o1 ) {
                            o1 = { };
                        }
                        for ( var i in o2 ) {
                            if ( '' === i ) {
                                var j = -1;
                                for ( j in o1 ) {
                                    j = j;
                                }
                                j = parseInt( j ) + 1;
                                o1[j] = ti_merge_value( o1[i], o2[i] );
                            } else {
                                o1[i] = ti_merge_value( o1[i], o2[i] );
                            }
                        }
                        return o1;
                    } else {
                        return o2;
                    }
                };
            if ( 'button' === type_elm || 'submit' === type_elm ) {
                return;
            }
            while ( /^(.+)\[([^\[\]]*?)\]$/.test( name_elm ) && 0 < count ) {
                var n_name = name_elm.match( /^(.+)\[([^\[\]]*?)\]$/ );
                if ( 3 === n_name.length ) {
                    var _value_elm = { };
                    _value_elm[n_name[2]] = value_elm;
                    value_elm = _value_elm;
                }
                name_elm = n_name[1];
                count--;
            }
            if ( 'checkbox' === type_elm || 'radio' === type_elm ) {
                if ( $( this ).is( ':checked' ) ) {
                    if ( !value_elm.length && 'object' !== typeof value_elm ) {
                        value_elm = true;
                    }
                    form[name_elm] = ti_merge_value( form[name_elm], value_elm );
                }
            } else {
                form[name_elm] = ti_merge_value( form[name_elm], value_elm );
            }
        } );
        return form;
    }
} )( jQuery );

// Slide out menu
jQuery( function ( $ ) {
    "use strict";
    var $slideOutMenu = $( '#header .header__item.header__item__slide-out-menu' ),
        $slideOutMenu_hover_state = $slideOutMenu.hasClass( 'slideout-menu--hover' );
    if ( $slideOutMenu.length ) {
        if ( $slideOutMenu.hasClass( 'header-burger-menu-fullscreen' ) ) {
            $slideOutMenu.av5overlay( {
                object: '#slide-out-menu-content'
            } );
            $( 'body' ).on( 'mouseover mouseenter', '.av5-overlay-modal #slide-out-menu-content .menu-item > a ', function () {
                var $this = $( this ),
                    image = $this.data( 'backgroundFullscreen' ),
                    image_attr = image ? 'url(' + image + ')' : '',
                    $background_wrapper = $this.closest( '.av5-overlay-wrap' ).eq( 0 );
                $background_wrapper.css( 'background-image', image_attr );
            } );
        } else {
            if ( $slideOutMenu_hover_state ) {
                $( '#slide-out-menu-content .slideout_close' ).css( 'display', 'none' );
            }
            $slideOutMenu.av5slideout( {
                object: '#slide-out-menu-content',
                from: $slideOutMenu.closest( '.header-left' ).length ? 'left' : 'right',
                hover: $slideOutMenu_hover_state
            } );
        }
    }
    var $slideOutMenuMobile = $( '#header-mobile .header__item.header__item__slide-out-menu--mobile' );
    if ( $slideOutMenuMobile.length ) {
        $slideOutMenuMobile.av5slideout( {
            object: '#slide-out-menu-content--mobile',
            from: $slideOutMenuMobile.closest( '.header-left' ).length ? 'left' : 'right',
            hover: false
        } );
    }
    var $slideOutSearch = $( '#header .header-item.header__item__search--search-slideout' ),
        $slideOutSearch_hover_state = $slideOutSearch.hasClass( 'slideout-search--hover' );
    if ( $slideOutSearch.length ) {
        $slideOutSearch.av5slideout( {
            object: '#slideout-search',
            from: 'top',
            hover: $slideOutSearch_hover_state
        } );
    }
    var $slideOutSearchMobile = $( '#header-mobile .header-item.header__item__search--search-slideout' );
    if ( $slideOutSearchMobile.length ) {
        $slideOutSearchMobile.av5slideout( {
            object: '#slideout-search',
            from: 'top',
            hover: false
        } );
    }
} );

// Masonry Blog
jQuery( function ( $ ) {
    "use strict";
    var blog_listing = $( '.blog-listing-wrap.blog-listing--masonry' );
    if ( blog_listing.length ) {
        blog_listing.masonry( {
            itemSelector: 'article',
            columnWidth: 'article',
            stagger: 30,
            percentPosition: true,
            transitionDuration: '0.8s'
        } );
        blog_listing.imagesLoaded().progress( function () {
            blog_listing.masonry( 'layout' );
        } );
    }
} );

/* Reveal post */
jQuery( function ( $ ) {
    "use strict";

    var config = {
        viewFactor: 0.15,
        duration: 2500,
        distance: "100px",
        easing: 'cubic-bezier(0.3, 0.2, 0.1, 1)',
        scale: 1
    }
    if ( $( '.reveal-animation--fadein' ).length ) {
        config = {
            distance: "0px",
            scale: 1,
            duration: 1500,
            easing: 'ease',
        }
    }
    window.sr = ScrollReveal( config );
    ScrollReveal_init();
    function ScrollReveal_init() {
        if ( $( '#post-list.reveal--on' ).length ) {

            sr.reveal( '#post-list article.post', config );
            if ( $( '.reveal-animation--leftright' ).length ) {
                var blog_left = {
                    origin: 'left',
                    duration: 1000,
                }
                var blog_right = {
                    origin: 'right',
                    duration: 1000,
                }
                var blog_top = {
                    origin: 'bottom',
                }
                sr.reveal( '.blog-listing-wrap article.post:nth-child(even) > div', blog_left );
                sr.reveal( '.blog-listing-wrap article.post:nth-child(odd) > div', blog_right );
                sr.reveal( '.blog-listing-wrap article.post .content-style-1', blog_top );
            }
        }
    }

    if ( $( '.reveal--on' ).length ) {
        $( '#primary .page-layout #post-list' ).on( 'append.infiniteScroll', function ( event, response, path, items ) {
            $( items ).addClass( 'infiniteScroll-loaded' );
            ScrollReveal_init( '#primary .page-layout #post-list article.post.infiniteScroll-loaded' );
        } );
    }
    if ( !$.fn.hasOwnProperty( 'infiniteScroll' ) || 0 >= $( '#primary .page-layout #post-list' ).length || 0 >= $( 'nav.navigation .nav-previous a' ).length ) {
        return;
    }
    if ( 'infinitescroll' === av5_JS.pagination_type ) {
        var loader = $( '<div>' ).attr( 'class', 'infinite-scroll-request' ).html( av5_JS.pagination_infinity_loader );
        var last = $( '<div>' ).attr( 'class', 'infinite-scroll-last' ).html( av5_JS.pagination_message );
        var status = $( '<div>' ).attr( { class: 'infiniteScroll-load-status', style: 'display: none;' } ).append( loader ).append( last );
        $( 'nav.navigation .nav-links' ).after( status );
        $( '#primary .page-layout #post-list' ).infiniteScroll( {
            path: 'nav.navigation .nav-previous a',
            append: '#primary .page-layout #post-list article.post',
            hideNav: 'nav.navigation .nav-links',
            status: '.infiniteScroll-load-status',
            history: false,
            elementScroll: false,
            outlayer: $( '.blog-listing-wrap.blog-listing--masonry' ).data( 'masonry' ),
        } );
    } else if ( 'loadmore' === av5_JS.pagination_type ) {
        var loader = $( '<div>' ).attr( 'class', 'infinite-scroll-request' ).html( av5_JS.pagination_infinity_loader );
        var last = $( '<div>' ).attr( 'class', 'infinite-scroll-last' ).html( av5_JS.pagination_message );
        var status = $( '<div>' ).attr( { class: 'infiniteScroll-load-status', style: 'display: none;' } ).append( loader ).append( last );
        var button = $( '<a>' ).attr( { class: 'morescroll-button button', href: '#' } ).html( av5_JS.pagination_load_more );
        $( 'nav.navigation .nav-links' ).after( status ).after( button );
        $( '#primary .page-layout #post-list' ).infiniteScroll( {
            path: 'nav.navigation .nav-previous a',
            append: '#primary .page-layout #post-list article.post',
            hideNav: 'nav.navigation .nav-links',
            status: '.infiniteScroll-load-status',
            button: '.morescroll-button',
            history: false,
            elementScroll: false,
            scrollThreshold: false,
            outlayer: $( '.blog-listing-wrap.blog-listing--masonry' ).data( 'masonry' ),
        } ).on( 'request.infiniteScroll', function () {
            button.hide();
        } ).on( 'append.infiniteScroll', function () {
            button.show();
        } ).on( 'last.infiniteScroll', function () {
            button.remove();
        } );
    }
    $( '#primary .page-layout #post-list' ).on( 'append.infiniteScroll', function ( event, response, path, items ) {
        var e = $( items ),
            f = e.first(),
            c = f.nextUntil( '.first' ).length + 1,
            l = 0;
        e.each( function () {
            var a = $( this );
            l++;
            switch ( l % c ) {
                case 1:
                    a.addClass( 'first' ).removeClass( 'last' );
                    break;
                case 0:
                    a.addClass( 'last' ).removeClass( 'first' );
                    break;
                default:
                    a.removeClass( 'last' ).removeClass( 'first' );
                    break;
            }
        } );
    } );
} );

// Forced full-width stretching
( function ( $ ) {
    "use strict";
    $.fn.av5_force_fullwidth = function () {
        var $this = $( this );
        var $passpmargin = 0;
        function stretching( $this, $window ) {
            var $window = $window || $( window ),
                $window_w = $window.width();
            return $this.each( function () {
                var _this = $( this ),
                    _this_outer = _this.outerWidth(),
                    _this_marg_l = _this.css( 'margin-left' ).replace( /[^0-9\.\,\-]/ig, '' ) || '0';
                if ( $( '.layout-passepartout' ).length ) {
                    if ( $( window ).width() >= 768 ) {
                        $passpmargin = 60;
                    } else if ( $( window ).width() >= 490 ) {
                        $passpmargin = 30;
                    } else {
                        $passpmargin = 0;
                    }
                }
                if ( 0 != $window_w - _this_outer ) {
                    _this.width( _this.width() + ( $window_w - _this_outer - $passpmargin ) );
                }
                try {
                    _this_marg_l = parseFloat( _this_marg_l );
                } catch ( e ) {
                    _this_marg_l = 0;
                }
                _this.css( 'margin-left', _this_marg_l - _this.offset().left + $passpmargin / 2 );
            } );
        }
        $( window ).on( 'resize', function () {
            stretching( $this, $( this ) );
        } );
        return stretching( $this );
    };
    $( function ( $ ) {
        $( '.av5_force_fullwidth' ).av5_force_fullwidth();
    } );
} )( jQuery );

// Fullscreen search modal
jQuery( function ( $ ) {
    "use strict";
    $( '.header__item__search--fullscreen-search' ).av5overlay( {
        object: '#av5-fullscreen-search'
    } );
} );

// Search Drop Down show/hide
jQuery( function ( $ ) {
    "use strict";
    function av5_dd_search( ) {
        $( '#header.header .header-item.search' ).hoverIntent( {
            over: function ( ) {
                $( this ).find( '#av5-search-drop' ).first( ).stop( true, true ).fadeIn( 50 );
            },
            out: function ( ) {
                $( this ).find( '#av5-search-drop' ).first( ).stop( true, true ).fadeOut( 300 );
            },
            timeout: 100
        } );
    }
    if ( $( '#av5-search-drop' ).length ) {
        av5_dd_search( );
    }
} );

// Title Area Hero
( function ( $ ) {
    "use strict";
    $.fn.centred = function ( so ) {
        var sd = {
            v: null,
            h: null
        },
        s = $.extend( true, { }, sd, so );
        return $( this ).each( function () {
            var a = $( this ),
                h = a.outerHeight(),
                w = a.outerWidth(),
                h2 = h / 2,
                w2 = w / 2;
            if ( 'bottom' === s.v || 'top' === s.v ) {
                var hh = 'top' === s.v ? Math.ceil( h2 ) : Math.ceil( h2 );
                $( this ).css( 'margin-' + s.v, -hh );
            }
            if ( 'left' === s.h || 'right' === s.h ) {
                var ww = 'right' === s.h ? Math.ceil( w2 ) : Math.ceil( w2 );
                $( this ).css( 'margin-' + s.h, -ww );
            }
        } );
    }

    $( function ( $ ) {
        $( '.title-area-hero .page-heading' ).each( function () {
            var $this = $( this ),
                $window = $( window ),
                $this_text = $this.find( '.page-heading-text' ),
                $this_text_h = $this_text.height(),
                $this_h = parseInt( $this.data( 'height' ), 10 ),
                update = function() {};
            if ( $this_text_h > $this_h ) {
                $this_h = $this_text_h + 80;
            }
            $this.stop().velocity( { height: $this_h }, 1200, "ease" );
            $this_text.centred( { v: 'top' } ).stop().velocity( { opacity: 1 }, 900 );
            if ( $this.hasClass( 'heading-effect-parallax' ) ) {
                update = function() {
                    var scrollTop = $window.scrollTop(),
                        _scrollTop = scrollTop,
                        _height = sticky_top_offset(),
                        $this_text_k = 1;

                    _scrollTop = _scrollTop - _height;
                    if ( 0 > _scrollTop ) {
                        _scrollTop = 0;
                    }
                    $this_text_k = _scrollTop / ( $this_h - _height );
                    $this.css( { 'transform': 'translateY(' + _scrollTop * 0.3 + 'px)' } );
                    $this_text.css( {
                        transform: 'translateY(' + scrollTop * 0.09 * ( 1 + $this_text_k ) + 'px)',
                        opacity: 1 - $this_text_k
                    } ).toggle( 1 - $this_text_k > 0.01 );
                }

            } else if ( $this.hasClass( 'heading-effect-parallax2' ) ) {
                var speed = 1.5,
                    $this_bg_h = $this_h * ( speed - 1 ),
                    $this_bg = $this.find( '.bg-layer' ).css( 'height', 'calc(100% + ' + $this_bg_h + 'px)' ),
                    $this_bg_st = ( speed - 1 ) * 100;
                update = function() {
                    var $window_h = $window.height(),
                        $window_st = $window.scrollTop(),
                        $this_ost = $this.offset().top,
                        _height = sticky_top_offset();
                    ty = ( $window_st ) / ( $this_ost + $this_h );
                    ty = 0 > ty ? 0 : ty;
                    if ( 0 > ty || 1 < ty ) {
                        return;
                    }
                    $this_bg.css( { 'top': $this_bg_st * ( ty - 1 ) + '%' } );
                    return true;
                }
            } else {
                update = function() {

                }
            }
            if ( $this.hasClass( 'heading-effect-parallax' ) || $this.hasClass( 'heading-effect-parallax2' ) ) {
                update();
                $( window ).on( 'scroll', function () {
                    requestAnimationFrame( update );
                } );
                $( window ).on( 'resize', function () {
                    requestAnimationFrame( update );
                } );
            }
        } );
    } );
} )( jQuery );

// Preloader and Page Transitions
if ( 'undefined' != typeof NProgress ) {
    ( function ( $ ) {
        NProgress.configure( {
            showSpinner: false,
            parent: '#page-wrap',
        } ).set( 0.1 ).start();
        if ( $( 'img' ).length ) {
            var index = 0.9 / $( 'img' ).length;
            $( 'img' ).one( 'load', function () {
                NProgress.inc( index );
            } ).each( function () {
                if ( this.complete )
                    $( this ).trigger( 'load' );
            } );
        }
        $( window ).on( 'pageshow', function () {
            NProgress.done();
        } );
    } )( jQuery );
}
( function ( $ ) {
    "use strict";
    if ( $( 'body.av5-preloader' ).length ) {
        $( window ).on( 'pageshow', function ( ) {
            if ( $( 'body.av5-preloader' ).length ) {
                $( '#av5-home-preloader' ).onAnimationEnd( function ( ) {
                    $( this ).hide( );
                    $( 'body' ).removeClass( 'av5-fixed av5-preloader av5-page-fading-out' );
                    $( 'body' ).trigger( 'pageloaded.av5' );
                } );
                $( 'body' ).addClass( 'av5-page-fading-out' );
            }
        } );
    }
} )( jQuery );

// Unloader
( function ( $ ) {
    "use strict";
    $( window ).on( 'unload', function ( ) {
        if ( $( 'body' ).hasClass( 'page-transitions' ) ) {
            $( '#av5-home-preloader' ).show( );
            $( 'body' ).addClass( 'av5-page-fading-in' ).addClass( 'av5-preloader' );
        }
    } );
    if ( jQuery( 'body' ).hasClass( 'page-transitions' ) ) {
        $( 'body' ).on( 'click', 'a[href]:not(.no-ajaxy):not([target="_blank"]):not([href^="#"]):not([href^="mailto:"]):not(.comment-edit-link):not(.magnific-popup):not(.magnific):not(.meta-comment-count a):not(.comments-link):not(#cancel-comment-reply-link):not(.comment-reply-link):not(#toggle-nav):not(.logged-in-as a):not(.add_to_cart_button):not(.remove_from_cart_button):not(.av5_video_button)', function ( e ) {
            if ( $( this ).is( '[href^="#"]' ) || $( this ).is( '[href^="javascript:"]' ) )
                return;
            var $windowLocationHref = window.location.href.split( "#" )[0];
            var $aHref = $( this ).attr( 'href' ).split( "#" )[0];
            if ( 1 < $( this ).attr( 'href' ).split( "#" ).length && ( $windowLocationHref == $aHref || $windowLocationHref == $aHref + '/' ) )
                return;
            if ( !$( this ).parent().hasClass( 'no-ajaxy' ) ) {
                e.preventDefault();
                var $aHref = $( this ).attr( 'href' );
                if ( $aHref != '' ) {
                    $( '#av5-home-preloader' ).show( );
                    $( '#av5-home-preloader' ).onAnimationEnd( function () {
                        window.location = $aHref;
                    } );
                    $( 'body' ).addClass( 'av5-page-fading-in' ).addClass( 'av5-preloader' );
                }
            }
        } );
    }

} )( jQuery );

// Scroll to top
jQuery( function ( $ ) {
    "use strict";
    var $toTop = $( "#toTop" );
    var $footerButton = $( ".footer-fixed-button" );
    /* product bar fix */
    var $prodBar = $( ".product-bar" );
    var $bottomValue = '30px';
    if ( $prodBar.length > 0 ) {
        $bottomValue = '65px';
    }
    $footerButton.css( { "bottom": $bottomValue } );

    if ( $toTop.length > 0 ) {
        $( window ).on( 'scroll', function () {
            backToTop();
        } );
    }
    if ( $toTop.length > 0 && $footerButton.length > 0 ) {
        $( window ).on( 'scroll', function () {
            footerButtonMove();
        } );
    }
    $toTop.on( "click", function () {
        $( "body" ).stop().velocity( "scroll", {
            duration: 1000,
            easing: "easeInBack"
        } );
    } );

    function backToTop() {
        var scrollPosition = $( window ).scrollTop();
        if ( scrollPosition > 500 ) {
            $toTop.addClass( 'show' );
        } else if ( scrollPosition < 500 ) {
            $toTop.removeClass( 'show' );
        }
    }

    function footerButtonMove() {
        var scrollPosition = $( window ).scrollTop();

        if ( scrollPosition > 500 ) {
            $footerButton.stop().velocity( { 'right': '90px' }, { duration: 200, queue: false } );
        } else if ( scrollPosition < 500 ) {
            $footerButton.stop().velocity( { 'right': '30px' }, { duration: 200, queue: false } );
        }
    }
} );

// Sticky header
jQuery( function ( $ ) {
    "use strict";
    if ( $( '#header.sticky' ).length > 0 ) {
        var $resizedHeader = $( "#header.sticky-resized" ),
            headerResize = function() {
            var scrollPosition = $( window ).scrollTop();
            if ( scrollPosition > 45 ) {
                $resizedHeader.addClass( 'is-sticky' );
                $( '#header' ).find( '.logo' ).addClass( 'animated' );
            } else {
                $resizedHeader.removeClass( 'is-sticky' );
                $( '#header' ).find( '.logo' ).removeClass( 'animated' );
            }
        };

        if ( $resizedHeader.length > 0 ) {
            $( window ).on( 'scroll', function () {
                headerResize();
            } );
        }
    }
} );

// Carousel Shortcode
jQuery( function ( $ ) {
    "use strict";
    $( 'body' ).on( 'init_shortcode.carousel', function ( e, parent ) {
        var parent = parent || $( 'body' );
        $( parent ).find( '.av5-carousel-shortcode' ).each( function () {
            var $this = $( this );
            if ( !$this.hasClass( 'owl-loaded' ) ) {
                $this.children().each( function () {
                    if ( !$( this ).is( 'div.carousel-item' ) ) {
                        $( this ).remove();
                    }
                } );
            }

            var sc_options = { responsive: { } },
            sc_data = $this.data();
            if ( sc_data.hasOwnProperty( 'column-mobile' ) ) {
                sc_options.responsive['0'] = { items: sc_data['column-mobile'] };
            } else if ( sc_data.hasOwnProperty( 'columnMobile' ) ) {
                sc_options.responsive['0'] = { items: sc_data['columnMobile'] };
            }
            if ( sc_data.hasOwnProperty( 'column-table' ) ) {
                sc_options.responsive['690'] = { items: sc_data['column-table'] };
            } else if ( sc_data.hasOwnProperty( 'columnTable' ) ) {
                sc_options.responsive['690'] = { items: sc_data['columnTable'] };
            }
            if ( sc_data.hasOwnProperty( 'column-desktop-small' ) ) {
                sc_options.responsive['1000'] = { items: sc_data['column-desktop-small'] };
            } else if ( sc_data.hasOwnProperty( 'columnDesktopSmall' ) ) {
                sc_options.responsive['1000'] = { items: sc_data['columnDesktopSmall'] };
            }
            if ( sc_data.hasOwnProperty( 'column-desktop' ) ) {
                sc_options.responsive['1300'] = { items: sc_data['column-desktop'] };
            } else if ( sc_data.hasOwnProperty( 'columnDesktop' ) ) {
                sc_options.responsive['1300'] = { items: sc_data['columnDesktop'] };
            }

            if ( sc_data.hasOwnProperty( 'margin' ) )
                sc_options.margin = sc_data['margin'];
            if ( sc_data.hasOwnProperty( 'loop' ) )
                sc_options.loop = sc_data['loop'];
            if ( sc_data.hasOwnProperty( 'nav' ) )
                sc_options.nav = sc_data['nav'];
            if ( sc_data.hasOwnProperty( 'dots' ) )
                sc_options.dots = sc_data['dots'];
            if ( sc_data.hasOwnProperty( 'counter' ) )
                sc_options.counter = sc_data['counter'];
            if ( sc_data.hasOwnProperty( 'autoplay' ) )
                sc_options.autoplay = 1 == sc_data['autoplay'];
            if ( sc_data.hasOwnProperty( 'autoplay-timeout' ) ) {
                sc_options.autoplayTimeout = sc_data['autoplay-timeout'];
            } else if ( sc_data.hasOwnProperty( 'autoplayTimeout' ) ) {
                sc_options.autoplayTimeout = sc_data['autoplayTimeout'];
            }
            var options = $.extend( {
                responsive: {
                    0: {
                        items: 1
                    },
                    690: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    },
                    1300: {
                        items: 1
                    }
                },
                margin: 0,
                dotsEach: 1,
                smartSpeed: 400,
                autoplay: false,
                autoplayTimeout: 5000,
                onTranslate: function () {
                    $this.addClass( 'moving' );
                },
                onTranslated: function () {
                    $this.removeClass( 'moving' );
                },
                onInitialized: function () {
                    if ( this.$element.data( 'counter' ) ) {
                        var max_slides = this.items().length,
                            current_slide = this.relative( this.current() ) + 1;
                        if ( !this.$element.children( '.owl-counter' ).length ) {
                            this.$element.append( '<div class="owl-counter"><span class="owl-conter-current"></span><span class="owl-conter-max"></span></div>' );
                        }
                        this.$element.children( '.owl-counter' ).find( '.owl-conter-current' ).text( current_slide );
                        this.$element.children( '.owl-counter' ).find( '.owl-conter-max' ).text( max_slides );
                    }
                },
                onChanged: function () {
                    if ( this.$element.data( 'counter' ) ) {
                        var max_slides = this.items().length,
                            current_slide = this.relative( this.current() ) + 1;
                        this.$element.children( '.owl-counter' ).find( '.owl-conter-current' ).text( current_slide );
                        this.$element.children( '.owl-counter' ).find( '.owl-conter-max' ).text( max_slides );
                    }
                }
            }, av5_JS.owlcarousel_shortcode, sc_options );
            $this.owlCarousel( options );
        } );
    } ).trigger( 'init_shortcode.carousel' );
} );

// Smooth scroll
( function ( $ ) {
    "use strict";
    if ( $.fn.niceScroll && $( window ).width() > 690 && $( 'body' ).outerHeight( true ) > $( window ).height() && !navigator.userAgent.match( /(android|ipod|iphone|ipad|iemobile|opera mini)/i ) ) {
        $( 'html' ).niceScroll( {
            scrollspeed: 60,
            mousescrollstep: 40,
            cursorwidth: 12,
            zindex: 9999,
            cursorborder: 0,
            smoothscroll: true,
            cursorcolor: '#303030',
            cursorborderradius: 0,
            autohidemode: true,
            horizrailenabled: false
        } );
        $( 'body' ).on( 'update.niceScroll', function () {
            if ( $().niceScroll && $( "html" ).getNiceScroll() ) {
                $( "html" ).getNiceScroll().resize();
            }
        } ).trigger( 'update.niceScroll' );
        $( 'body' ).on( 'initialized.owl.carousel', '.owl-carousel', function () {
            $( 'body' ).trigger( 'update.niceScroll' );
        } );
        $( 'body' ).on( 'append.infiniteScroll', '#primary .page-layout .products, #primary .page-layout #post-list', function () {
            $( 'body' ).trigger( 'update.niceScroll' );
            setTimeout( function () {
                $( 'body' ).trigger( 'update.niceScroll' );
            }, 1000 );
        } );
    }
} )( jQuery );

// Animated text shortcode
jQuery( function ( $ ) {
    "use strict";
    $( 'body' ).on( 'init_shortcode.animatedtext', function ( e, parent ) {
        var parent = parent || $( 'body' );
        var short_class = 'av5-animated-text';
        $( parent ).find( '.' + short_class + '--fadeIn:not(.' + short_class + '-inited)' ).each( function () {
            var $this = $( this );
            $this.on( 'play.animatedtext', function () {
                var $this = $( this );
                if ( $this.hasClass( short_class + '-play' ) ) {
                    return;
                }
                $this.find( '.letter' ).each( function ( i ) {
                    $( this ).velocity( { opacity: 1 },
                        {
                            duration: 800,
                            delay: ( i * 60 ),
                            easing: "easeInOutQuad"
                        }
                    );
                } );
                $this.addClass( short_class + '-play' );
            } );

            $this.html( $this.text().replace( /[^\s]/g /*/([^\x00-\x80]|\w)/g*/, "<span class='letter'>$&</span>" ) );

            $this.waypoint( {
                handler: function () {
                    var $this = $( this ),
                        delay = $this.data( 'delay' ) || 1;
                    setTimeout( function () {
                        $this.trigger( 'play.animatedtext' );
                    }, delay );
                },
                offset: '80%'
            } );
            $this.addClass( 'av5-animated-text-inited' );
        } )
    } ).trigger( 'init_shortcode.animatedtext' );
} );

// Comment form validation
jQuery( function ( $ ) {
    "use strict";
    if ( $( "#commentform" ).length ) {
        $( "#commentform" ).each( function () {
            $( this ).validate( {
                submitHandler: function ( form ) {
                    $( form ).find( 'input[type="submit"]' ).prop( "disabled", true );
                    form.trigger( "submit" );
                },
                rules: {
                    author: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    comment: "required"
                },
                messages: av5_JS.validation_commentform
            } );
        } );
    }
} );

// menu mobile
jQuery( function ( $ ) {
    "use strict";
    $( '#slide-out-menu-content--mobile ul:not(.sub-menu) > li > ul.sub-menu' ).each( function () {
        $( this ).before( $( '<i>' ).attr( 'class', 'fas fa fa-angle-down' ) ).hide();
    } );
    $( 'body' ).on( 'click touchstart', '#slide-out-menu-content--mobile i.fa-angle-down', function () {
        var $this = $( this );
        $this.toggleClass( 'opened' );
        var $submenu = $this.siblings( '.sub-menu' );
        $submenu['slide' + ( $submenu.is( ':visible' ) ? 'Up' : 'Down' )]( 400 );
    } );
} );


// Video Lightbox Shortcode
jQuery( function ( $ ) {
    "use strict";
    window.resizeIframe = function () {};
    $( 'body' ).off( 'click', '.av5_video_button' ).on( 'click', '.av5_video_button', function ( e ) {

        var $this = $( this ),
            href = '' + $this.attr( 'href' ) || '',
            embedSrc;

        var patterns = {
            youtube: {
                index: 'youtube.com',
                pattern: /v=([^\?\=\&]+)/i,
                src: '//www.youtube.com/embed/%id%?autoplay=1'
            },
            vimeo: {
                index: 'vimeo.com',
                pattern: /\/([^\/]+)$/i,
                src: '//player.vimeo.com/video/%id%?autoplay=1'
            }
        };
        $.each( patterns, function () {
            if ( href.indexOf( this.index ) > -1 ) {
                var id = ( href.match( this.pattern ) || [ '', '' ] )[1];
                embedSrc = this.src.replace( /\%id\%/i, id );
                return false;
            }
        } );
        if ( embedSrc ) {
            e.preventDefault();
            if ( !$( '.av5-video-content__wrapper' ).length ) {
                $( 'body' ).append( $( '<div>' ).attr( { class: 'av5-video-content__wrapper' } ) );

            }
            $( '.av5-video-content__wrapper_null' ).av5overlay( { object: '.av5-video-content__wrapper' } );
            $( '.av5-video-content__wrapper' ).on( 'show.overlay', function ( e, data ) {
                var $this = $( this ),
                    $this_modal = $this.closest( '.av5-overlay-modal' );
                if ( !$this_modal.hasClass( 'av5-overlay-video-content-small' ) ) {
                    $this_modal.addClass( 'av5-overlay-video-content-small' );
                }
                $( window ).on( 'resize', function () {
                    var height = $( window ).height();
                    $this_modal.css( {
                        top: 'calc( 50% - ' + height / 2 + 'px)',
                        height: height,
                    } );
                } );
                var height = $( window ).height();
                $this_modal.css( {
                    top: 'calc( 50% - ' + height / 2 + 'px)',
                    height: height,
                } );

                $( this ).html( $( '<iframe>' ).attr( {
                    src: data,
                    frameborder: 'no',
                    allowfullscreen: 'yes',
                } ) );
            } );
            $( '.av5-video-content__wrapper' ).on( 'hided.overlay', function () {
                $( this ).html( '' );
            } );
            $( '.av5-video-content__wrapper' ).trigger( 'show.overlay', embedSrc );
        }
        return false;
    } );
    $( 'body' ).on( 'click', '.av5-overlay-video-content-small', function () {
        $( this ).find( '.av5-video-content__wrapper' ).trigger( 'hide.overlay' );
    } );
} );
( function ( $ ) {
    "use strict";
    $( 'body' ).on( 'click', '.simple-social-icons a', function ( e ) {
        var newWind = window.open( $( this ).attr( 'href' ), $( this ).attr( 'title' ), "width=420,height=320,resizable=yes,scrollbars=yes,status=yes" );
        if ( newWind ) {
            newWind.focus();
            e.preventDefault();
        }
    } );
} )( jQuery );

// Social modal
jQuery( function ( $ ) {
    "use strict";
    $( 'body' ).on( 'click', '.av5-social-button', function ( e ) {
        var newWind = window.open( $( this ).attr( 'href' ), $( this ).attr( 'title' ), "width=420,height=320,resizable=yes,scrollbars=yes,status=yes" );
        if ( newWind ) {
            newWind.focus();
            e.preventDefault();
        }
    } );
} );

// if overlay content bigger then window height, set its height to 100% to fix scrolling
( function ( $ ) {
    "use strict";
    $.fn.av5_overlay_height = function () {
        var $this = $( this );
        function stretching() {
            var $window_h = $( window ).height();
            return $( this ).each( function () {
                var $this = $( this );
                if ( $window_h < $this.outerHeight() ) {
                    $this.css( 'height', '100%' );
                }
            } );
        }
        $( window ).on( 'resize', function () {
            stretching.call( $this );
        } );
        return stretching.call( $this );
    };
    $( 'body' ).on( 'showed.overlay', '.av5-overlay-modal .av5-overlay-wrap > div:not(.av5-fullscreen-search):not(.av5-video-content__wrapper)', function () {
        $( this ).av5_overlay_height();
    } );
} )( jQuery );

jQuery( function ( $ ) {
    "use strict";
    if ( av5_JS.smoothscroll_links ) {
        $( 'body' ).on( 'click', 'a[href]:not(.disable-animated-scroll):not([data-vc-tabs]):not([data-vc-accordion]):not([href^="#tab-"]):not([href="#"]):not(.av5-overlay-button):not(.av5-popup-link)', function ( e ) {
            var $this = $( this ),
                href = $this.attr( 'href' ),
                hash = ( href.split( '#' )[1] || '' ).trim(),
                hrefurl = ( href.split( '#' )[0] || '' ).trim(),
                curlocation = window.location.href.replace( window.location.hash, "" );
            if ( ( 0 < hrefurl.length && hrefurl != curlocation ) || $this.data( 'disable-animated' ) || 0 == hash.length || '_blank' === $this.attr( 'target' ) ) {
                return;
            }
            var element = $( '#' + hash ).eq( 0 );
            if ( !element.length || !element.is( ':visible' ) ) {
                return;
            }
            e.preventDefault();
            element.velocity( 'scroll', {
                duration: 1000,
                offset: -1 * sticky_top_offset( 60 ),
                easing: 'ease-in-out'
            } );
        } );

        var class_prefix = 'av5-link-content-',
            class_detect = class_prefix + 'scrolldetect',
            class_control = class_prefix + 'scrollcontrol',
            class_displayd = class_prefix + 'displayd';

        $( 'a[href]' ).each( function () {
            var $this = $( this ),
                href = $this.attr( 'href' ),
                hash = ( href.split( '#' )[1] || '' ).trim(),
                hrefurl = ( href.split( '#' )[0] || '' ).trim(),
                curlocation = window.location.href.replace( window.location.hash, "" );
            if ( ( 0 < hrefurl.length && hrefurl != curlocation ) || 0 == hash.length || '_blank' === $this.attr( 'target' ) ) {
                return;
            }
            var element = $( '#' + hash ).eq( 0 );
            if ( !element.length || !element.is( ':visible' ) ) {
                return;
            }
            $this.addClass( class_control );
            element.addClass( class_detect );
        } );
        if ( $( '.' + class_detect ).length ) {
            var update = function() {
                var $window = $( window ),
                    $window_h = $window.height(),
                    $window_st = $window.scrollTop();
                $( '.' + class_detect ).each( function () {
                    var $this = $( this ),
                        $this_ost = $this.offset().top,
                        $this_h = $this.height(),
                        id = $this.attr( 'id' );
                    $( 'a.' + class_control + '[href$="#' + id + '"]' ).toggleClass( class_displayd, $window_st < $this_ost + $this_h && $window_st + $window_h > $this_ost );
                } );
            }
            $( window ).on( 'scroll resize', update );
            update();
        }
    }
} );

jQuery( function ( $ ) {
    "use strict";
    if ( $( '#av5-load-banner-content' ).length ) {
        var enabled = true;
        switch ( av5_JS.load_banner_variation ) {
            case 'one':
                enabled = 'undefined' == typeof ( function getCookie( name ) {
                    var matches = document.cookie.match( new RegExp(
                        "(?:^|; )" + name.replace( /([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1' ) + "=([^;]*)"
                        ) );
                    return matches ? decodeURIComponent( matches[1] ) : undefined;
                } )( 'av5_load_banner_activity' );
                break;
            case 'random':
                enabled = Math.round( Math.random() * 100 ) % 2 == 1;
                break;
            case 'everytime':
                enabled = true;
                break;

        }
        var timeout = av5_JS.load_banner_timeout;
        if ( 10 > timeout ) {
            timeout = 10
        }
        if ( enabled ) {
            setTimeout( function () {
                $( '<a>' ).av5overlay( { object: '#av5-load-banner-content' } );
                $( '#av5-load-banner-content' ).trigger( 'show.overlay' );
                ( function setCookie( name, value, options ) {
                    options = options || { };

                    var expires = options.expires;

                    if ( typeof expires == "number" && expires ) {
                        var d = new Date();
                        d.setTime( d.getTime() + expires * 1000 );
                        expires = options.expires = d;
                    }
                    if ( expires && expires.toUTCString ) {
                        options.expires = expires.toUTCString();
                    }

                    value = encodeURIComponent( value );

                    var updatedCookie = name + "=" + value;

                    for ( var propName in options ) {
                        updatedCookie += "; " + propName;
                        var propValue = options[propName];
                        if ( propValue !== true ) {
                            updatedCookie += "=" + propValue;
                        }
                    }

                    document.cookie = updatedCookie;
                } )( 'av5_load_banner_activity', 1, {
                    expires: 24 * 60 * 60,
                    path: '/'
                } );
            }, timeout );
        }
    }
} );
