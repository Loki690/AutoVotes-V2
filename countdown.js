// Set the target date and time
const targetDate = new Date("2023-03-17T00:00:00").getTime();

// Update the countdown every second
const countdown = setInterval(function() {

  // Get the current date and time
  const currentDate = new Date().getTime();

  // Calculate the remaining time in milliseconds
  const remainingTime = targetDate - currentDate;

  // Calculate the remaining time in days, hours, minutes, and seconds
  const days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
  const hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

  // Display the countdown timer
  const countdownElement = document.getElementById("countdown");
  countdownElement.innerHTML = `${days} days ${hours} hours ${minutes} minutes ${seconds} seconds remaining`;

  // If the countdown is over, stop the timer and display a message
  if (remainingTime < 0) {
    clearInterval(countdown);
    countdownElement.innerHTML = "Countdown is over!";
  }
}, 1000);
