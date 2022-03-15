/* Our Rules for this type of form */

let wpi_payfast_rules = {
  "name_first": {
    required: true
  },
  "name_last": {
    required: true
  }
};

/* Our Messages for this type of form */
let wpi_payfast_messages = {
  "name_first": {
    required: "First name is required."
  },
  "name_last": {
    required: "Last name is required."
  }
};

/* This function adds to form validation, and returns true or false */
let wpi_payfast_validate_form = function(){
  /* Just return, no extra validation needed */
  return true;
};


/* This function handles the submit event */
let wpi_payfast_submit = () => {

  jQuery( "#cc_pay_button" ).attr("disabled", "disabled");
  jQuery( ".loader-img" ).show();
  let success = false;
  let url = wpi_ajax.url+"?action="+jQuery("#wpi_action").val();
  jQuery.ajaxSetup({
    async: false
  });
  jQuery.post(
      url,
      jQuery("#process_payment_form").serialize(),
      (msg) => {
        jQuery.ajaxSetup({
          async: true
        });
        if ( msg.success === 1 ) {
          success = true;
        } else if ( msg.error === 1 ) {
          let message = '';
          jQuery.each( msg.data.messages, (k, v) => {
            message += v +'\n\n';
          });
          location.reload();
        }
      }, 'json');
  return success;

};

function wpi_payfast_init_form() {
  jQuery("#online_payment_form_wrapper").trigger('formLoaded');
}
