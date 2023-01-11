// Timer DOM
let timer = document.querySelector('.timer');

// Set Date
let date = new Date('Jan 16, 2023 15:30:00').getTime();

// Update Timer Every Second
setInterval( () => {

    // Get Today Date
    let today = new Date().getTime();

    // Get Residual
    var residual = date - today;

    // Get Days,Hours,Minutes And Seconds
    var days    = Math.floor( residual / (1000 * 60 * 60 * 24) );
    var hours   = Math.floor( residual % (1000 * 60 * 60 * 24) / (1000 * 60 * 60) );
    var minutes = Math.floor( residual % (1000 * 60 * 60) / (1000 * 60) );
    var seconds = Math.floor( residual % (1000 * 60 ) / 1000 );

    timer.innerHTML = days + ' ايام ' + hours + ' ساعة ' + minutes + " دقيقة " + seconds + " ثانية ";

} , 1000)