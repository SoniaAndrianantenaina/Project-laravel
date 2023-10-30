function generateCalendar(demandesCongesData) {
    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const datesConge = ["2023-11-01", "2023-11-05", "2023-11-15"];

    let currentMonthIndex = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    function displayCalendar() {
        const currentMonth = months[currentMonthIndex];
        document.getElementById(
            "currentMonth"
        ).innerHTML = `${currentMonth}<br><span style="font-size: 18px">${currentYear}</span>`;

        const firstDay = new Date(currentYear, currentMonthIndex, 1).getDay();
        const lastDay = new Date(
            currentYear,
            currentMonthIndex + 1,
            0
        ).getDate();

        let daysHTML = "";
        for (let i = 1; i <= lastDay; i++) {
            const currentDate = `${currentYear}-${(currentMonthIndex + 1)
                .toString()
                .padStart(2, "0")}-${i.toString().padStart(2, "0")}`;

            let dayClass = "";
            if (datesConge.includes(currentDate)) {
                dayClass = "conge";
            }

            if (
                i === new Date().getDate() &&
                currentMonthIndex === new Date().getMonth()
            ) {
                daysHTML += `<li><span class="active ${dayClass}">${i}</span></li>`;
            } else {
                daysHTML += `<li class="${dayClass}">${i}</li>`;
            }
        }
        document.getElementById("days").innerHTML = daysHTML;
    }

    function previousMonth() {
        currentMonthIndex = (currentMonthIndex - 1 + 12) % 12;
        if (currentMonthIndex === 11) {
            currentYear--;
        }
        displayCalendar();
    }

    function nextMonth() {
        currentMonthIndex = (currentMonthIndex + 1) % 12;
        if (currentMonthIndex === 0) {
            currentYear++;
        }
        displayCalendar();
    }

    displayCalendar();

    return {
        previousMonth,
        nextMonth,
    };
}
