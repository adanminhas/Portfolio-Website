const monthSelect = document.getElementById("month");

function handleMonthChange(e) {
    e.target.form.submit();
}

if (monthSelect) {
    monthSelect.addEventListener("change", handleMonthChange);
}
