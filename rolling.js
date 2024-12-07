document.addEventListener("DOMContentLoaded", function () {
    const witheringForm = document.getElementById("WitheringForm");
  
    witheringForm.addEventListener("submit", function (event) {
      event.preventDefault();
      event.stopPropagation();
  
      const inchargeNameInput = document.getElementById("inputInchargeName");
      const dateInput = document.getElementById("inputDate");
      const startHourInput = document.getElementById("inputStartTimeHour");
      const startMinuteInput = document.getElementById("inputStartTimeMinute");
      const startAMPMInput = document.getElementById("inputStartTimeAMPM");
      const endHourInput = document.getElementById("inputEndTimeHour");
      const endMinuteInput = document.getElementById("inputEndTimeMinute");
      const endAMPMInput = document.getElementById("inputEndTimeAMPM");
      const weightBeforeInput = document.getElementById("inputWeight");
      const employeeCountInput = document.getElementById("inputEmployeeCount");
      const machineCountInput = document.getElementById("inputMachineCount");
      const teaLeafTemperatureInput = document.getElementById("inputTeaLeafTemperature");
      const weightAfterInput = document.getElementById("inputWeight");
  
      // Resetting previous validation state
      const invalidInputs = document.querySelectorAll(".is-invalid");
      invalidInputs.forEach((input) => input.classList.remove("is-invalid"));
  
      let isValid = true;
  
      // Validation for Officer Name (required)
      if (!inchargeNameInput.value.trim()) {
        inchargeNameInput.classList.add("is-invalid");
        isValid = false;
      }
  
      // Validation for Date (required)
      if (!dateInput.value) {
        dateInput.classList.add("is-invalid");
        isValid = false;
      }
  
      // Validation for Start Time (required)
      if (!startHourInput.value || !startMinuteInput.value || !startAMPMInput.value) {
        startHourInput.classList.add("is-invalid");
        startMinuteInput.classList.add("is-invalid");
        startAMPMInput.classList.add("is-invalid");
        isValid = false;
      }
  
      // Validation for End Time (required)
      if (!endHourInput.value || !endMinuteInput.value || !endAMPMInput.value) {
        endHourInput.classList.add("is-invalid");
        endMinuteInput.classList.add("is-invalid");
        endAMPMInput.classList.add("is-invalid");
        isValid = false;
      }
  
      // Validation for Weight Before (required)
      if (!weightBeforeInput.value) {
        weightBeforeInput.classList.add("is-invalid");
        isValid = false;
      }
  
      // Validation for Labour Count (required)
      if (!employeeCountInput.value) {
        employeeCountInput.classList.add("is-invalid");
        isValid = false;
      }
  
      // Validation for Machine Count (required)
      if (!machineCountInput.value) {
        machineCountInput.classList.add("is-invalid");
        isValid = false;
      }
  
      // Validation for Tea Leaf Temperature (required)
      if (!teaLeafTemperatureInput.value) {
        teaLeafTemperatureInput.classList.add("is-invalid");
        isValid = false;
      }
  
      // Validation for Weight After (required)
      if (!weightAfterInput.value) {
        weightAfterInput.classList.add("is-invalid");
        isValid = false;
      }
  
      // Perform form submission if the form is valid
      if (isValid) {
        // Replace "#" with the actual form submission URL
        witheringForm.action = "#";
        witheringForm.method = "POST";
        witheringForm.submit();
      }
    });
  });
  