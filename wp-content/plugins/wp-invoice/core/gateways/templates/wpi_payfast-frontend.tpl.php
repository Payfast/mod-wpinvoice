<?php 
/**
 * PayFast WP-Invoice Payments Plug in
 * 
 * Copyright (c) 2009-2013 PayFast (Pty) Ltd
 * 
 * LICENSE:
 * 
 * This payment module is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation; either version 3 of the License, or (at
 * your option) any later version.
 * 
 * This payment module is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser General Public
 * License for more details.
 * 
 * @author     Ron Darby
 * @copyright  2009-2013 PayFast (Pty) Ltd
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
*/

include_once WPI_Path.'/core/wpi_template_functions.php'; 
if($invoice['billing']['wpi_payfast']['settings']['payfast_test_mode']['value'])
{
  $url = 'sandbox.payfast';
  $merchant_id = '10000100';
  $merchant_key = '46f0cd694581a';
}
else
{
  $url = 'www.payfast';
  $merchant_id = $invoice['billing']['wpi_payfast']['settings']['payfast_merchantId']['value'];
  $merchant_key = $invoice['billing']['wpi_payfast']['settings']['payfast_merchantKey']['value'];
}
$formData = array(
    'merchant_id'=>$merchant_id,
    'merchant_key'=>$merchant_key,
    'return_url'=>get_invoice_permalink($invoice['invoice_id']),
    'cancel_url'=>get_invoice_permalink($invoice['invoice_id']),
    'notify_url'=>admin_url('admin-ajax.php?action=wpi_gateway_server_callback&type=wpi_payfast'),
    'm_payment_id'=>$invoice['invoice_id'],
    'amount'=>number_format( (float)$invoice['net'], 2, '.', '' ),
    'item_name'=>$invoice['post_title']
    );
$sigString = '';
foreach($formData as $k=>$v)
{
    if(!empty($v))  
    {
        $sigString .= $k.'='.urlencode(trim($v)).'&';
    }
}
$sigString = substr($sigString, 0,-1);
$formData['signature'] = md5($sigString);
?>
<form id="process_payment_form" class="wpi_checkout online_payment_form <?php print $this->type; ?> clearfix">
  <input type='hidden' value="<?php echo $invoice['invoice_id'];?>" name="invoice_id">
  <?php do_action('wpi_payment_fields_payfast', $invoice); ?>
</form>
<form id='payfast_payment' action="https://<?php echo $url; ?>.co.za/eng/process" method="post" class="wpi_checkout <?php print $this->type; ?> clearfix">
<?php 
foreach($formData as $k=>$v)
{
echo "    <input id='$k' type='hidden' name='$k' value='$v'>";
}
?>  
    <input id='process_payment' type="submit" value="<?php _e('Pay Now With PayFast ', WPI); ?>">          
</form>