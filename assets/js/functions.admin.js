( function ( $ ) {
    "use strict";
    $.fn.lidrequired = function ( so ) {
        var sd = {
            parent: '',
            child: '',
            selector: '',
            require: null,
            onGetRequire: function () {
                if ( s.require )
                    return s.require;
                var attr = $( this ).attr( 'data-require' ),
                    value = null;
                if ( !attr )
                    return null;
                try {
                    value = JSON.parse( attr );
                } finally {
                    return value;
                }
            }
        },
        s = $.extend( true, { }, sd, so );
        return $( this ).each( function () {
            var a = $( this ),
                require = s.onGetRequire.call( this );
            if ( !require )
                return;
            a.off( 'lrequired.check' ).on( 'lrequired.check', function () {
                var require = s.onGetRequire.call( this ),
                    result = true;
                if ( !require )
                    return;
                for ( var name in require ) {
                    var b = $( '[name=' + name + ']' ),
                        value = require[name],
                        _value = b.val(),
                        type = b.attr( 'type' );
                    if ( 'checkbox' === type ) {
                        _value = b.is( ':checked' );
                        result = result && ( ( value && _value ) || ( !value && !_value ) );
                    } else {
                        if ( 'radio' === type ) {
                            _value = $( '[name=' + name + ']:checked' ).val();
                        }
                        if ( Array.isArray( value ) ) {
                            result = result && 0 <= value.indexOf( _value );
                        } else {
                            result = result && ( value == _value );
                        }
                    }
                }
                if ( $( this ).parents( s.parent ).length ) {
                    $( this ).parents( s.parent ).eq( 0 ).toggle( result );
                } else if ( $( this ).find( s.child ).length ) {
                    $( this ).find( s.child ).eq( 0 ).toggle( result );
                } else if ( $( s.selector ).length ) {
                    $( s.selector ).toggle( result );
                } else {
                    $( this ).toggle( result );
                }
            } );
            $.each( require, function ( name, value ) {
                $( '[name=' + name + ']' ).on( 'change', function () {
                    a.trigger( 'lrequired.check' );
                } );
            } );
            return a.trigger( 'lrequired.check' );
        } );
    };


    $( function () {
        $( '[data-require]' ).lidrequired( { parent: '.rwmb-field, .form-field' } );
    } );
} )( jQuery );
