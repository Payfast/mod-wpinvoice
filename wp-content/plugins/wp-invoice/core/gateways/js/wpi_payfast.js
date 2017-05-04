/* Our Rules for this type of form */
/*Copyright (c) 2008 PayFast (Pty) Ltd
You (being anyone who is not PayFast (Pty) Ltd) may download and use this plugin / code in your own website in conjunction with a registered and active PayFast account. If your PayFast account is terminated for any reason, you may not use this plugin / code or part thereof.
    Except as expressly indicated in this licence, you may not use, copy, modify or distribute this plugin / code or part thereof in any way.*/
var wpi_payfast_rules = { 
  "name_first": {
    required: true
  },
  "name_last": {
    required: true
  }
};

/* Our Messages for this type of form */
var wpi_payfast_messages = { 
  "name_first": {
    required: "First name is required."
  },
  "name_last": {
    required: "Last name is required."
  }
};

/* This function adds to form validation, and returns true or false */
var wpi_payfast_validate_form = function(){
  /* Just return, no extra validation needed */
  return true;
};


jQuery(document).ready(function(){
  jQuery( "#payfast_payment" ).submit(function(e){
    e.preventDefault();
    var paymentForm = jQuery(this);
    var url = wpi_ajax.url+"?action=wpi_gateway_process_payment&type=wpi_payfast";
    var userInfo = jQuery('#process_payment_form').serialize();
    jQuery.ajax({
            url: url,
            type: 'post',
            data: userInfo,
            success: function(msg){
              if ( msg == 1 && wpi_payfast_validate_form) {
                paymentForm.unbind('submit').submit();
                }
              }
            })
  });
})