<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            text-align: center;
        }
        .container {
            width: 50%;
            margin: auto;
            background:#EFE1D1 ;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
        }
        h2 {
            color: #333;
        }
        label {
            display: block;
            text-align: left;
            margin-top: 10px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            margin-top: 15px;
            padding: 10px 20px;
            background: #6B4F4F;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background: #EFE1D1;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>📦 Enter Delivery Information</h2>
        <form id="deliveryForm">
            <label for="name">👤 Full Name:</label>
            <input type="text" id="name" placeholder="Enter your full name" required>

            <label for="phone">📞 Phone Number:</label>
            <input type="tel" id="phone" placeholder="Enter your phone number" required>

            <label for="address">🏡 Address:</label>
            <input type="text" id="address" placeholder="Enter your full address" required>

            <label for="city">🏙️ City:</label>
            <select id="city" required>
                <option value="">Select your city</option>
                <option value="Algiers">Algiers</option>
                <option value="Oran">Oran</option>
                <option value="Constantine">Constantine</option>
                <option value="Batna">Batna</option>
                <option value="Annaba">Annaba</option>
            </select>

            <label for="notes">📝 Additional Notes (Optional):</label>
            <textarea id="notes" placeholder="Write any additional notes"></textarea>

            <button type="submit">✅ Proceed to Payment</button>
        </form>
    </div>

    <script>
        document.getElementById("deliveryForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission

            let name = document.getElementById("name").value;
            let phone = document.getElementById("phone").value;
            let address = document.getElementById("address").value;
            let city = document.getElementById("city").value;
            let notes = document.getElementById("notes").value;

            if (name === "" || phone === "" || address === "" || city === "") {
                alert("❌ Please fill in all required fields!");
                return;
            }

           
            localStorage.setItem("name", name);
            localStorage.setItem("phone", phone);
            localStorage.setItem("address", address);
            localStorage.setItem("city", city);
            localStorage.setItem("notes", notes);

            
            window.location.href = "order-summary.php"; 
        });
    </script>

</body>
</html>


