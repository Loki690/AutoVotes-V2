function countdown() {


  var now = new Date();
  var eventDate = new Date("<?php echo date('M d, Y H:i:s', strtotime('March 30, 2030 00:00:00')); ?>");

  var currentTime = now.getTime();
  var eventTime = eventDate.getTime();

  var remainingTime = eventTime - currentTime;

  var seconds = Math.floor(remainingTime / 1000);
  var minutes = Math.floor(seconds / 60);
  var hours = Math.floor(minutes / 60);
  var days = Math.floor(hours / 24);

  hours %= 24;
  minutes %= 60;
  seconds %= 60;

  document.getElementById("days").innerHTML = days;
  document.getElementById("hours").innerHTML = hours;
  document.getElementById("minutes").innerHTML = minutes;
  document.getElementById("seconds").innerHTML = seconds;

  setTimeout(countdown, 1000);


}