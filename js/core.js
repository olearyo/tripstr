console.log('Loaded core.js')

// POPUP FUNCTIONALITY
// let cancelBtn = document.querySelector('#no')
// cancelBtn.addEventListener('click', showHidePopup, false)

// function showHidePopup() {
//     let popup = document.querySelector('#popup')
//     popup.getAttribute('class') == 'showPopup'
//         ? popup.setAttribute('class', 'hidePopup')
//         : popup.setAttribute('class', 'showPopup')
// }
function setDateUI() {
	const months = [
		'January',
		'February',
		'March',
		'April',
		'May',
		'June',
		'July',
		'August',
		'September',
		'October',
		'November',
		'December'
	]

	// ++++++++++++++++++ RENDER YEAR OPTIONS
	let yearList = document.querySelector('#year')
	for (let i = 0; i < 20; i++) {
		let currentYear = new Date().getFullYear()
		let year
		year = i == 0 ? currentYear : currentYear + i

		let yearOption = document.createElement('option')
		let yearText = document.createTextNode(year)
		yearOption.setAttribute('value', year)
		yearOption.appendChild(yearText)
		yearList.appendChild(yearOption)
	}

	// ++++++++++++++++++ RENDER MONTHS
	let monthList = document.querySelector('#month')
	for (let month of months) {
		let currentMonth = new Date().getMonth()

		let monthOption = document.createElement('option')
		monthOption.setAttribute('value', months.indexOf(month) + 1) // In JS month starts at 0 whereas in MySQL it begins with 01

		// Disable past months
		months.indexOf(month) < currentMonth
			? monthOption.setAttribute('disabled', 'true')
			: null

		monthOption.appendChild(document.createTextNode(month))
		monthList.appendChild(monthOption)
	}

	// ++++++++++++++++++ RENDER DATES
	let dateList = document.querySelector('#date')

	function renderDates(e, isFirstCall = false) {
		let dayCount = getDayCount()

		// if it's the first call remove existing date options
		if (!isFirstCall) {
			while (dateList.hasChildNodes()) {
				dateList.removeChild(dateList.firstChild)
			}
		}

		for (let i = 1; i <= dayCount; i++) {
			let dateOption = document.createElement('option')
			dateOption.appendChild(document.createTextNode(i))
			dateOption.setAttribute('value', i)
			dateList.appendChild(dateOption)
		}
	}
	renderDates(true)

	monthList.addEventListener('change', renderDates, false)
	yearList.addEventListener('change', renderDates, false)

	function getDayCount() {
		let y = document.querySelector('#year').value
		let m = document.querySelector('#month').value
		let d = new Date(y, m, 0) // it says last day of m of y

		return d.getDate()
	}
}
