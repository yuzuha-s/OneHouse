import { calculate } from "./calculate.js";

function init() {
    setupInitialState();
    setupEventListeners();
}

function setupInitialState() {}

function setupEventListeners() {
    const calculateBtn = document.getElementById("calculate-btn");
    const editBtn = document.querySelectorAll(".edit-row");
    const range = document.getElementById("range");
    const tuboValue = document.getElementById("value");
    const builableAreaValue = document.querySelector(".builable_area");
    const buildingCostValue = document.querySelector(".building_cost");
    const builableTuboValue = document.querySelector(".builable_area_Tubo");
    const maxFloorAreaValue = document.querySelector(".maxfloor_area");
    let currentPricePerTsubo = 0;
    let editingRow = null;

    // range と連動
    range.addEventListener("input", (e) => {
        const tubo = parseFloat(e.target.value) || 0;
        tuboValue.textContent = tubo.toFixed(0);
        builableAreaValue.textContent = (tubo * 3.3).toFixed(1);
        buildingCostValue.textContent = Math.floor(
            tubo * currentPricePerTsubo
        ).toLocaleString();
        builableTuboValue.textContent = tubo.toFixed(0);
    });

    // land-calculateボタン押下時の建築可能面積の結果表示
    const handleCalculate = () => {
        const landArea =
            parseFloat(
                document.querySelector('input[name="landarea"]').value
            ) || 0;
        const far =
            parseInt(document.querySelector('input[name="far"]').value) || 0;
        const bcr =
            parseInt(document.querySelector('input[name="bcr"]').value) || 0;
        const pricePerTsubo =
            parseInt(
                document.querySelector('input[name="pricePerTsubo"]').value
            ) || 0;
        currentPricePerTsubo = pricePerTsubo;

        if (landArea <= 0 || far <= 0 || bcr <= 0 || pricePerTsubo <= 0) {
            showInputMessage("inputerror");
            range.max = 0;
            range.value = 0;
            tuboValue.textContent = 0;
            builableAreaValue.textContent = 0;
            buildingCostValue.textContent = 0;
            return;
        }

        const result = calculate({ landArea, far, bcr, pricePerTsubo });
        if (result.error) {
            showInputMessage("inputerror");
            return;
        }

        maxFloorAreaValue.textContent = Math.floor(result.maxFloorArea);
        builableAreaValue.textContent = Math.floor(result.buildableArea);
        builableTuboValue.textContent = Math.floor(result.buildableAreaTsubo);
        buildingCostValue.textContent = Math.floor(
            result.buildingCost
        ).toLocaleString();

        document.getElementById("builable_area_hidden").value = Math.floor(
            result.buildableArea
        );

        range.max = result.buildableAreaTsubo;
        range.step = 1;
        range.value = range.max;
        tuboValue.textContent = range.value;

        showInputMessage("calculateSuccess");
    };
    calculateBtn.addEventListener("click", () => {
        handleCalculate();

        const errors = document.querySelectorAll(".error");
        errors.forEach((error) => {
            error.style.display = "none";
        });
    });

    // edit-row button押下時のバリデーション・UI更新
    const handleEdit = (e) => {
        if (e.target.closest(".edit-row")) {
            const btn = e.target.closest(".edit-row");
            const tr = btn.closest("tr");

            if (editingRow && editingRow !== tr) {
                alert("複数選択はできません");
                return;
            }
            editingRow = tr;
            tr.style.backgroundColor = "rgba(97, 198, 223, 0.3)";
            tr.style.fontWeight = "bold";
            btn.style.display = "none";

            document.querySelector('textarea[name="address"]').value =
                tr.dataset.address;
            document.querySelector('input[name="landarea"]').value =
                tr.dataset.landarea;
            document.querySelector('input[name="floor"]').value =
                tr.dataset.floor;
            document.querySelector('input[name="far"]').value = tr.dataset.far;
            document.querySelector('input[name="bcr"]').value = tr.dataset.bcr;
            document.querySelector('input[name="pricePerTsubo"]').value =
                tr.dataset.price;
            document.querySelector("input[name=id]").value = tr.dataset.id;
            showUpdateMessage("update");

            const backBtn = document.querySelector(".back");
            backBtn.innerHTML = `<button type = "button" class="backEdit"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#fff"><path d="M266-200v-66.67h301.33q67.67 0 116.84-44.33 49.16-44.33 49.16-110.33t-49.16-110.34Q635-576 567.33-576H286.67l110.66 110.67-46.66 46.66L160-609.33 350.67-800l46.66 46.67-110.66 110.66h280q95.66 0 164.5 63.67Q800-515.33 800-421.33q0 94-68.83 157.66Q662.33-200 566.67-200H266Z"/></svg></button>`;
        }
    };

    editBtn.forEach((btn) =>
        btn.addEventListener("click", (e) => {
            handleEdit(e);
        })
    );

    // 戻るボタン
    const handleBack = () => {
        if (editingRow) {
            editingRow.style.backgroundColor = "";
            editingRow.style.fontWeight = "";

            const editBtn = editingRow.querySelector(".edit-row");
            if (editBtn) {
                editBtn.style.display = "inline-block";
            }
            document.querySelector('textarea[name="address"]').value = "";
            document.querySelector('input[name="landarea"]').value = "";
            document.querySelector('input[name="floor"]').value = "";
            document.querySelector('input[name="far"]').value = "";
            document.querySelector('input[name="bcr"]').value = "";
            document.querySelector('input[name="pricePerTsubo"]').value = "";
            document.querySelector("input[name=id]").value = "";
            editBtn.style.display = "inline-block";

            const backBtn = document.querySelector(".back");
            if (backBtn) {
                backBtn.innerHTML = "";
            }

            editingRow = null;
        }
    };

    // 戻るボタンのクリックイベント登録
    document.addEventListener("click", (e) => {
        if (e.target.closest(".backEdit")) {
            handleBack();
            showUpdateMessage("back");
        }
    });
}
// バリデーションメッセージの表示
function showUpdateMessage(type) {
    const validate = document.querySelector(".validate-wrapper");
    validate.innerHTML = "";
    if (type === "update") {
        validate.innerHTML = `<div class = "validate">
                                <svg xmlns="http://www.w3.org/2000/svg" height="40px"
                                                    viewBox="0 -960 960 960" width="40px" fill="#576bf5">
                                                    <path
                                                        d="M284-286h68l250-249.33-68-69.34-250 250V-286Zm339.33-270.67 40-40.66q6.67-6.67 7-15 .34-8.34-7-15.67l-38-37.33q-7.33-7.34-15.33-7-8 .33-14.67 7l-40 39.33 68 69.33ZM186.67-120q-27.5 0-47.09-19.58Q120-159.17 120-186.67v-586.66q0-27.5 19.58-47.09Q159.17-840 186.67-840h192.66q7.67-35.33 35.84-57.67Q443.33-920 480-920t64.83 22.33Q573-875.33 580.67-840h192.66q27.5 0 47.09 19.58Q840-800.83 840-773.33v586.66q0 27.5-19.58 47.09Q800.83-120 773.33-120H186.67Zm0-66.67h586.66v-586.66H186.67v586.66Zm293.33-608q13.67 0 23.5-9.83t9.83-23.5q0-13.67-9.83-23.5t-23.5-9.83q-13.67 0-23.5 9.83t-9.83 23.5q0 13.67 9.83 23.5t23.5 9.83Zm-293.33 608v-586.66 586.66Z" />
                                                </svg>

                            <p>情報を更新中！</p></div>`;
        validate.style.display = "block";
        setTimeout(() => {
            validate.style.display = "none";
        }, 5000);
    } else if (type === "back") {
        const landCardsuccess = document.querySelector(".land-card-success");
        landCardsuccess.classList.remove("land-card-success");
        landCardsuccess.classList.add("land-card");

        validate.innerHTML = `<div class = "validate">
                                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                fill="#576bf5">
                <path d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z"/>
            </svg>

                            <p>変更を終了しました</p></div>`;
        validate.style.display = "block";
        setTimeout(() => {
            validate.style.display = "none";
        }, 5000);
    }
}

function showInputMessage(type) {
    const validate = document.querySelector(".validate-wrapper");
    validate.innerHTML = "";
    if (type === "inputerror") {
        validate.innerHTML = `<div class = "validate"> <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#576bf5"><path d="M479.99-280q15.01 0 25.18-10.15 10.16-10.16 10.16-25.17 0-15.01-10.15-25.18-10.16-10.17-25.17-10.17-15.01 0-25.18 10.16-10.16 10.15-10.16 25.17 0 15.01 10.15 25.17Q464.98-280 479.99-280Zm-31.32-155.33h66.66V-684h-66.66v248.67ZM480.18-80q-82.83 0-155.67-31.5-72.84-31.5-127.18-85.83Q143-251.67 111.5-324.56T80-480.33q0-82.88 31.5-155.78Q143-709 197.33-763q54.34-54 127.23-85.5T480.33-880q82.88 0 155.78 31.5Q709-817 763-763t85.5 127Q880-563 880-480.18q0 82.83-31.5 155.67Q817-251.67 763-197.46q-54 54.21-127 85.84Q563-80 480.18-80Zm.15-66.67q139 0 236-97.33t97-236.33q0-139-96.87-236-96.88-97-236.46-97-138.67 0-236 96.87-97.33 96.88-97.33 236.46 0 138.67 97.33 236 97.33 97.33 236.33 97.33ZM480-480Z"/></svg><p>計算には土地面積・容積率・建ぺい率・坪単価を入力してください。</p></div>`;
        validate.style.display = "block";

        setTimeout(() => {
            validate.style.display = "none";
        }, 3000);
        return;
    } else if (type === "calculateSuccess") {
        const landCard = document.querySelector(".land-card");
        landCard.classList.remove("land-card");
        landCard.classList.add("land-card-success");

        validate.innerHTML = `<div class = "validate">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                fill="#576bf5">
                <path d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z"/>
            </svg>
            <p>建てられる範囲とコストが出ました！</p></div>
        `;
        validate.style.display = "block";

        setTimeout(() => {
            validate.style.display = "none";
        }, 3000);
    }
}
document.addEventListener("DOMContentLoaded", init);
