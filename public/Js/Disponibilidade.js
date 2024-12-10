document.addEventListener("DOMContentLoaded", function () {
    const calendar = document.getElementById("calendar");
    const monthYear = document.getElementById("month-year");
    const prevMonthButton = document.getElementById("prev-month");
    const nextMonthButton = document.getElementById("next-month");
    const selectedDatesInput = document.getElementById("selectedDates");
    const selectedDates = new Set(); // Armazena as datas selecionadas

    let currentDate = new Date();

    function renderCalendar(date) {
        calendar.innerHTML = "";
        const year = date.getFullYear();
        const month = date.getMonth();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDay = new Date(year, month, 1).getDay();

        monthYear.textContent = `${date.toLocaleString("pt-BR", {
            month: "long",
        })} de ${year}`;

        for (let i = 0; i < firstDay; i++) {
            const emptyDiv = document.createElement("div");
            calendar.appendChild(emptyDiv);
        }

        for (let i = 1; i <= daysInMonth; i++) {
            const day = document.createElement("div");
            day.textContent = i;
            calendar.appendChild(day);

            const dateKey = `${year}-${String(month + 1).padStart(2, "0")}-${String(i).padStart(2, "0")}`;

            if (selectedDates.has(dateKey)) {
                day.classList.add("selected");
            }

            day.addEventListener("click", () => {
                if (selectedDates.has(dateKey)) {
                    selectedDates.delete(dateKey);
                    day.classList.remove("selected");
                } else {
                    selectedDates.add(dateKey);
                    day.classList.add("selected");
                }

                selectedDatesInput.value = Array.from(selectedDates).join(",");
            });
        }
    }

    prevMonthButton.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    nextMonthButton.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });

    renderCalendar(currentDate);
});
