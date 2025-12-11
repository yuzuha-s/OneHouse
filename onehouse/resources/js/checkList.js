function init() {
    setupInitialState();
    setupEventListeners();
}

/*イベント登録---------------------------------------------------- */

// ページリロード時に「checked状態」を反映
function setupInitialState() {
    const rows = document.querySelectorAll("tbody tr");
    const tbody = document.querySelector("tbody");

    rows.forEach((tr) => {
        const checkbox = tr.querySelector("input[name='checked']");
        if (checkbox && checkbox.checked) {
            checkButton(tr, checkbox.checked);
        }
    });

    tbody.addEventListener("click", (e) => {
        if (e.target.matches("input[name='checked']")) {
            const tr = e.target.closest("tr");
            checkButton(tr, e.target.checked);
        }
    });
}

// チェックボックスの表示・非表示を切り替え
function checkButton(tr, isChecked) {
    const editBtn = tr.querySelector(".edit-list");
    const deleteBtn = tr.querySelector(".delete-list");

    if (isChecked) {
        tr.classList.add("checked");

        if (editBtn) editBtn.style.display = "none";
        if (deleteBtn) deleteBtn.style.display = "none";
    } else {
        tr.classList.remove("checked");
        if (editBtn) editBtn.style.display = "";
        if (deleteBtn) deleteBtn.style.display = "";
    }
}

// クリックイベントを登録
function setupEventListeners() {
    const tbody = document.querySelector("tbody");
    const addBtn = document.querySelector(".add_button");
    const toggles = document.querySelectorAll(".toggle");

    const handleAddRow = () => {
        const tr = document.createElement("tr");
        tr.innerHTML = `<td></td>
                        <td><input type="text" placeholder="ここに入力" class="checklist_input" name="list" value=""></td>
                        <td></td>
                        <td><button type="button" class="register-list">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#ffff"><path d="M380.67-331.33 158.33-553.67l47.67-47L380.67-426l374-374 47 47.67-421 421ZM200-160v-66.67h560V-160H200Z"/></svg></button></td>

                        <td>
                            <button type="button" class="delete-list"><svg xmlns="http://www.w3.org/2000/svg"
                                        height="40px" viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                        <path
                                            d="M282.98-140q-25.71 0-44.14-18.43t-18.43-44.14v-532.05H180v-50.25h174.05v-30.51h251.9v30.51H780v50.25h-40.41v532.05q0 25.79-18.39 44.18T677.02-140H282.98Zm406.35-594.62H270.67v532.05q0 5.39 3.59 8.85t8.72 3.46h394.04q4.62 0 8.47-3.84 3.84-3.85 3.84-8.47v-532.05ZM379.54-273.23h50.25v-379.08h-50.25v379.08Zm150.67 0h50.25v-379.08h-50.25v379.08ZM270.67-734.62v544.36V-734.62Z" />
                                    </svg></button>
                        </td>`;
        tbody.appendChild(tr);
    };

    const handleRegister = (e) => {
        if (e.target.closest(".register-list")) {
            const tr = e.target.closest("tr");
            const input = tr.querySelector(".checklist_input");
            const list = input.value.trim();
            const registerBtn = tr.querySelector(".register-list");
            const editBtn = tr.querySelectorAll("td");
            if (!list) {
                input.classList.add("input-error");
                showMessage("error", tr);
                return;
            } else if (tr.dataset.registered === "true") {
                registerBtn.classList.remove("register-list");
                registerBtn.classList.add("edit-list");
                registerBtn.innerHTML = ` <svg xmlns="http://www.w3.org/2000/svg" height="40px"
                                    viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                    <path
                                        d="M284-286h68l250-249.33-68-69.34-250 250V-286Zm339.33-270.67 40-40.66q6.67-6.67 7-15 .34-8.34-7-15.67l-38-37.33q-7.33-7.34-15.33-7-8 .33-14.67 7l-40 39.33 68 69.33ZM186.67-120q-27.5 0-47.09-19.58Q120-159.17 120-186.67v-586.66q0-27.5 19.58-47.09Q159.17-840 186.67-840h192.66q7.67-35.33 35.84-57.67Q443.33-920 480-920t64.83 22.33Q573-875.33 580.67-840h192.66q27.5 0 47.09 19.58Q840-800.83 840-773.33v586.66q0 27.5-19.58 47.09Q800.83-120 773.33-120H186.67Zm0-66.67h586.66v-586.66H186.67v586.66Zm293.33-608q13.67 0 23.5-9.83t9.83-23.5q0-13.67-9.83-23.5t-23.5-9.83q-13.67 0-23.5 9.83t-9.83 23.5q0 13.67 9.83 23.5t23.5 9.83Zm-293.33 608v-586.66 586.66Z" />
                                </svg>`;

                input.disabled = false;
            } else {
                registerBtn.classList.remove("register-list");
                registerBtn.classList.add("edit-list");
                registerBtn.innerHTML = ` <svg xmlns="http://www.w3.org/2000/svg" height="40px"
                                    viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                    <path
                                        d="M284-286h68l250-249.33-68-69.34-250 250V-286Zm339.33-270.67 40-40.66q6.67-6.67 7-15 .34-8.34-7-15.67l-38-37.33q-7.33-7.34-15.33-7-8 .33-14.67 7l-40 39.33 68 69.33ZM186.67-120q-27.5 0-47.09-19.58Q120-159.17 120-186.67v-586.66q0-27.5 19.58-47.09Q159.17-840 186.67-840h192.66q7.67-35.33 35.84-57.67Q443.33-920 480-920t64.83 22.33Q573-875.33 580.67-840h192.66q27.5 0 47.09 19.58Q840-800.83 840-773.33v586.66q0 27.5-19.58 47.09Q800.83-120 773.33-120H186.67Zm0-66.67h586.66v-586.66H186.67v586.66Zm293.33-608q13.67 0 23.5-9.83t9.83-23.5q0-13.67-9.83-23.5t-23.5-9.83q-13.67 0-23.5 9.83t-9.83 23.5q0 13.67 9.83 23.5t23.5 9.83Zm-293.33 608v-586.66 586.66Z" />
                                </svg>`;
                editBtn[0].innerHTML = `<label class="switch">
                                        <input type="checkbox" name="checked" value="false">
                                        <span class="slider"></span>
                                    </label>`;
                tr.dataset.registered = "true";

                input.classList.remove("input-error");
                showMessage("success", tr);
            }
        }
    };
    const handleEdit = (e) => {
        if (e.target.closest(".edit-list")) {
            const tr = e.target.closest("tr");
            const editBtn = tr.querySelector(".edit-list");
            const input = tr.querySelector(".checklist_input");

            editBtn.classList.remove("edit-list");
            editBtn.classList.add("update-list");
            editBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#ffff"><path d="M380.67-331.33 158.33-553.67l47.67-47L380.67-426l374-374 47 47.67-421 421ZM200-160v-66.67h560V-160H200Z"/></svg>`;
            input.disabled = false;

            const list = input.value.trim();
            if (!list) {
                input.classList.add("input-error");
                showMessage("error", tr);
                return;
            }
            input.classList.remove("input-error");
        }
    };

    const handleDelete = (e) => {
        if (e.target.closest(".delete-list")) {
            const tr = e.target.closest("tr");

            if (confirm("本当に削除しますか？")) {
                tr.remove();
                showMessage("delete", tr);
            }
        }
    };

    addBtn.addEventListener("click", (e) => {
        handleAddRow(e);
    });

    // 非同期処理でDBへ登録・更新・削除
    tbody.addEventListener("click", async (e) => {
        if (e.target.closest(".register-list")) {
            const tr = e.target.closest("tr");
            const input = tr.querySelector(".checklist_input");
            const listInput = input.value;
            const profileId = document.getElementById("profile_id").value;

            const data = {
                profile_id: profileId,
                number: 6,
                checked: false,
                list: listInput,
            };

            handleRegister(e);
            try {
                const response = await fetch("/api/checklist", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },

                    body: JSON.stringify(data),
                });

                const result = await response.json();
                const id =
                    result.id ||
                    (result.checklist && result.checklist.id) ||
                    result.checklist_id ||
                    (result.data && result.data.id);

                if (id) {
                    tr.dataset.id = String(id);
                    console.log("assigned data-id:", tr.dataset.id);
                } else {
                    console.warn(
                        "POST response に id が含まれていません。response:",
                        result
                    );
                }
                console.log(result);
            } catch (error) {
                console.log("送信エラー:handleRegister", error);
            }
        } else if (e.target.closest(".edit-list")) {
            handleEdit(e);
        } else if (e.target.closest(".update-list")) {
            const tr = e.target.closest("tr");
            const id = tr.dataset.id;
            const input = tr.querySelector(".checklist_input");
            const listInput = input.value;

            const data = {
                list: listInput,
            };

            try {
                const response = await fetch(`/api/checklist/${id}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(data),
                });
                const result = await response.json();

                console.log(result);

                if (result.success || response.ok) {
                    const updateBtn = tr.querySelector(".update-list");
                    updateBtn.classList.remove("update-list");
                    updateBtn.classList.add("edit-list");
                    updateBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" height="40px"
                                    viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                    <path
                                        d="M284-286h68l250-249.33-68-69.34-250 250V-286Zm339.33-270.67 40-40.66q6.67-6.67 7-15 .34-8.34-7-15.67l-38-37.33q-7.33-7.34-15.33-7-8 .33-14.67 7l-40 39.33 68 69.33ZM186.67-120q-27.5 0-47.09-19.58Q120-159.17 120-186.67v-586.66q0-27.5 19.58-47.09Q159.17-840 186.67-840h192.66q7.67-35.33 35.84-57.67Q443.33-920 480-920t64.83 22.33Q573-875.33 580.67-840h192.66q27.5 0 47.09 19.58Q840-800.83 840-773.33v586.66q0 27.5-19.58 47.09Q800.83-120 773.33-120H186.67Zm0-66.67h586.66v-586.66H186.67v586.66Zm293.33-608q13.67 0 23.5-9.83t9.83-23.5q0-13.67-9.83-23.5t-23.5-9.83q-13.67 0-23.5 9.83t-9.83 23.5q0 13.67 9.83 23.5t23.5 9.83Zm-293.33 608v-586.66 586.66Z" />
                                </svg>`;
                    showMessage("update", tr);
                    input.disabled = true;
                }
            } catch (error) {
                console.log("送信エラー:handleEdit", error);
            }
        } else if (e.target.closest(".delete-list")) {
            const tr = e.target.closest("tr");
            const id = tr.dataset.id;
            const data = {};

            handleDelete(e);

            try {
                const response = await fetch(`/api/checklist/${id}`, {
                    method: "DELETE",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(data),
                });
                const result = await response.json();
                console.log(result);
            } catch (error) {
                console.log("送信エラー:handleDelete", error);
            }
        } else if (e.target.matches("input[name='checked']")) {
            const target = e.target;
            const tr = target.closest("tr");
            const id = tr.dataset.id;

            const checked = target.checked;
            target.value = checked ? "1" : "0";
            target.setAttribute("value", target.value);
            const checkedValue = target.checked ? 1 : 0;

            if (!id) {
                console.warn(
                    "更新対象の data-id がありません。まず登録してください。"
                );
                // UI を元に戻す
                target.checked = !checked;
                showMessage("error", tr);
                return;
            }
            try {
                const response = await fetch(`/api/checklist/${id}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                    body: JSON.stringify({ checked: checkedValue }),
                });
                const result = await response.json();
                console.log(result);

                if (result.success || response.ok) {
                    checkButton(tr, checked);
                    if (checked) {
                        showMessage("checked", tr);
                    }
                }
            } catch (error) {
                console.log("送信エラー:checked", error);
            }
        }
    });

    // トグル押下で表示・非表示
    const handleToggleCheck = (e) => {
        if (e.target.closest("#toggle-phase1")) {
            const phase1Rows = document.querySelectorAll(".phase1-row");
            phase1Rows.forEach((phase1Row) => {
                if (phase1Row.style.display === "none") {
                    phase1Row.style.display = "";
                } else {
                    phase1Row.style.display = "none";
                }
            });

            const existingToggleTr = document.querySelector(".toggleTr1");

            if (!existingToggleTr) {
                const toggleTr = document.createElement("tr");
                toggleTr.classList.add("toggleTr1");
                toggleTr.innerHTML = `<td>
                                <div style="display: flex; align-items: center; ">
                                <span class="phase-toggle">Phase1<svg
                                    xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960"
                                    width="35px" fill="#8C8C8C">
                                    <path
                                        d="M710.97-192.56h32v-104.88h104.88v-32H742.97v-104.87h-32v104.87H606.1v32h104.87v104.88ZM726.15-140q-72.16 0-123-51.05t-50.84-122.59q0-72.73 50.83-123.72 50.84-51 123.34-51 71.83 0 122.88 51 51.05 50.99 51.05 123.72 0 71.54-51.05 122.59T726.15-140ZM180-220v-450l300-225.77L780-670v102.95q-11.82-3.67-24.47-5.1-12.65-1.44-25.79-1.85v-70.87L480-833.08 230.26-644.96v374.7h240.23q1.87 13.08 5.86 25.83 3.99 12.74 9.32 24.43H180Zm300-331.87Z" />
                                </svg></span><svg xmlns="http://www.w3.org/2000/svg"
                                    height="40px" viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                                </svg>
                                </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>`;
                tbody.prepend(toggleTr);
            } else {
                existingToggleTr.remove();
            }
        }

        if (e.target.closest("#toggle-phase2")) {
            const phase2Rows = document.querySelectorAll(".phase2-row");
            phase2Rows.forEach((phase2Row) => {
                if (phase2Row.style.display === "none") {
                    phase2Row.style.display = "";
                } else {
                    phase2Row.style.display = "none";
                }
            });
            const existingToggleTr = document.querySelector(".toggleTr2");

            if (!existingToggleTr) {
                const toggleTr = document.createElement("tr");
                toggleTr.classList.add("toggleTr2");
                toggleTr.innerHTML = `<td>
                                <div style="display: flex; align-items: center; gap: 4px;">
                                    <span class="phase-toggle">Phase2</span><svg xmlns="http://www.w3.org/2000/svg"
                                    height="40px" viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                                </svg>
                                </div></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>`;
                tbody.prepend(toggleTr);
            } else {
                existingToggleTr.remove();
            }
        }

        if (e.target.closest("#toggle-phase3")) {
            const phase3Rows = document.querySelectorAll(".phase3-row");
            phase3Rows.forEach((phase3Row) => {
                if (phase3Row.style.display === "none") {
                    phase3Row.style.display = "";
                } else {
                    phase3Row.style.display = "none";
                }
            });
            const existingToggleTr = document.querySelector(".toggleTr3");

            if (!existingToggleTr) {
                const toggleTr = document.createElement("tr");
                toggleTr.classList.add("toggleTr3");
                toggleTr.innerHTML = `<td>
                                <div style="display: flex; align-items: center; gap: 4px;">
                                <span class="phase-toggle">Phase3</span><svg xmlns="http://www.w3.org/2000/svg"
                                    height="40px" viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                                </svg>
                                </div></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>`;
                tbody.prepend(toggleTr);
            } else {
                existingToggleTr.remove();
            }
        }

        if (e.target.closest("#toggle-phase4")) {
            const phase4Rows = document.querySelectorAll(".phase4-row");
            phase4Rows.forEach((phase4Row) => {
                if (phase4Row.style.display === "none") {
                    phase4Row.style.display = "";
                } else {
                    phase4Row.style.display = "none";
                }
            });
            const existingToggleTr = document.querySelector(".toggleTr4");

            if (!existingToggleTr) {
                const toggleTr = document.createElement("tr");
                toggleTr.classList.add("toggleTr4");
                toggleTr.innerHTML = `<td>
                                <div style="display: flex; align-items: center; gap: 4px;">
                                <span class="phase-toggle">Phase4</span><svg xmlns="http://www.w3.org/2000/svg"
                                    height="40px" viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                                </svg>
                                </div></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>`;
                tbody.prepend(toggleTr);
            } else {
                existingToggleTr.remove();
            }
        }

        if (e.target.closest("#toggle-phase5")) {
            const phase5Rows = document.querySelectorAll(".phase5-row");
            phase5Rows.forEach((phase5Row) => {
                if (phase5Row.style.display === "none") {
                    phase5Row.style.display = "";
                } else {
                    phase5Row.style.display = "none";
                }
            });
            const existingToggleTr = document.querySelector(".toggleTr5");

            if (!existingToggleTr) {
                const toggleTr = document.createElement("tr");
                toggleTr.classList.add("toggleTr5");
                toggleTr.innerHTML = `<td>
                                <div style="display: flex; align-items: center; gap: 4px;">
                                    <span class="phase-toggle">Phase5</span><svg xmlns="http://www.w3.org/2000/svg"
                                    height="40px" viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                                </svg>
                                </div></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>`;
                tbody.prepend(toggleTr);
            } else {
                existingToggleTr.remove();
            }
        }
    };
    toggles.forEach((toggle) => {
        toggle.addEventListener("click", (e) => {
            handleToggleCheck(e);
        });
    });
}

// バリデーション・メッセージ表示
function showMessage(type, tr) {
    const input = tr.querySelector(".checklist_input");
    const validate = document.querySelector(".validate-wrapper");

    if (type === "error") {
        validate.innerHTML = `<div class = "validate"> <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#576bf5"><path d="M479.99-280q15.01 0 25.18-10.15 10.16-10.16 10.16-25.17 0-15.01-10.15-25.18-10.16-10.17-25.17-10.17-15.01 0-25.18 10.16-10.16 10.15-10.16 25.17 0 15.01 10.15 25.17Q464.98-280 479.99-280Zm-31.32-155.33h66.66V-684h-66.66v248.67ZM480.18-80q-82.83 0-155.67-31.5-72.84-31.5-127.18-85.83Q143-251.67 111.5-324.56T80-480.33q0-82.88 31.5-155.78Q143-709 197.33-763q54.34-54 127.23-85.5T480.33-880q82.88 0 155.78 31.5Q709-817 763-763t85.5 127Q880-563 880-480.18q0 82.83-31.5 155.67Q817-251.67 763-197.46q-54 54.21-127 85.84Q563-80 480.18-80Zm.15-66.67q139 0 236-97.33t97-236.33q0-139-96.87-236-96.88-97-236.46-97-138.67 0-236 96.87-97.33 96.88-97.33 236.46 0 138.67 97.33 236 97.33 97.33 236.33 97.33ZM480-480Z"/></svg><p>空欄です</p></div>`;

        validate.style.display = "block";
        setTimeout(() => {
            validate.style.display = "none";
        }, 3000);
        return;
    } else if (type === "update") {
        validate.innerHTML = `<div class = "validate">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                                        fill="#576bf5">
                                        <path d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z"/>
                                    </svg>
            <p>登録を更新しました</p></div>`;
        validate.style.display = "block";
        input.disabled = true;
        setTimeout(() => {
            validate.style.display = "none";
        }, 3000);
    } else if (type === "delete") {
        validate.innerHTML = `<div class = "validate">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                fill="#576bf5">
                <path d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z"/>
            </svg>
            <p>削除しました</p></div>
        `;
        validate.style.display = "block";
        setTimeout(() => {
            validate.style.display = "none";
        }, 3000);
    } else if (type === "checked") {
        validate.innerHTML = `<div class = "validate">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                                        fill="#576bf5">
                                        <path d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z"/>
                                    </svg>
            <p>タスクが終了しました！</p></div>`;
        validate.style.display = "block";
        setTimeout(() => {
            validate.style.display = "none";
        }, 3000);
    } else if (type === "success") {
        validate.innerHTML = `<div class = "validate">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                                        fill="#576bf5">
                                        <path d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z"/>
                                    </svg>
            <p>登録が完了しました</p></div>`;
        validate.style.display = "block";
        input.disabled = true;
        setTimeout(() => {
            validate.style.display = "none";
        }, 3000);
    }
}

document.addEventListener("DOMContentLoaded", init);
