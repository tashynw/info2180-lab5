window.onload = function () {
  const searchCountryButton = document.getElementById("lookup");
  const searchCityButton = document.getElementById("lookup-cities");

  searchCountryButton.addEventListener("click", function () {
    const userInput = document.getElementById("country").value;
    const resultDiv = document.getElementById("result");
    return fetch(`world.php?country=${userInput}`)
      .then((response) => response.text())
      .then((data) => (resultDiv.innerHTML = data));
  });
  
  searchCityButton.addEventListener("click", function () {
    const userInput = document.getElementById("country").value;
    const resultDiv = document.getElementById("result");
    return fetch(`world.php?country=${userInput}&lookup=cities`)
      .then((response) => response.text())
      .then((data) => (resultDiv.innerHTML = data));
  });
};
