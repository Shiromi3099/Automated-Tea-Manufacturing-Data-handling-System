document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("Aerationform");
  
    function showError(input, message) {
      const formGroup = input.parentElement;
      const errorMessage = formGroup.querySelector(".invalid-feedback");
      errorMessage.textContent = message;
      formGroup.classList.add("has-error");
    }
  
    function removeError(input) {
      const formGroup = input.parentElement;
      formGroup.classList.remove("has-error");
    }
  
    function validateInput(input, regex, errorMessage) {
      if (!regex.test(input.value)) {
        showError(input, errorMessage);
        return false;
      }
      removeError(input);
      return true;
    }
  
    function validateForm() {
      const inchargeNameInput = form.querySelector("#inputInchargeName");
      const dateInput = form.querySelector("#inputDate");
      const startTimeHourInput = form.querySelector("#inputStartTimeHour");
      const startTimeMinuteInput = form.querySelector("#inputStartTimeMinute");
      const endTimeHourInput = form.querySelector("#inputEndTimeHour");
      const endTimeMinuteInput = form.querySelector("#inputEndTimeMinute");
      const weightInput = form.querySelector("#inputWeight");
      const teaLeafTemperatureInput = form.querySelector("#inputTeaLeafTemperature");
      const aerationTypeInput = form.querySelector("#inputAerationType");
      const rawMaterialsInput = form.querySelector("#inputRawMaterials");
      const measurementsInput = form.querySelector("#inputMeasurements");
      const unitInput = form.querySelector("#inputUnit");
      const employeeCountInput = form.querySelector("#inputEmployeeCount");
      const machineCountInput = form.querySelector("#inputMachineCount");
  
      const inchargeNameRegex = /^[a-zA-Z\s]+$/;
      const timeRegex = /^(0?[1-9]|1[0-2]):[0-5][0-9]$/;
      const weightRegex = /^[-+]?\d+(\.\d+)?\s*Kg$/i;
      const teaLeafTemperatureRegex = /^[-+]?\d+(\.\d+)?°C?$/;
  
      const isValidInchargeName = validateInput(
        inchargeNameInput,
        inchargeNameRegex,
        "Please enter a valid name for the officer."
      );
      const isValidDate = validateInput(dateInput, /.+/, "Please select a valid date.");
      const isValidStartTimeHour = validateInput(startTimeHourInput, timeRegex, "Please enter a valid start hour (HH:MM).");
      const isValidStartTimeMinute = validateInput(startTimeMinuteInput, timeRegex, "Please enter a valid start minute (HH:MM).");
      const isValidEndTimeHour = validateInput(endTimeHourInput, timeRegex, "Please enter a valid end hour (HH:MM).");
      const isValidEndTimeMinute = validateInput(endTimeMinuteInput, timeRegex, "Please enter a valid end minute (HH:MM).");
      const isValidWeight = validateInput(weightInput, weightRegex, "Please enter a valid weight in Kilograms (e.g., 50 Kg).");
      const isValidTeaLeafTemperature = validateInput(
        teaLeafTemperatureInput,
        teaLeafTemperatureRegex,
        "Please enter a valid temperature in Celsius (e.g., 25°C)."
      );
      const isValidAerationType = validateInput(aerationTypeInput, /.+/, "Please select a valid aeration type.");
      const isValidRawMaterials = validateInput(rawMaterialsInput, /.+/, "Please select a valid raw material.");
      const isValidMeasurements = validateInput(measurementsInput, /.+/, "Please enter a valid measurement.");
      const isValidUnit = validateInput(unitInput, /.+/, "Please select a valid unit.");
      const isValidEmployeeCount = validateInput(
        employeeCountInput,
        /^[1-9]\d*$/,
        "Please enter a valid labour count (greater than 0)."
      );
      const isValidMachineCount = validateInput(
        machineCountInput,
        /^[1-9]\d*$/,
        "Please enter a valid machine count (greater than 0)."
      );
  
      return (
        isValidInchargeName &&
        isValidDate &&
        isValidStartTimeHour &&
        isValidStartTimeMinute &&s
        isValidEndTimeHour &&
        isValidEndTimeMinute &&
        isValidWeight &&
        isValidTeaLeafTemperature &&
        isValidAerationType &&
        isValidRawMaterials &&
        isValidMeasurements &&
        isValidUnit &&
        isValidEmployeeCount &&
        isValidMachineCount
      );
    }
  
    form.addEventListener("submit", function (event) {
      event.preventDefault();
  
      if (validateForm()) {
        // Your code to handle form submission here
  
        const inputElements = form.querySelectorAll("input, select");
        inputElements.forEach((input) => (input.value = ""));
      }
    });
  });
  