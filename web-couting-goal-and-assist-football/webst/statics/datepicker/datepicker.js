const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

const currentDate = new Date();
let currentMonth = currentDate.getMonth();
let currentYear = currentDate.getFullYear();

const calendar = document.getElementById('calendar');
const input = document.getElementById('datepickerInput');

function renderCalendar(month, year) {
    calendar.innerHTML = '';

    const firstDay = new Date(year, month).getDay();
    const daysInMonth = 32 - new Date(year, month, 32).getDate();

    const monthYearHeader = document.createElement('div');
    monthYearHeader.textContent = months[month] + ' ' + year;
    calendar.appendChild(monthYearHeader);

    for (let i = 0; i < firstDay; i++) {
        const emptyDay = document.createElement('div');
        emptyDay.classList.add('empty');
        calendar.appendChild(emptyDay);
    }

    for (let day = 1; day <= daysInMonth; day++) {
        const dateElement = document.createElement('div');
        dateElement.textContent = day;
        dateElement.classList.add('date');
        dateElement.addEventListener('click', function() {
            input.value = year + '-' + (month + 1).toString().padStart(2, '0') + '-' + day.toString().padStart(2, '0');
            calendar.classList.remove('active');
        });
        calendar.appendChild(dateElement);
    }
}

function updateCalendar() {
    renderCalendar(currentMonth, currentYear);
}

input.addEventListener('click', function() {
    calendar.classList.toggle('active');
    updateCalendar();
});

document.addEventListener('click', function(event) {
    if (!calendar.contains(event.target) && event.target !== input) {
        calendar.classList.remove('active');
    }
});

// Thêm event listeners để chọn năm và tháng
input.addEventListener('change', function() {
    const selectedDate = new Date(input.value);
    currentMonth = selectedDate.getMonth();
    currentYear = selectedDate.getFullYear();
    updateCalendar();
});