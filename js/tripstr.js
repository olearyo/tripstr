console.log('Loaded tripstr.js')

// DATE AND TIME POPUP

let who /* stores id of the element who triggered showHideDate(). 
This will be used to return user selected date time values to the source element. */
function showHideDate(e) {
	e ? (who = e.target.id) : null
	let currentState = dateTime.getAttribute('class')

	currentState == 'hide'
		? dateTime.setAttribute('class', 'show')
		: dateTime.setAttribute('class', 'hide')
}

// SAVE DATETIME
function saveDate() {
	let year = document.querySelector('#year').value
	let month = document.querySelector('#month').value
	let date = document.querySelector('#date').value
	let hour = document.querySelector('#hour').value
	let minute = document.querySelector('#minute').value

	if (hour && minute) {
		let dateAndTime =
			year + '-' + month + '-' + date + ' ' + hour + ':' + minute + ':00'

		// set above value to source input field - who
		document.querySelector('#' + who).value = dateAndTime
		showHideDate()
	}
}

// SAVE DATE
function saveDate2() {
	
	let year = document.querySelector('#year').value
	let month = document.querySelector('#month').value
	let date = document.querySelector('#date').value
	
	var xxc = year + '-' + month + '-' + date 
	document.querySelector('#' + who).value = xxc
	showHideDate()

	// if (year && month && date) {
	// 	let date =
	// 		year + '-' + month + '-' + date 
	// 	// set above value to source input field - who
	// 	document.querySelector('#' + who).value = date
		
	// 	showHideDate()
	// }
}

