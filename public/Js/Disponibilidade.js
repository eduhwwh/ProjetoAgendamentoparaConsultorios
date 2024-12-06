document.addEventListener("DOMContentLoaded", function () {
    const calendar = document.getElementById("calendar");
    const monthYear = document.getElementById("month-year");
    const prevMonthButton = document.getElementById("prev-month");
    const nextMonthButton = document.getElementById("next-month");
    const selectedDatesInput = document.getElementById("selectedDates");
    const selectedDates = new Set();

    let currentDate = new Date(); // Data atual

    // Função para renderizar o calendário
    function renderCalendar(date) {
        calendar.innerHTML = ""; // Limpar o calendário
        const year = date.getFullYear();
        const month = date.getMonth();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDay = new Date(year, month, 1).getDay();

        monthYear.textContent = `${date.toLocaleString("pt-BR", {
            month: "long",
        })} de ${year}`;

        // Adicionar espaços vazios antes do primeiro dia do mês
        for (let i = 0; i < firstDay; i++) {
            const emptyDiv = document.createElement("div");
            calendar.appendChild(emptyDiv);
        }

        // Adicionar dias do mês
        for (let i = 1; i <= daysInMonth; i++) {
            const day = document.createElement("div");
            day.textContent = i;
            calendar.appendChild(day);

            // Marcar como selecionado se já estiver no conjunto
            if (selectedDates.has(`${year}-${month + 1}-${i}`)) {
                day.classList.add("selected");
            }

            day.addEventListener("click", () => {
                const dateKey = `${year}-${month + 1}-${i}`;
                if (selectedDates.has(dateKey)) {
                    selectedDates.delete(dateKey);
                    day.classList.remove("selected");
                } else if (selectedDates.size < 5) {
                    selectedDates.add(dateKey);
                    day.classList.add("selected");
                } else {
                    alert("Você só pode selecionar até 5 datas.");
                }

                // Atualizar o campo hidden com as datas selecionadas
                selectedDatesInput.value = Array.from(selectedDates).join(",");
            });
        }
    }

    // Navegação entre os meses
    prevMonthButton.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    nextMonthButton.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });

    // Renderizar o calendário inicial
    renderCalendar(currentDate);
});
