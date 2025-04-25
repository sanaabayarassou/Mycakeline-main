let currentStep = 1;
let cake = {
    size: null,
    flavor: null,
    frosting: null,
    toppings: null,
    price: 0,
};

// Function to show the next step
function showNextStep() {
    document.getElementById(`step${currentStep}`).style.display = 'none';
    currentStep++;
    if (currentStep <= 4) {
        document.getElementById(`step${currentStep}`).style.display = 'block';
    } else {
        document.getElementById('summary').style.display = 'block';
        updateSummary();
    }
}

// Function to update the summary
function updateSummary() {
    document.getElementById('selected-size').textContent = cake.size;
    document.getElementById('selected-flavor').textContent = cake.flavor;
    document.getElementById('selected-frosting').textContent = cake.frosting;
    document.getElementById('selected-toppings').textContent = cake.toppings;
    document.getElementById('total-price').textContent = cake.price.toFixed(2);
}

// Helper functions
function getPriceBySize(size) {
    switch (size) {
        case 'small': return 20;
        case 'medium': return 30;
        case 'large': return 40;
        default: return 0;
    }
}

function getToppingPrice(toppings) {
    switch (toppings) {
        case 'sprinkles': return 2;
        case 'fresh-fruit': return 3;
        case 'chocolate-chips': return 2;
        default: return 0;
    }
}

// Function to update the cake image
function updateCakeImage() {
    const cakeImage = document.getElementById('cake-image');
    let imageUrl = '';

    // Base image based on size
    if (cake.size) {
        imageUrl += `${cake.size}-`;
    } else {
        imageUrl += 'default-';
    }

    // Add flavor
    if (cake.flavor) {
        imageUrl += `${cake.flavor}-`;
    } else {
        imageUrl += 'default-';
    }

    // Add frosting
    if (cake.frosting) {
        imageUrl += `${cake.frosting}-`;
    } else {
        imageUrl += 'default-';
    }

    // Add toppings
    if (cake.toppings) {
        imageUrl += `${cake.toppings}`;
    } else {
        imageUrl += 'default';
    }

    // Set the image source
    cakeImage.src = `images/${imageUrl}.png`;
}

// Event listeners for each step
document.querySelectorAll('#step1 button').forEach(button => {
    button.addEventListener('click', () => {
        cake.size = button.getAttribute('data-size');
        cake.price = getPriceBySize(cake.size);
        updateCakeImage(); // Update the cake image
        showNextStep();
    });
});

document.querySelectorAll('#step2 button').forEach(button => {
    button.addEventListener('click', () => {
        cake.flavor = button.getAttribute('data-flavor');
        updateCakeImage(); // Update the cake image
        showNextStep();
    });
});

document.querySelectorAll('#step3 button').forEach(button => {
    button.addEventListener('click', () => {
        cake.frosting = button.getAttribute('data-frosting');
        updateCakeImage(); // Update the cake image
        showNextStep();
    });
});

document.querySelectorAll('#step4 button').forEach(button => {
    button.addEventListener('click', () => {
        cake.toppings = button.getAttribute('data-toppings');
        cake.price += getToppingPrice(cake.toppings);
        updateCakeImage(); // Update the cake image
        showNextStep();
    });
});

// Order Now button
document.getElementById('order-now').addEventListener('click', () => {
    alert('Thank you for your order!');
});

// Initialize the cake image
updateCakeImage();