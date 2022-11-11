window.onload = function () {
  const submitButton = document.getElementById("lookup");
  submitButton.addEventListener("click", function () {
    const userInput = document.getElementById("country").value;
    const resultDiv = document.getElementById("result");
    return fetch(`world.php?country=${userInput}`)
      .then((response) => response.text())
      .then((data) => (resultDiv.innerHTML = data));
  });
};
