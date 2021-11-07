// count down timer ================================================================================
let countDownDate = new Date('Jan 5, 2026 15:37:25').getTime();
let counter = document.getElementById('count-down');

let x = setInterval(function () {
  let now = new Date().getTime();
  let distance = countDownDate - now;

  let days = Math.floor(distance / (1000 * 60 * 60 * 24));
  let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  let seconds = Math.floor((distance % (1000 * 60)) / 1000);

  days = days < 10 ? `0${days}` : days;
  hours = hours < 10 ? `0${hours}` : hours;
  minutes = minutes < 10 ? `0${minutes}` : minutes;
  seconds = seconds < 10 ? `0${seconds}` : seconds;

  counter.innerHTML = days + ' يوم ' + hours + ' ساعة ' + minutes + ' دقيقة ' + seconds + ' ثانية ';

  if (distance < 0) {
    clearInterval(x);
    counter.innerHTML = 'لقد وصلت متاخرا';
  }
}, 1000);
