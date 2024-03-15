// get the submit button element
const submitBtn = document.getElementById("btn");

// add event listener to submit button
submitBtn.addEventListener("click", function() {
  // get the selected options from the dropdowns
  const location = document.getElementById("location").value;
  const priceRange = document.getElementById("price").value;
  const bedrooms = document.getElementById("bedrooms").value;

  // build the URL with the selected options as query parameters
  const url = `result.php?location=${encodeURIComponent(location)}&price=${encodeURIComponent(priceRange)}&bedrooms=${encodeURIComponent(bedrooms)}`;

  // navigate to the results page
  window.location.href = url;
});
