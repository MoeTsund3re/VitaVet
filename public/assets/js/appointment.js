// Модальное окно записи
(function () {
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initAppointmentModal);
    } else {
        initAppointmentModal();
    }

    let selectedServiceData = null;

    function initAppointmentModal() {
        createModal();
        addStyles();
        bindEvents();
    }

    function createModal() {
        const modalHTML = `
            <div id="appointmentModal" class="appointment_modal" style="display: none;">
                <div class="appointment_modal_overlay"></div>
                <div class="appointment_modal_container">
                    <div class="appointment_modal_header">
                        <h3>Запись на приём</h3>
                        <button class="appointment_modal_close">&times;</button>
                    </div>
                    <div class="appointment_modal_body">
                        <form id="appointmentForm">
                            <!-- Информация о выбранной услуге -->
                            <div class="info_box">
                                <div class="info_label">Выбранная услуга</div>
                                <div class="info_value" id="selectedServiceName"></div>
                                <div class="info_department" id="selectedDepartment"></div>
                            </div>

                            <div class="form_group">
                                <label>Выберите питомца *</label>
                                <select id="appointment_pet_id" class="form_input" required>
                                    <option value="">-- Выберите питомца --</option>
                                </select>
                            </div>

                            <div class="form_group">
                                <label>Выберите врача *</label>
                                <select id="appointment_doctor_id" class="form_input" required disabled>
                                    <option value="">-- Выберите питомца, чтобы загрузить врачей --</option>
                                </select>
                            </div>

                            <div class="form_row">
                                <div class="form_group">
                                    <label>Дата приёма *</label>
                                    <input type="date" id="appointment_date" class="form_input" required>
                                </div>
                                <div class="form_group">
                                    <label>Время *</label>
                                    <select id="appointment_time" class="form_input" required disabled>
                                        <option value="">-- Сначала выберите врача и дату --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form_group">
                                <label>Дополнительные пожелания</label>
                                <textarea id="appointment_notes" class="form_input" rows="3" placeholder="Укажите особенности питомца, жалобы и т.д."></textarea>
                            </div>

                            <div class="form_actions">
                                <button type="button" class="btn_cancel">Отмена</button>
                                <button type="submit" class="btn_submit">Записаться</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        `;
        document.body.insertAdjacentHTML("beforeend", modalHTML);
    }

    function addStyles() {
        const styles = `
            <style>
                .appointment_modal {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    z-index: 1000;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                .appointment_modal_overlay {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0,0,0,0.7);
                }
                .appointment_modal_container {
                    position: relative;
                    background: #1e1e30;
                    border-radius: 24px;
                    width: 90%;
                    max-width: 550px;
                    max-height: 90vh;
                    overflow-y: auto;
                    z-index: 1001;
                    animation: modalSlideIn 0.3s ease;
                }
                @keyframes modalSlideIn {
                    from { transform: translateY(-50px); opacity: 0; }
                    to { transform: translateY(0); opacity: 1; }
                }
                .appointment_modal_header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 20px 24px;
                    border-bottom: 1px solid rgba(255,255,255,0.1);
                }
                .appointment_modal_header h3 {
                    font-size: 24px;
                    font-weight: 700;
                    color: #fff;
                    margin: 0;
                }
                .appointment_modal_close {
                    background: none;
                    border: none;
                    font-size: 32px;
                    cursor: pointer;
                    color: rgba(255,255,255,0.5);
                    transition: color 0.2s;
                }
                .appointment_modal_close:hover { color: #fff; }
                .appointment_modal_body {
                    padding: 24px;
                }
                .info_box {
                    background: rgba(1,75,255,0.1);
                    border-radius: 12px;
                    padding: 12px 16px;
                    margin-bottom: 24px;
                    border-left: 3px solid #014bff;
                }
                .info_label {
                    font-size: 12px;
                    color: rgba(255,255,255,0.5);
                    margin-bottom: 5px;
                }
                .info_value {
                    font-size: 16px;
                    font-weight: 600;
                    color: #014bff;
                }
                .info_department {
                    font-size: 13px;
                    color: rgba(255,255,255,0.5);
                    margin-top: 4px;
                }
                .form_group {
                    margin-bottom: 20px;
                }
                .form_group label {
                    display: block;
                    font-size: 14px;
                    font-weight: 600;
                    color: rgba(255,255,255,0.7);
                    margin-bottom: 8px;
                }
                .form_row {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 16px;
                }
                .form_input {
                    width: 100%;
                    padding: 12px 16px;
                    background: rgba(255,255,255,0.06);
                    border: 1.5px solid rgba(255,255,255,0.1);
                    border-radius: 12px;
                    font-size: 15px;
                    font-family: Nunito, sans-serif;
                    color: #fff;
                    transition: all 0.2s;
                    box-sizing: border-box;
                }
                .form_input:focus {
                    outline: none;
                    border-color: #014bff;
                    background: rgba(1,75,255,0.08);
                }
                .form_input:disabled {
                    opacity: 0.5;
                    cursor: not-allowed;
                }
                select.form_input option {
                    background: #1e1e30;
                }
                .form_actions {
                    display: flex;
                    gap: 12px;
                    justify-content: flex-end;
                    margin-top: 24px;
                }
                .btn_cancel, .btn_submit {
                    padding: 12px 28px;
                    border-radius: 100px;
                    font-size: 16px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s;
                    border: none;
                }
                .btn_cancel {
                    background: rgba(255,255,255,0.08);
                    color: rgba(255,255,255,0.7);
                }
                .btn_cancel:hover {
                    background: rgba(255,255,255,0.15);
                    color: #fff;
                }
                .btn_submit {
                    background: #014bff;
                    color: #fff;
                }
                .btn_submit:hover {
                    background: #0040e0;
                    transform: translateY(-2px);
                }
                .loading_spinner {
                    display: inline-block;
                    width: 16px;
                    height: 16px;
                    border: 2px solid #fff;
                    border-radius: 50%;
                    border-top-color: transparent;
                    animation: spin 0.6s linear infinite;
                    margin-right: 8px;
                    vertical-align: middle;
                }
                @keyframes spin {
                    to { transform: rotate(360deg); }
                }
            </style>
        `;
        document.head.insertAdjacentHTML("beforeend", styles);
    }

    function bindEvents() {
        // Закрытие модального окна
        document
            .querySelectorAll(
                ".appointment_modal_close, .btn_cancel, .appointment_modal_overlay",
            )
            .forEach((el) => {
                if (el) el.addEventListener("click", closeModal);
            });

        // Загрузка питомцев при фокусе
        const petSelect = document.getElementById("appointment_pet_id");
        if (petSelect) {
            petSelect.addEventListener("focus", loadPets);
            petSelect.addEventListener("click", loadPets);
            petSelect.addEventListener("change", loadDoctors);
        }

        // Загрузка доступного времени
        const doctorSelect = document.getElementById("appointment_doctor_id");
        if (doctorSelect) {
            doctorSelect.addEventListener("change", function () {
                const dateInput = document.getElementById("appointment_date");
                if (dateInput && dateInput.value) loadAvailableTimes();
            });
        }

        const dateInput = document.getElementById("appointment_date");
        if (dateInput) {
            dateInput.addEventListener("change", loadAvailableTimes);
        }

        // Отправка формы
        const form = document.getElementById("appointmentForm");
        if (form) form.addEventListener("submit", submitForm);
    }

    function loadPets() {
        const select = document.getElementById("appointment_pet_id");
        if (!select || select.dataset.loaded === "true") return;

        fetch("/profile/pets/json")
            .then((res) => res.json())
            .then((pets) => {
                if (!select) return;
                select.innerHTML =
                    '<option value="">-- Выберите питомца --</option>';
                if (pets && pets.length > 0) {
                    pets.forEach((pet) => {
                        select.innerHTML += `<option value="${pet.id}" data-pet-name="${pet.name}">${pet.emoji} ${pet.name} (${pet.type_ru}, ${pet.age})</option>`;
                    });
                } else {
                    select.innerHTML =
                        '<option value="">-- Нет добавленных питомцев --</option>';
                }
                select.dataset.loaded = "true";
            })
            .catch((error) =>
                console.error("Ошибка загрузки питомцев:", error),
            );
    }

    function loadDoctors() {
        const petId = document.getElementById("appointment_pet_id")?.value;
        if (!petId || !selectedServiceData) {
            const doctorSelect = document.getElementById(
                "appointment_doctor_id",
            );
            if (doctorSelect) {
                doctorSelect.innerHTML =
                    '<option value="">-- Сначала выберите питомца --</option>';
                doctorSelect.disabled = true;
            }
            return;
        }

        const doctorSelect = document.getElementById("appointment_doctor_id");
        doctorSelect.disabled = true;
        doctorSelect.innerHTML = '<option value="">Загрузка врачей...</option>';

        fetch(
            `/api/doctors/by-department?department=${encodeURIComponent(selectedServiceData.department)}`,
        )
            .then((res) => res.json())
            .then((doctors) => {
                if (doctors && doctors.length > 0) {
                    doctorSelect.innerHTML =
                        '<option value="">-- Выберите врача --</option>';
                    doctors.forEach((doctor) => {
                        doctorSelect.innerHTML += `<option value="${doctor.id}">${doctor.name} — ${doctor.specialization}</option>`;
                    });
                    doctorSelect.disabled = false;
                } else {
                    doctorSelect.innerHTML =
                        '<option value="">-- Нет врачей в этом отделении --</option>';
                }
            })
            .catch((error) => {
                console.error("Ошибка загрузки врачей:", error);
                doctorSelect.innerHTML =
                    '<option value="">Ошибка загрузки врачей</option>';
            });
    }

    function loadAvailableTimes() {
        const doctorId = document.getElementById(
            "appointment_doctor_id",
        )?.value;
        const date = document.getElementById("appointment_date")?.value;
        const timeSelect = document.getElementById("appointment_time");

        if (!doctorId || !date) {
            if (timeSelect) {
                timeSelect.disabled = true;
                timeSelect.innerHTML =
                    '<option value="">-- Сначала выберите врача и дату --</option>';
            }
            return;
        }

        timeSelect.disabled = true;
        timeSelect.innerHTML = '<option value="">Загрузка...</option>';

        fetch(
            `/appointments/available-times?doctor_id=${doctorId}&date=${date}`,
        )
            .then((res) => res.json())
            .then((data) => {
                if (data.available_times && data.available_times.length > 0) {
                    timeSelect.innerHTML =
                        '<option value="">-- Выберите время --</option>';
                    data.available_times.forEach((time) => {
                        timeSelect.innerHTML += `<option value="${time}">${time}</option>`;
                    });
                    timeSelect.disabled = false;
                } else {
                    timeSelect.innerHTML =
                        '<option value="">Нет свободных слотов</option>';
                }
            })
            .catch((error) => {
                console.error("Ошибка загрузки времени:", error);
                timeSelect.innerHTML =
                    '<option value="">Ошибка загрузки</option>';
            });
    }

    window.openAppointmentModal = function (
        serviceId,
        serviceName,
        department,
    ) {
        // Проверка авторизации
        const token = document.querySelector(
            'meta[name="csrf-token"]',
        )?.content;
        if (!token) {
            alert("Пожалуйста, авторизуйтесь для записи на приём");
            if (typeof openAuth === "function") openAuth();
            return;
        }

        // Сохраняем данные услуги
        selectedServiceData = {
            id: serviceId,
            name: serviceName,
            department: department,
        };

        // Показываем информацию об услуге
        document.getElementById("selectedServiceName").innerText = serviceName;
        document.getElementById("selectedDepartment").innerText =
            `Отделение: ${department}`;

        // Сброс формы
        const form = document.getElementById("appointmentForm");
        if (form) form.reset();

        // Сброс и настройка селектов
        const petSelect = document.getElementById("appointment_pet_id");
        if (petSelect) {
            petSelect.disabled = false;
            if (petSelect.dataset.loaded === "true") {
                // Сохраняем текущее значение, если питомец уже выбран
                const currentValue = petSelect.value;
                if (currentValue) {
                    loadDoctors();
                }
            }
        }

        const doctorSelect = document.getElementById("appointment_doctor_id");
        if (doctorSelect) {
            doctorSelect.innerHTML =
                '<option value="">-- Выберите питомца, чтобы загрузить врачей --</option>';
            doctorSelect.disabled = true;
        }

        const timeSelect = document.getElementById("appointment_time");
        if (timeSelect) {
            timeSelect.innerHTML =
                '<option value="">-- Сначала выберите врача и дату --</option>';
            timeSelect.disabled = true;
        }

        // Устанавливаем минимальную дату - завтра
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        const dateInput = document.getElementById("appointment_date");
        if (dateInput) {
            dateInput.min = tomorrow.toISOString().split("T")[0];
            dateInput.value = "";
        }

        // Показываем модальное окно
        const modal = document.getElementById("appointmentModal");
        if (modal) {
            modal.style.display = "flex";
            document.body.style.overflow = "hidden";
        }
    };

    function closeModal() {
        const modal = document.getElementById("appointmentModal");
        if (modal) modal.style.display = "none";
        document.body.style.overflow = "";
        selectedServiceData = null;
    }

    function submitForm(e) {
        e.preventDefault();

        const petId = document.getElementById("appointment_pet_id")?.value;
        const doctorId = document.getElementById(
            "appointment_doctor_id",
        )?.value;
        const date = document.getElementById("appointment_date")?.value;
        const time = document.getElementById("appointment_time")?.value;
        const notes = document.getElementById("appointment_notes")?.value;
        const token = document.querySelector(
            'meta[name="csrf-token"]',
        )?.content;

        if (!petId) {
            alert("Пожалуйста, выберите питомца");
            return;
        }
        if (!doctorId) {
            alert("Пожалуйста, выберите врача");
            return;
        }
        if (!date) {
            alert("Пожалуйста, выберите дату");
            return;
        }
        if (!time) {
            alert("Пожалуйста, выберите время");
            return;
        }
        if (!selectedServiceData) {
            alert("Ошибка: не выбрана услуга");
            return;
        }

        const submitBtn = document.querySelector(
            "#appointmentForm .btn_submit",
        );
        const originalText = submitBtn?.innerHTML || "Записаться";
        if (submitBtn) {
            submitBtn.innerHTML =
                '<span class="loading_spinner"></span> Запись...';
            submitBtn.disabled = true;
        }

        fetch("/appointments", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token,
            },
            body: JSON.stringify({
                pet_id: petId,
                doctor_id: doctorId,
                service_id: selectedServiceData.id,
                appointment_date: date,
                appointment_time: time,
                notes: notes,
            }),
        })
            .then((res) => res.json())
            .then((data) => {
                if (data.success) {
                    alert(
                        data.message ||
                            "Запись успешно создана! Ожидайте подтверждения.",
                    );
                    closeModal();
                    if (confirm("Перейти к просмотру ваших записей?")) {
                        window.location.href = "/appointments/my";
                    }
                } else {
                    alert(data.message || "Ошибка при создании записи");
                }
            })
            .catch((error) => {
                console.error("Ошибка:", error);
                alert("Произошла ошибка. Попробуйте позже.");
            })
            .finally(() => {
                if (submitBtn) {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }
            });
    }
})();
