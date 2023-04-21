<!-- 21/04/93 Video 73-->

<h3 class="text-center text-success">Todas las ordenes</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

        <?php
        $get_orders = "Select * from user_orders";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);
        echo "<tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        </tr>
        </thead>
        <tbody class='bg-secondary text-light'>";

if($row_count==0){
    echo "<h2 class='bg-danger text-center mt-5'>No ordenes aún</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $user_id=$row_data['user_id'];
        $amount_due=$row_data['amount_due'];
        $invoice_number=$row_data['invoice_number'];
        $total_products=$row_data['total_products'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$amount_due</td>
        <td>$invoice_number</td>
        <td>$total_products</td>
        <td>$order_date</td>
        <td>$order_status</td>
        <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";
    }
}

        ?>


        
        </tbody>
</table>