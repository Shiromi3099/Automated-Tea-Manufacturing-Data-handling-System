function isKilograms(value) {
    // Function to check if value is in kilograms
    return value >= 0;
  }
  
  function isCelsius(value) {
    // Function to check if value is in Celsius
    return value >= -273.15; // Absolute zero in Celsius
  }
  
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
  
  document.getElementById("WitheringForm").addEventListener("submit", function (event) {
    event.preventDefault();
    const form = event.target;
    const inputWeight = document.getElementById("inputWeight");
    const inputTeaLeafTemperature = document.getElementById("inputTeaLeafTemperature");
    const inputRainfall = document.getElementById("inputRainfall");
  
    // Check if all required fields are filled
    if (!form.checkValidity()) {
      event.stopPropagation();
      form.classList.add("was-validated");
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
  