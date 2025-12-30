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
                        <td></td>
                        <td><input type="text" placeholder="タスクを追加していこう" class="checklist_input" name="list" value=""></td>
                        <td><button type="button" class="register-list">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#ffff"><path d="M380.67-331.33 158.33-553.67l47.67-47L380.67-426l374-374 47 47.67-421 421ZM200-160v-66.67h560V-160H200Z"/></svg></button></td>

                        <td>
                            <button type="button" class="delete-list"><svg xmlns="http://www.w3.org/2000/svg"
                                        height="40px" viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                        <path
                                            d="M282.98-140q-25.71 0-44.14-18.43t-18.43-44.14v-532.05H180v-50.25h174.05v-30.51h251.9v30.51H780v50.25h-40.41v532.05q0 25.79-18.39 44.18T677.02-140H282.98Zm406.35-594.62H270.67v532.05q0 5.39 3.59 8.85t8.72 3.46h394.04q4.62 0 8.47-3.84 3.84-3.85 3.84-8.47v-532.05ZM379.54-273.23h50.25v-379.08h-50.25v379.08Zm150.67 0h50.25v-379.08h-50.25v379.08ZM270.67-734.62v544.36V-734.62Z" />
                                    </svg></button>
                        </td>`;
        tbody.prepend(tr);
        tr.scrollIntoView({
            behavior: "smooth",
            block: "start",
        });

        const input = tr.querySelector(".checklist_input");
        input.focus();
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
            input.focus();
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

            const profileId = document.querySelector("#app").dataset.profileId;

            // CSRF Cookie 取得
            await fetch("/sanctum/csrf-cookie", {
                method: "GET",
                credentials: "include",
            });

            // type=customのみPOST
            handleRegister(e);
            try {
                const response = await fetch("/checklist", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        "X-CSRF-TOKEN": document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content,
                    },

                    body: JSON.stringify({
                        profile_id: parseInt(profileId, 10),
                        list: listInput,
                    }),
                    credentials: "include",
                });
                const result = await response.json();

                if (!response.ok) {
                    if (response.status === 401) {
                        console.error(
                            "認証エラー: ログインしてください",
                            result
                        );
                    } else {
                        console.error(
                            `サーバーエラー (status ${response.status}):`,
                            result
                        );
                    }
                }
                if (result.id) {
                    tr.dataset.id = String(result.id);
                    showMessage("success", tr);
                } else {
                    console.warn(
                        "POST response に id が含まれていません。response:",
                        result
                    );
                }
            } catch (error) {
                console.log("送信エラー:handleRegister", error);
            }
        }
        // type=customのみlistでPUT
        else if (e.target.closest(".edit-list")) {
            handleEdit(e);
        } else if (e.target.closest(".update-list")) {
            const tr = e.target.closest("tr");
            const id = tr.dataset.id;
            const input = tr.querySelector("input[type='text']");

            const list = input.value.trim();
            if (!list) {
                input.classList.add("input-error");
                showMessage("error", tr);
                return;
            }
            input.classList.remove("input-error");

            try {
                const response = await fetch(`/checklist/${id}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        "X-CSRF-TOKEN": document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content,
                    },
                    body: JSON.stringify({
                        type: "custom",
                        list: input.value,
                    }),
                    credentials: "include",
                });
                const result = await response.json();

                console.log(result);

                if (result.success && response.ok) {
                    const updateBtn = tr.querySelector(".update-list");
                    updateBtn.classList.remove("update-list");
                    updateBtn.classList.add("edit-list");
                    updateBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" height="40px"
                                        viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                        <path
                                            d="M284-286h68l250-249.33-68-69.34-250 250V-286Zm339.33-270.67 40-40.66q6.67-6.67 7-15 .34-8.34-7-15.67l-38-37.33q-7.33-7.34-15.33-7-8 .33-14.67 7l-40 39.33 68 69.33ZM186.67-120q-27.5 0-47.09-19.58Q120-159.17 120-186.67v-586.66q0-27.5 19.58-47.09Q159.17-840 186.67-840h192.66q7.67-35.33 35.84-57.67Q443.33-920 480-920t64.83 22.33Q573-875.33 580.67-840h192.66q27.5 0 47.09 19.58Q840-800.83 840-773.33v586.66q0 27.5-19.58 47.09Q800.83-120 773.33-120H186.67Zm0-66.67h586.66v-586.66H186.67v586.66Zm293.33-608q13.67 0 23.5-9.83t9.83-23.5q0-13.67-9.83-23.5t-23.5-9.83q-13.67 0-23.5 9.83t-9.83 23.5q0 13.67 9.83 23.5t23.5 9.83Zm-293.33 608v-586.66 586.66Z" />
                                    </svg>`;

                    input.disabled = true;
                    showMessage("update", tr);
                }
            } catch (error) {
                console.log("送信エラー:handleEdit", error);
            }
        }
        // type=customのみDELETE
        else if (e.target.closest(".delete-list")) {
            const tr = e.target.closest("tr");
            const id = tr.dataset.id;

            handleDelete(e);

            try {
                const response = await fetch(`/checklist/${id}`, {
                    method: "DELETE",
                    headers: {
                        Accept: "application/json",
                        "X-CSRF-TOKEN": document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content,
                    },
                });
                const result = await response.json();
                console.log(result);
                if (result.success) {
                    tr.remove();
                }
            } catch (error) {
                console.log("送信エラー:handleDelete", error);
            }

            // type = templat：checkedのPUT
            // type = custom：checkedのPUT
        } else if (e.target.matches("input[name='checked']")) {
            const target = e.target;
            const tr = target.closest("tr");
            const id = tr.dataset.id;
            const checked = target.checked;
            const type = tr.dataset.type;

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
                const response = await fetch(`/checklist/${id}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        "X-CSRF-TOKEN": document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content,
                    },
                    body: JSON.stringify({
                        type,
                        checked,
                    }),
                    credentials: "include",
                });
                const result = await response.json();
                console.log(result);
                if (result.success && response.ok) {
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
                                <span class="phase-toggle"><svg
                                    xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960"
                                    width="30px" fill="#8C8C8C">
                                    <path
                                        d="M710.97-192.56h32v-104.88h104.88v-32H742.97v-104.87h-32v104.87H606.1v32h104.87v104.88ZM726.15-140q-72.16 0-123-51.05t-50.84-122.59q0-72.73 50.83-123.72 50.84-51 123.34-51 71.83 0 122.88 51 51.05 50.99 51.05 123.72 0 71.54-51.05 122.59T726.15-140ZM180-220v-450l300-225.77L780-670v102.95q-11.82-3.67-24.47-5.1-12.65-1.44-25.79-1.85v-70.87L480-833.08 230.26-644.96v374.7h240.23q1.87 13.08 5.86 25.83 3.99 12.74 9.32 24.43H180Zm300-331.87Z" />
                                </svg></span><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#8C8C8C"><path d="m251.33-204.67-46.66-46.66L433.33-480 204.67-708.67l46.66-46.66L480-526.67l228.67-228.66 46.66 46.66L526.67-480l228.66 228.67-46.66 46.66L480-433.33 251.33-204.67Z"/></svg>
                                </div>
                                </td>
                                <td></td>
                                <td colspan="3">住宅が欲しい？</td>`;

                const triggerTr = e.target.closest("tr");
                triggerTr.parentNode.insertBefore(
                    toggleTr,
                    triggerTr.nextSibling
                );
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
                                    <span class="phase-toggle"><svg xmlns="http://www.w3.org/2000/svg" height="30px"
                                    viewBox="0 -960 960 960" width="30px" fill="#8C8C8C">
                                    <path
                                        d="M692.87-615.85h61.03v-61.02h-61.03v61.02Zm0 165.29h61.03v-61.03h-61.03v61.03Zm0 164.87h61.03v-61.03h-61.03v61.03ZM640.92-140v-50.26h208.82v-579.48H460.51v99.1l-50.25-35.54V-820H900v680H640.92ZM60-140v-365.13l255.54-182.41 255.13 182.33V-140H367.28v-190.41H263.79V-140H60Zm50.26-50.26h103.28v-190.41h204v190.41h102.87v-289.33L315.54-625.03 110.26-479.24v288.98Zm530.66-352.56ZM417.54-190.26v-190.41h-204v190.41-190.41h204v190.41Z" />
                                </svg></span><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#8C8C8C"><path d="m251.33-204.67-46.66-46.66L433.33-480 204.67-708.67l46.66-46.66L480-526.67l228.67-228.66 46.66 46.66L526.67-480l228.66 228.67-46.66 46.66L480-433.33 251.33-204.67Z"/></svg>
                                </div></td>
                                <td></td>
                                <td colspan="3">住宅メーカーが決まった？</td>`;
                const triggerTr = e.target.closest("tr");
                triggerTr.parentNode.insertBefore(
                    toggleTr,
                    triggerTr.nextSibling
                );
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
                                <span class="phase-toggle"><svg xmlns="http://www.w3.org/2000/svg" height="30px"
                                    viewBox="0 -960 960 960" width="30px" fill="#8C8C8C">
                                    <path
                                        d="M490.31-140v-.21.21q-51.59.46-112.77-7.42-61.18-7.89-113.94-25.18-52.75-17.3-88.18-44.66Q140-244.62 140-283.85q0 39.23 35.42 66.59 35.43 27.36 88.18 44.66 52.76 17.29 113.94 25.18 61.18 7.88 112.77 7.42Zm-10.18-208.31v-.54.54q-43.23-.15-83.67-4.01-40.43-3.86-76.96-11.98-36.52-8.11-69.15-20.16t-60.09-28.85q27.46 16.8 60.09 28.85t69.15 20.16q36.53 8.12 76.96 11.98 40.44 3.86 83.67 4.01ZM480-606.15q85.97 0 174.96-25.35 88.99-25.35 110.25-55.71-21.54-30.87-110.04-56.7-88.5-25.83-175.17-25.83-87.59 0-175.83 24.93-88.25 24.94-110.55 56.07 21.92 32.2 109.24 57.39 87.32 25.2 177.14 25.2Zm225.9 476.12h30.51v-167.38l74.31 74.56 21.54-21.54-111.23-111.23-111.24 111.23 21.54 21.54 74.57-74.56v167.38Zm15.13 62.34q-72.36 0-123.75-51.06-51.38-51.05-51.38-123.66 0-72.77 51.38-124.15 51.39-51.39 123.75-51.39 72.35 0 123.74 51.39 51.38 51.38 51.38 124.15 0 72.61-51.38 123.66-51.39 51.06-123.74 51.06ZM473.56-190.46q2.36 13.64 6.81 26.14 4.45 12.5 9.94 24.32-51.59.46-112.77-7.42-61.18-7.89-113.94-25.18-52.75-17.3-88.18-44.66Q140-244.62 140-283.85V-680q0-57.92 99.54-98.96Q339.08-820 480-820q140.92 0 240.46 41.04Q820-737.92 820-680v204.92q-11.82-5.48-24.32-9.55-12.5-4.06-25.94-6.42v-132.03q-53.84 31.54-130.19 48.87-76.34 17.34-159.96 17.21-85.77 0-162.06-17.46-76.3-17.46-127.27-48.62v156.49q50.56 33.15 127.55 50.59 76.98 17.44 161.78 17.44 11.31 0 22.1-.34 10.8-.33 22.11-1.15-9.67 11.87-17.39 24.78-7.72 12.91-13.97 26.96h-12.31q-87.26-.18-160.83-15.79-73.58-15.62-129.04-49.21v135.21q7.84 17.07 34.74 32.92 26.9 15.85 65.55 27.77 38.66 11.92 86.18 19.26 47.53 7.33 96.83 7.69Z" />
                                </svg></span><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#8C8C8C"><path d="m251.33-204.67-46.66-46.66L433.33-480 204.67-708.67l46.66-46.66L480-526.67l228.67-228.66 46.66 46.66L526.67-480l228.66 228.67-46.66 46.66L480-433.33 251.33-204.67Z"/></svg>
                                </div></td>
                                <td></td>
                        <td colspan="3">資金・ローンのめどは立った？</td>`;
                const triggerTr = e.target.closest("tr");
                triggerTr.parentNode.insertBefore(
                    toggleTr,
                    triggerTr.nextSibling
                );
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
                                <span class="phase-toggle"><svg xmlns="http://www.w3.org/2000/svg" height="30px"
                                    viewBox="0 -960 960 960" width="30px" fill="#8C8C8C">
                                    <path
                                        d="M628.92-531.44v-1.51 1.51-158.25 158.25ZM185.95-163.8q-16.21 7.52-31.08-2.1Q140-175.51 140-193.8v-523.53q0-11.85 6.35-21.27 6.34-9.42 17.39-13.66l190.98-66.2 251.23 87.79 168.1-65.94q16.21-7.11 31.08 1.73Q820-786.05 820-768.15v327.53q-10.03-15.38-22.5-28.44-12.47-13.07-27.76-23.86v-249.9l-140.82 53.13v158.25q-13.43 1.21-25.8 3.35-12.38 2.14-24.45 6.14v-167.74l-197.34-67.8v517.41L185.95-163.8Zm4.31-54.05 140.82-53.64v-486l-140.82 47.23v492.41Zm454.2-4.38q38.59 0 64.71-25.73 26.11-25.73 26.32-65.3.2-38.59-26.12-64.8-26.32-26.22-64.91-26.22-38.59 0-64.81 26.22-26.21 26.21-26.21 64.8 0 38.85 26.21 64.94 26.22 26.09 64.81 26.09Zm0 50.25q-58.33 0-99.81-41.47-41.47-41.47-41.47-99.81 0-58.74 41.47-100.01 41.48-41.27 99.81-41.27 58.74 0 100.01 41.27t41.27 100.01q0 22.88-6.48 43.2-6.49 20.32-18.93 37.55L860-133.49 826.9-100l-99.41-99q-17.64 13.38-38.3 20.2-20.65 6.82-44.73 6.82ZM331.08-757.49v486-486Z" />
                                </svg></span><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#8C8C8C"><path d="m251.33-204.67-46.66-46.66L433.33-480 204.67-708.67l46.66-46.66L480-526.67l228.67-228.66 46.66 46.66L526.67-480l228.66 228.67-46.66 46.66L480-433.33 251.33-204.67Z"/></svg>
                                </div></td>
                                <td></td>
                            <td colspan="3">土地探しは順調？</td>`;
                const triggerTr = e.target.closest("tr");
                triggerTr.parentNode.insertBefore(
                    toggleTr,
                    triggerTr.nextSibling
                );
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
                                    <span class="phase-toggle"><svg xmlns="http://www.w3.org/2000/svg" height="30px"
                                    viewBox="0 -960 960 960" width="30px" fill="#8C8C8C">
                                    <path
                                        d="M180-140v-383.1l-80.64 61.77-30.13-40L180-586v-109.9h50.26v71.08L480-815l410.77 314.08-30.13 39.38L780-523.1V-140H180Zm50.26-50.26h206.92v-175.38h85.64v175.38h206.92v-371.02L480-751.72 230.26-561.28v371.02ZM180-744.61q0-41.18 27.9-70.08 27.89-28.9 71.84-28.9 23.69 0 36.59-14.34 12.9-14.35 12.9-34.38h50.26q0 40.77-27.62 69.88-27.62 29.1-72.13 29.1-23.1 0-36.29 14.05-13.19 14.06-13.19 34.67H180Zm50.26 554.35h499.48-499.48Z" />
                                </svg></span><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#8C8C8C"><path d="m251.33-204.67-46.66-46.66L433.33-480 204.67-708.67l46.66-46.66L480-526.67l228.67-228.66 46.66 46.66L526.67-480l228.66 228.67-46.66 46.66L480-433.33 251.33-204.67Z"/></svg>
                                </div></td>
                                <td></td>
                            <td colspan="3">理想の住まいにしよう！</td>
`;
                const triggerTr = e.target.closest("tr");
                triggerTr.parentNode.insertBefore(
                    toggleTr,
                    triggerTr.nextSibling
                );
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
