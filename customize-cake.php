<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Your Cake</title>
  <style>
  body {
  font-family: 'Poppins', sans-serif;
  background-color: #fff3e6;
  margin: 0;
  padding: 0;
  color: #5c4033;
  text-align: center;
}

.container {
  width: 90%;
  max-width: 750px;
  margin: 50px auto;
  background: #fff;
  padding: 30px;
  border-radius: 16px;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
}

h2 {
  color: #8B4513;
  margin-bottom: 25px;
  font-size: 24px;
}

.step {
  display: none;
}

.step.active {
  display: block;
}

.choice {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
  margin-bottom: 20px;
}

.choice div {
  background-color: #fffaf5;
  padding: 10px;
  border-radius: 12px;
  transition: 0.3s ease;
  width: 140px;
  cursor: pointer;
}

.choice img {
  width: 100%;
  height: 110px;
  object-fit: cover;
  border-radius: 10px;
  border: 3px solid transparent;
  margin-bottom: 10px;
  transition: 0.3s;
}

.choice div:hover img,
.choice div.selected img {
  border-color: #d2691e;
}

.price {
  color: #4b2e1e;
  font-size: 14px;
  font-weight: bold;
}

.button {
  background-color: #6B4F4F;
  color: white;
  padding: 12px 24px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-size: 16px;
  margin: 20px 10px 0;
  transition: background-color 0.3s;
}

.button:hover {
  background-color: #a0522d;
}

.input-group {
  background: #fef4ec;
  padding: 15px;
  border-radius: 12px;
  margin-top: 20px;
  box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.06);
  display: flex;
}

textarea {
  border: none;
  background: transparent;
  outline: none;
  flex: 1;
  font-size: 16px;
  padding: 8px;
  resize: none;
  color: #4b2e1e;
  font-family: inherit;
}

  </style>
</head>
<body>

<div class="container">
  <!-- Step 1: Choose Cake Shape -->
  <div class="step active" id="step1">
    <h2>Choose Cake Shape</h2>
    <div class="choice">
      <div onclick="selectOption('shape', this, 2000)"><img src="img/1.jpg"><p>Round Cake</p><p class="price">2000 DZD</p></div>
      <div onclick="selectOption('shape', this, 2500)"><img src="img/2.jpg"><p>Heart Cake</p><p class="price">2500 DZD</p></div>
      <div onclick="selectOption('shape', this, 2300)"><img src="img/3.jpg"><p>Square Cake</p><p class="price">2300 DZD</p></div>
      <div onclick="selectOption('shape', this, 1800)"><img src="img/7.jpg"><p>Mini Cake</p><p class="price">1800 DZD</p></div>
    </div>
    <button class="button" onclick="nextStep()">Next</button>
  </div>

  <!-- Step 2: Choose Flavor -->
  <div class="step" id="step2">
    <h2>Choose Flavor</h2>
    <div class="choice">
      <div onclick="selectOption('flavor', this, 800)"><img src="img/4.jpg"><p>Chocolate</p><p class="price">800 DZD</p></div>
      <div onclick="selectOption('flavor', this, 700)"><img src="img/5.jpg"><p>Vanilla</p><p class="price">700 DZD</p></div>
      <div onclick="selectOption('flavor', this, 900)"><img src="img/9.jpg"><p>Pistachio</p><p class="price">900 DZD</p></div>
      <div onclick="selectOption('flavor', this, 850)"><img src="img/8.jpg"><p>Red Velvet</p><p class="price">850 DZD</p></div>
    </div>
    <button class="button" onclick="prevStep()">Previous</button>
    <button class="button" onclick="nextStep()">Next</button>
  </div>

  <!-- Step 3: Choose Decoration -->
  <div class="step" id="step3">
    <h2>Choose Decoration</h2>
    <div class="choice">
      <div onclick="selectOption('decoration', this, 500)"><img src="img/13.jpg"><p>Fruit Design</p><p class="price">500 DZD</p></div>
      <div onclick="selectOption('decoration', this, 600)"><img src="img/10.jpg"><p>Retro Festive</p><p class="price">600 DZD</p></div>
      <div onclick="selectOption('decoration', this, 700)"><img src="img/11.jpg"><p>Silver</p><p class="price">700 DZD</p></div>
      <div onclick="selectOption('decoration', this, 750)"><img src="img/12.jpg"><p>Chocolate Design</p><p class="price">750 DZD</p></div>
    </div>
    <button class="button" onclick="prevStep()">Previous</button>
    <button class="button" onclick="nextStep()">Next</button>
  </div>

  <!-- Step 4: Write Cake Message -->
  <div class="step" id="step4">
    <h2>Write Your Cake Message</h2>
    <div class="input-group"><textarea id="cakeMessage" rows="3" placeholder="Write your message..."></textarea></div>
   
    <button class="button" onclick="prevStep()">Previous</button>
    <button class="button" onclick="submitOrder()">Submit Order</button>
  </div>
</div>

<script>
  let currentStep = 1;
  const steps = document.querySelectorAll(".step");

  function showStep(step) {
    steps.forEach((el, index) => {
      el.classList.remove("active");
      if (index + 1 === step) el.classList.add("active");
    });
  }

  function nextStep() {
    if (currentStep < steps.length) {
      currentStep++;
      showStep(currentStep);
    }
  }

  function prevStep() {
    if (currentStep > 1) {
      currentStep--;
      showStep(currentStep);
    }
  }

  let order = { shape: null, flavor: null, decoration: null, message: "", price: 0 };

  function selectOption(category, element, price) {
    document.querySelectorAll(".step.active .choice div").forEach(div => div.classList.remove("selected"));
    element.classList.add("selected");
    order[category] = element.innerText.trim();
    order.price += price;
    updatePrice();
  }


  function submitOrder() {
    order.message = document.getElementById("cakeMessage").value;
    localStorage.setItem("cakeOrder", JSON.stringify(order));
    window.location.href = 'delivery.php';
  }

  document.addEventListener("DOMContentLoaded", function () {
    showStep(currentStep);
  });
</script>

</body>
</html>







