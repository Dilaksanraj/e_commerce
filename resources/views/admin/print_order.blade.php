@extends('admin_layout')
@section('admin_content')
<body>
	<div class="container" style="width: 50%;">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{asset('backEnd/img/invoice.jpg')}}" style="width:100%; max-width:300px; height: 150px;">
                            </td>
                            <?php 
                            $id = $all_order_by_print ->order_id;
                            $date = DB::table('tbl_order')
                                    ->where('order_id',$id)
                                    ->select('created_at')
                                    ->get();
                            ?>
                            <td>
                                Invoice #: {{$all_order_by_print ->order_id}}<br>
                                Date: {{$date}}<br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                N.S Brother's<br>
                                3rd Lane<br>
                                Vavuniya <br>
                                Srilanka
                            </td>
                            
                            <td>
                              <p style="text-transform:uppercase;">  {{$all_order_by_print ->user_name}}<br>
                                {{$all_order_by_print ->phone_number}}<br></p>
                               <!--  {{$all_order_by_print ->product_name}} -->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Cash on delivery
                </td>
                
                <td>
                     <?php $warranty = $all_order_by_print ->product_price * 0.15 * $all_order_by_print ->product_sale_quantity;
                     $total = $all_order_by_print ->order_total + $warranty;
                      echo $total; ?>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    {{$all_order_by_print ->product_name}} Unit price
                   
                </td>
                
                <td>
                   {{$all_order_by_print ->product_price}}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Quantity
                </td>
                
                <td>
                    {{$all_order_by_print ->product_sale_quantity}}
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    Warranty Charge
                </td>
                
                <td>
                    <?php 
                        echo $warranty;
                    ?>
                    
                </td>
            </tr>

            <tr class="item last">
                <td>
                    Shipping charge
                </td>
                
                <td>
                    <?php 
                        echo "****";
                    ?>
                    
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                    
                   Total: <?php echo $total; ?>
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Thanks for order. . . .<br>
                    <!-- Thanks for order. . . .<br>
                    Thanks for order. . . .<br>
                    Thanks for order. . . .<br> -->
                </td>
                
                <td>
                    
                </td>
            </tr>

        </table>
    </div>
</div>
</body>
@endsection