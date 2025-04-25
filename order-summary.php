<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            text-align: center;
        }
        .container {
            width: 50%;
            margin: auto;
            background: #EFE1D1;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
            text-align: left;
        }
        h2 {
            color: #d2691e;
            text-align: center;
        }
        .card {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 15px;
        }
        .card p {
            font-size: 16px;
            margin: 8px 0;
        }
        .highlight {
            font-weight: bold;
            color: #28a745;
        }
        .buttons {
            text-align: center;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .edit-btn {
            background: #6B4F4F;
            color: white;
        }
        .confirm-btn {
            background: #6B4F4F;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>📝 Order Summary</h2>
        <div class="card">
            <h3>🚚 Delivery Information</h3>
            <p><strong>👤 Name:</strong> <span id="name"></span></p>
            <p><strong>📞 Phone:</strong> <span id="phone"></span></p>
            <p><strong>🏡 Address:</strong> <span id="address"></span></p>
            <p><strong>🏙️ City:</strong> <span id="city"></span></p>
            <p><strong>📝 Notes:</strong> <span id="notes"></span></p>
        </div>

        <div class="card">
            <h3>🎂 Cake Order</h3>
            <p><strong>🎂 Cake Shape:</strong> <span id="cakeShape"></span></p>
            <p><strong>🍫 Flavor:</strong> <span id="flavor"></span></p>
            <p><strong>🎨 Decoration:</strong> <span id="decoration"></span></p>
            <p><strong>💌 Message:</strong> <span id="message"></span></p>
            <p><strong>💰 Total Price:</strong> <span id="price" class="highlight"></span></p>
        </div>

        <div class="buttons">
            <button class="edit-btn" onclick="editOrder()">🔄 Edit Order</button>
            <button class="confirm-btn" onclick="confirmOrder()">✅ Confirm & Proceed to Payment</button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function getLocalStorageItem(key, defaultValue = "Not provided") {
                return localStorage.getItem(key) ? localStorage.getItem(key) : defaultValue;
            }

            // استرجاع بيانات التوصيل
            document.getElementById("name").innerText = getLocalStorageItem("name");
            document.getElementById("phone").innerText = getLocalStorageItem("phone");
            document.getElementById("address").innerText = getLocalStorageItem("address");
            document.getElementById("city").innerText = getLocalStorageItem("city");
            document.getElementById("notes").innerText = getLocalStorageItem("notes", "No additional notes");

            // استرجاع بيانات الطلب من الكاستمايز
            let order = JSON.parse(localStorage.getItem("cakeOrder"));
            if (order) {
                document.getElementById("cakeShape").innerText = order.shape || "Not selected";
                document.getElementById("flavor").innerText = order.flavor || "Not selected";
                document.getElementById("decoration").innerText = order.decoration || "Not selected";
                document.getElementById("message").innerText = order.message || "No message";
                document.getElementById("price").innerText = order.price ? order.price + " DZD" : "Not calculated";
            } else {
                document.getElementById("cakeShape").innerText = "Not selected";
                document.getElementById("flavor").innerText = "Not selected";
                document.getElementById("decoration").innerText = "Not selected";
                document.getElementById("message").innerText = "No message";
                document.getElementById("price").innerText = "Not calculated";
            }
        });

        function editOrder() {
            window.location.href = "customize-cake.php";
        }

        function confirmOrder() {
            alert("✅ Order Confirmed! Redirecting to Payment...");
            window.location.href = "payment.php";
        }
    </script>

</body>
</html>


