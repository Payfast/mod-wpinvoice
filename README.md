PayFast WP-invoice Payment Plugin for WP-Invoice v4.3.1
------------------------------------------------------------------------------

How do I install the PayFast module for WP-Invoice v4?
To install the PayFast payment module, follow the instructions below:

1. Unzip the module to a temporary location on your computer
2. Copy the “wp-content” folder in the archive to your base “wordpress” folder
- This should NOT overwrite any existing files or folders and merely supplement them with the PayFast files
- This is however, dependent on the FTP program you use
3. Login to the WordPress Administrator console
4. Using the main menu, navigate to Settings -> Invoice -> Settings -> Payments
5. Select the default payment method drop down and click on PayFast
6. Click on the PayFast link that appears and the options will then be shown below.
7. Leave everything else as per default and click “Save All Settings”
8. The module is now and ready to be tested with the Sandbox.
Note: When creating an invoice the current PayFast configuration is set to that invoice and can not be changed. (eg. if PayFast is set to test mode when you create invoice 1, then invoice 1 will always use the sandbox, even if PayFast is later set to live mode).

How can I test that it is working correctly?
If you followed the installation instructions above, the module is in “test” mode and you can test it by creating an invoice and completing the payment cycle through the PayFast sandbox, login with the user account detailed above and make payment using the balance in their wallet.

You will not be able to directly “test” a credit card, Instant EFT or Ukash payment in the sandbox, but you don’t really need to. The inputs to and outputs from PayFast are exactly the same, no matter which payment method is used, so using the wallet of the test user will give you exactly the same results as if you had used another payment method.

I’m ready to go live! What do I do?
In order to make the module “LIVE”, follow the instructions below:

1. Login to the WordPress Administrator console
2. Using the main menu, navigate to Invoice -> Settings -> Payments
3. Click on “PayFast”, change the configuration values as below:
4. PayFast Mode = “LIVE”
5. Merchant ID = <Integration Page>
6. Merchant Key = <Integration Page>
7. Log Debugging Info = No
8. Change the other fields as per your preferences
9. Click Save

******************************************************************************

    Please see the URL below for all information concerning this module:

    https://www.payfast.co.za/integration/shopping-carts/wp_invoice

******************************************************************************
