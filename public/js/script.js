$(function () {
    $('.icon-calendar').click(function(){
        if ($('.calendar-month').hasClass('d-none')){
            $('.calendar-month').removeClass('d-none');
        }else{
            $('.calendar-month').addClass('d-none');
        }
    })
})

const date = new Date();

const renderYear = function() {
    document.querySelector('.date h1').innerHTML = date.getFullYear();

    const monthsYear = document.querySelector('.month');

    let months = '';

    for (let i = 1; i <= 12; i++) {
        if ( i === date.getMonth() + 1 && date.getFullYear() == new Date().getFullYear()) {
            months += `<div class="today">${i}</div>`;
          } else {
            months += `<div>${i}</div>`;
          }
          monthsYear.innerHTML = months;
    }
}
document.querySelector(".prev").addEventListener("click", function(){
    date.setFullYear(date.getFullYear() - 1);
    renderYear();
})

document.querySelector(".next").addEventListener("click", function(){
    date.setFullYear(date.getFullYear() + 1);
    renderYear();
});

renderYear();

// calendar
// lấy ra ngày đầu và cuối tuần
const renderWeek = function() {
    date.setDate(1);

    var first = date.getDate() - date.getDay() + 1;
    var last  = first + 6;
    // CHUYỂN VỀ ĐỊNH DẠNG /
    var firstday = new Date(date.setDate(first)).toJSON().slice(0, 10);
    var lastday  = new Date(date.setDate(last)).toJSON().slice(0, 10);
    var firstday = firstday.slice(8, 10) + '/'
                    + firstday.slice(5, 7) + '/'
                    + firstday.slice(0, 4);
    var lastday  = lastday.slice(8, 10) + '/'
                    + lastday.slice(5, 7) + '/'
                    + lastday.slice(0, 4);

    document.querySelector('.weekend h4').innerHTML = `${firstday} &rarr; ${lastday}`;

    const dayMonths = document.querySelector('.days');
    var days = "";
    var week = [ 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    for (let i = first; i <= last; i++) {
        if (i === new Date().getDate() && date.getMonth() === new Date().getMonth()) {
            days += `<div class="col frame today">
                        <span class="day">${i}</span>
                        <div class="index">2</div>
                    </div>`;
        } else {
            days += `<div class="col frame">
                        <span class="day">${i}</span>
                        <div class="index">2</div>
                    </div>`;
        }
        dayMonths.innerHTML = days;
    }
}

document.querySelector(".day-prev").addEventListener("click", function(){
    date.setDate(date.getDate() - 1);
    renderWeek();
})

document.querySelector(".day-next").addEventListener("click", function(){
    date.setDate(date.getDate() + 1);
    renderWeek();
});

// renderWeek();
// date.setDate(1);
// const lastMonth = new Date(date.getFullYear(),date.getMonth() , 0).getDate(); //tháng trc
// const m = new Date(date.getFullYear(), date.getMonth() + 1 , 0 ).getDate(); //tháng hiện tại
// const nextMonth = new Date(date.getFullYear(),date.getMonth() + 2, 0).getDate(); //tháng sau
// const firstDayIndex = date.getDay();
// console.log(firstDayIndex);
