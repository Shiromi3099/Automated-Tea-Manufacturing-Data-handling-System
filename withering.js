// Validation function to check if value is in kilograms
function isKilograms(value) {
  // ... (Implementation for kilograms validation, not provided in the code snippet)
}

// Validation function to check if value is in Celsius
function isCelsius(value) {
  // ... (Implementation for Celsius validation, not provided in the code snippet)
}

// Function to create a new form
function createNewForm() {
  const originalForm = document.getElementById("WitheringForm");
  const newFormContainer = document.getElementById("newFormContainer");

  // Clone the original form
  const newForm = originalForm.cloneNode(true);

  // Reset the cloned form
  newForm.reset();
  newForm.classList.remove("was-validated");
  const inputs = newForm.querySelectorAll(".form-control");
  inputs.forEach((input) => {
    input.classList.remove("is-invalid");
  });

  // Append the new form to the container
  newFormContainer.appendChild(newForm);
}

// Add event listener to the form's submit event
document.getElementById("WitheringForm").addEventListener("submit", function (event) {
  event.preventDefault(); // Prevent the default form submission

  const form = event.target; // The form element
  const inputWeight = document.getElementById("inputWeight");
  const inputTeaLeafTemperature = document.getElementById("inputTeaLeafTemperature");
  const inputRainfall = document.getElementById("inputRainfall");

  // Check if all required fields are filled
  if (!form.checkValidity()) {
    event.stopPropagation(); // Prevent event propagation (to avoid default validation behavior)
    form.classList.add("was-validated"); // Apply Bootstrap validation styles
    return;
  }

  // Check if weight is in kilograms
  if (!isKilograms(inputWeight.value)) {
    inputWeight.classList.add("is-invalid");
    return;
  } else {
    inputWeight.classList.remove("is-invalid");
  }

  // Check if tea leaf temperature is in Celsius
  if (!isCelsius(inputTeaLeafTemperature.value)) {
    inputTeaLeafTemperature.classList.add("is-invalid");
    return;
  } else {
    inputTeaLeafTemperature.classList.remove("is-invalid");
  }

  // Check if rainfall is a non-negative number
  if (isNaN(inputRainfall.value) || parseFloat(inputRainfall.value) < 0) {
    inputRainfall.classList.add("is-invalid");
    return;
  } else {
    inputRainfall.classList.remove("is-invalid");
  }

  // If all fields are valid, create a new form
  createNewForm();
});
