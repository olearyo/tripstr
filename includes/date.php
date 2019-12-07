<div id="dateTime" class="hide">
    <div class="date-time-controls">
    <h1>Choose date and time</h1>
        <div class="form-container">
        <!-- DATE -->
        <section class="grid-3">
            <div class="form-input">
                <label>Year</label>
                <select id="year">
                </select>
            </div>
            <div class="form-input">
                <label>Month</label>
                <select id="month">
                </select>
            </div>
            <div class="form-input">
                <label>Date</label>
                <select id="date">
                </select>
            </div>
        </section>

        <section class="grid-2">
            <button type="button" id="btnCancelDate" class="button secondary">Cancel</button>
            <button type="button" id="btnDoneDate" class="button">Done</button>
        </section>
        </div>
    </div>
</div>

<script>
    let btnCancelDate = document.querySelector('#btnCancelDate')
    let btnDoneDate = document.querySelector('#btnDoneDate')

    btnCancelDate.addEventListener('click', showHideDate, false)
    btnDoneDate.addEventListener('click', saveDate2, false)
</script>