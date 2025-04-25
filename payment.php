<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - MyCakeLine</title>
    <style>
        body {
      font-family: 'Poppins', sans-serif;
      background-color: #F5F0E6; /* Soft cream */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .payment-container {
      background-color: #EFE1D1; /* Toasted almond */
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 500px;
      text-align: center;
    }

    h1 {
      color: #6B4F4F; /* Deep mocha */
      font-family: 'Playfair Display', serif;
      font-size: 2.5rem;
      margin-bottom: 30px;
    }

    .input-group {
      margin-bottom: 20px;
      text-align: left;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #6B4F4F;
      font-weight: 500;
      font-size: 1.1rem;
    }

    input {
      width: 100%;
      padding: 12px;
      border-radius: 10px;
      border: 1px solid #B8A99A;
      font-size: 1rem;
      background-color: #F5F0E6;
      color: #6B4F4F;
      font-family: 'Poppins', sans-serif;
    }

    input:focus {
      border-color: #6B4F4F;
      outline: none;
      box-shadow: 0 0 0 3px rgba(184, 169, 154, 0.2);
    }

    .button {
      background-color: #6B4F4F;
      color: #EFE1D1;
      padding: 12px 25px;
      border: none;
      border-radius: 10px;
      font-size: 1.2rem;
      font-family: 'Poppins', sans-serif;
      cursor: pointer;
      transition: background-color 0.3s ease;
      width: 100%;
    }

    .button:hover {
      background-color: #B8A99A;
    }
    </style>
</head>
<body>
<div class="payment-container">
    <h1> Payment</h1>
    <form id="paymentForm">
      <div class="input-group">
        <label for="cardNumber">cardNumber</label>
        <input type="text" id="cardNumber" placeholder="1234 5678 9012 3456" required />
      </div>
      <div class="input-group">
        <label for="expiryDate">expiryDate</label>
        <input type="text" id="expiryDate" placeholder="MM/YY" required />
      </div>
      <div class="input-group">
        <label for="cvv">CVV</label>
        <input type="password" id="cvv" placeholder="123" required />
      </div>
      <button type="submit" class="button"> pay now </button>
    </form>
  </div>
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    const paymentForm = document.getElementById("paymentForm");

    paymentForm.addEventListener("submit", function (e) {
      e.preventDefault(); // نمنع الإرسال الافتراضي

      // حفظ البيانات في sessionStorage (اختياري)
      sessionStorage.setItem('cardNumber', document.getElementById('cardNumber').value);
      sessionStorage.setItem('expiryDate', document.getElementById('expiryDate').value);
      sessionStorage.setItem('cvv', document.getElementById('cvv').value);

      // تنبيه ثم إعادة التوجيه
      alert("تم الدفع بنجاح! سيتم تحويلك للصفحة الرئيسية.");
      window.location.href = "index.php";
    });

    // ملء البيانات تلقائياً إن وجدت (اختياري)
    if (sessionStorage.getItem('cardNumber')) {
      document.getElementById('cardNumber').value = sessionStorage.getItem('cardNumber');
      document.getElementById('expiryDate').value = sessionStorage.getItem('expiryDate');
      document.getElementById('cvv').value = sessionStorage.getItem('cvv');
    }
  });
</script>

</body>
</html>

