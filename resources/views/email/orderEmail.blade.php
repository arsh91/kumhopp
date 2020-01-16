<!doctype html>
<html lang="en">
	<head>
		<title>Kumhopp : Order COnfirmed</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<table width="100%" cellspacing="0" cellpadding="0" border="0">
		    <tbody>		        
		        <tr>
		            <td width="100%" valign="top" bgcolor="#ffffff">
		                <div align="center">
		                <table style="border:1px solid #bab4ab;min-width:600px" width="600" cellspacing="0" cellpadding="0" border="0" align="center">
		                    <tbody>
		                        <tr>
		                            <td>      
		                                <table cellspacing="0" cellpadding="0" border="0">
		                                    <tbody>
		                                        <tr>
		                                            <td><a href="{{ url('/') }}"><img src="{{ url('img/email-image.png') }}" alt="" width="600px"></a></td>
		                                        </tr>
		                                    </tbody>
		                                </table>
		                            </td>
		                        </tr>
		                        <tr>
		                            <td style="padding-top:0px;padding-bottom:30px;padding-right:37px;padding-left:37px">
		                                <table cellspacing="0" cellpadding="0" border="0" >
		                                    <tbody>
		                                        <tr>
		                                            <td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#293136;font-weight:bold;line-height:20px;padding-bottom:20px" valign="top" align="left">Hi, <i>{{ $dealerName }}</i></td>
		                                        </tr>
		                                        <tr>
		                                            <td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#293136;line-height:24px;padding-bottom:24px" valign="top" align="left">Your ORDER for the voucher has been recieved successfully !! </td>
		                                        </tr>	                                        
		                                    </tbody>
		                                </table>
		                            </td>
		                        </tr>
		                        <tr>
		                            <td>
		                                <table>
		                                    <tr>
		                                        <td style="vertical-align: top; width:50%; padding:10px">
		                                            <table style="width:100%; padding-bottom:20px;">
		                                                <tr><td><p style="font-weight:500; margin:0; padding:10px; border-bottom:1px solid #ccc; font-size:18px;">Order Summery</p></td></tr>
		                                            </table>    

		                                            <table style="width:100%; ">    	
		                                            @foreach ($cart['items'] as $key=>$voucherItem)                 
		                                                <tr>                                        
		                                                    <td><img width="80px" height="auto;" src="{{ url('/uploads') }}/{{$voucherItem['voucher_image']}}" alt="" style="padding-right:15px;" /></td>
		                                                    <td>
		                                                        <p style="margin:0; padding:2px 0;"><strong>{{ $voucherItem['voucher_name'] }}</strong></p>                
		                                                        <p style="margin:0; padding:2px 0;">Quantity : {{ $voucherItem['voucherQuantity'] }}</p>
		                                                        <p style="margin:0; padding:2px 0;">Price : <strong> £{{ $voucherItem['voucherQuantity'] * $voucherItem['points'] }}</strong></p>
		                                                    </td>
		                                                </tr>
		                                                @endforeach
		                                            </table>
		                                        </td> <!-- order summery cell -->  
		                                        <td style="vertical-align: top; width:50%; padding:10px;">
		                                           <table style="width:100%; padding-bottom:20px;">
		                                                <tr><td><p style="font-weight:500; margin:0; padding:10px; border-bottom:1px solid #ccc; font-size:18px;">Order Details</p></td></tr>
		                                            </table>     

		                                            <table style="width:100%; padding:10px; background:#f8f8f8;">   

		                                                <tr><td><h2 style="font-size:16px; color:#293136; margin:0;">Payment Information</h2></td></tr>

		                                                <tr><td style="padding:5px 0;">Product Total</td><td style="padding:5px 0; width:80px; text-align:right">£{{$price}}</td></tr>

		                                                <tr><td><h2 style="font-size:16px; color:#293136; margin:0; padding-top:10px;">Shipping To</h2></td></tr>
		                                                <tr><td><p style="font-size:15px; color:#888; margin:0; padding-top:10px;">

		                                                {{ $shippingAddress['shipping_street'] }}, {{ $shippingAddress['shipping_city'] }}, {{ $shippingAddress['shipping_state'] }}, {{ $shippingAddress['shipping_country'] }}

		                                                </p></td></tr>
		                                            </table>
		                                        </td>     
		                                    </tr>
		                                </table>
		                            </td><!-- sample devide -->  
		                        </tr>
		                         <tr><td style="padding-bottom:20px;"></td>  </tr>
		                        <tr>
		                            <td valign="top">		                                
		                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
		                                    <tbody>
		                                        <tr>
		                                            <td>
		                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
		                                                <tbody>
		                                                    <tr>
		                                                        <td style="text-align:center;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:18px;font-weight:normal;color:#9b9b9b;padding:20px 30px" valign="top" align="left">
		                                                        ©2019 Kumhopp. All Right Reserved
		                                                        <br>
		                                                        </td>
		                                                    </tr>
		                                                </tbody>
		                                            </table>
		                                            </td>
		                                        </tr>
		                                    </tbody>
		                                </table>
		                            </td>
		                        </tr>
		                    </tbody>
		                </table>
		                </div>
		            </td>
		        </tr>
		    </tbody>
		</table>
	</body>
</html>