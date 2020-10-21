define(['jquery'], function($) {
    'use strict';
  
    return function() {
      $.validator.addMethod(
        'validate-mx-zipcode',
        function(value, element) {
          return value.match(/^[/\d]{5}?$/) !== null  
        },
        $.mage.__('Código postal no válido')
      )

      $.validator.addMethod(
        'validate-10digits-phonenumber',
        function(value, element) {
          return value.match(/^[/\d]{10}?$/) !== null  
        },
        $.mage.__('El numero telefónico debe contener 10 dígitos')
      )
    }
  });