<?php

// Include your database configuration file
@include 'config.php';

// CSS styles for the orders table
$css = "
    <style>
        .orders-table-container {
            margin-top: 20px;
            overflow-x: auto;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }

        .orders-table th, .orders-table td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .orders-table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .orders-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .orders-table tr:hover {
            background-color: #ddd;
        }

        .no-orders {
            margin-top: 20px;
            font-style: italic;
            color: #777;
        }

        .go-back-button {
            margin-top: 20px;
            text-align: center;
        }

        .go-back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .go-back-button a:hover {
            background-color: #45a049;
        }

        .done-button, .priority-button {
            padding: 6px 10px;
            margin-left: 5px;
            cursor: pointer;
        }

        .priority-button {
            background-color: #ff0;
        }
    </style>
";

echo $css;

// Function to delete order by ID
function deleteOrder($conn, $order_id) {
    $sql = "DELETE FROM `order` WHERE id = $order_id";
    if(mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Query to fetch all orders from the database
$select_orders = mysqli_query($conn, "SELECT * FROM `order`");

// Check if there are any orders
if(mysqli_num_rows($select_orders) > 0) {
    echo '<h2>All Orders</h2>';
    echo '<div class="orders-table-container">';
    echo '<table class="orders-table">';
    echo '<tr><th>Name</th><th>Number</th><th>Email</th><th>Method</th><th>Flat</th><th>Street</th><th>City</th><th>State</th><th>Country</th><th>Pin Code</th><th>Action</th></tr>';
    
    // Loop through each order and display the details
    while($row = mysqli_fetch_assoc($select_orders)) {
        echo '<tr>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['number'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo '<td>'.$row['method'].'</td>';
        echo '<td>'.$row['flat'].'</td>';
        echo '<td>'.$row['street'].'</td>';
        echo '<td>'.$row['city'].'</td>';
        echo '<td>'.$row['state'].'</td>';
        echo '<td>'.$row['country'].'</td>';
        echo '<td>'.$row['pin_code'].'</td>';
        echo '<td>';
        echo '<button class="done-button" onclick="deleteOrder('.$row['id'].')">Done</button>';
        echo '<button class="priority-button" onclick="markPriority(this)">Priority</button>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
} else {
    echo '<div class="no-orders">No orders found.</div>';
}

?>

<script>
    // Function to delete order
    function deleteOrder(order_id) {
        if (confirm("Are you sure you want to delete this order?")) {
            // Send an AJAX request to delete the order
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Reload the page after deletion
                    window.location.reload();
                }
            };
            xmlhttp.open("GET", "delete_order.php?id=" + order_id, true);
            xmlhttp.send();
        }
    }

    // Function to mark priority
    function markPriority(button) {
        var row = button.parentNode.parentNode;
        if (row.style.backgroundColor === "yellow") {
            row.style.backgroundColor = ""; // Reset background color
        } else {
            row.style.backgroundColor = "yellow"; // Change background color to yellow
        }
    }
</script>

<div class="go-back-button">
    <a href="admin.php">Go Back</a>
</div>
