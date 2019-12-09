
//view trips-from JSON.js

// window.onload = function(){
// 	showTripDetails();
// }

showTripDetails();

function showTripDetails(){
    // var tripDetails = document.getElementById("tripDetails");
    // tripDetails.innerHTML = '';
    
    var xhr = new XMLHttpRequest();
	
	xhr.onreadystatechange = function(e){     
		console.log(xhr.readyState);     
		if(xhr.readyState === 4){        

			var res = JSON.parse(xhr.responseText);
			console.log(res); 
			let tripH = document.getElementById('tripName');
			// console.log(tripH);
			// console.log(res);
			tripH.appendChild(document.createTextNode(res[0].tripName))

			let tripDest = document.getElementById('tripDest');
			tripDest.appendChild(document.createTextNode(res[0].destination));

			let fromDate = document.getElementById('fromDate');
			fromDate.appendChild(document.createTextNode(res[0].fromDate));

			let toDate = document.getElementById('toDate');
			toDate.appendChild(document.createTextNode(res[0].toDate));

			///////////////////////////////// ACCOMMODATION DETAILS //////////////////////////////////////
			let accoContent = document.getElementById('accoContent');
			for(let accommodations of res.accommodations) {

				//edit accommodation link
				let editLink =  document.createElement('a')
				let url = "../edit-trip/edit-accommodation.php?accoId=" + accommodations.accoId +"&tripId="+ accommodations.tripId
				editLink.innerHTML = "Edit Accommodation";
				editLink.setAttribute('href', url)
				accoContent.appendChild(editLink);

				//accommodation Name
				createDetails('h2', 'Address:', accoContent);
				createDetails('h3', accommodations.name, accoContent, 'acco-name');

				//accommodation Address
				createDetails('h4', accommodations.address, accoContent, 'acco-address');

				//Accommodation Booking ID
				createDetails('h2', 'Booking ID:', accoContent);
				createDetails('h3', accommodations.bookingId, accoContent, 'acco-bookingId');

				//Check In Date
				createDetails('h2', 'Check In:', accoContent);
				createDetails('h3', accommodations.checkIn, accoContent, 'acco-checkIn');

				//Check Out Date
				createDetails('h2', 'Check Out:', accoContent);
				createDetails('h3', accommodations.checkOut, accoContent, 'acco-checkOut');

				//accommodation Others data
				createDetails('h2', 'Miscellaneous:', accoContent);
				createDetails('h3', accommodations.others, accoContent, 'acco-others');

				createDivider('hr', accoContent, 'divider');
			}

			///////////////////////////////// EVENTS DETAILS //////////////////////////////////////
			let eventsContent = document.getElementById('eventsContent');
			for(let events of res.events) {

				//edit event link
				let editLink =  document.createElement('a')
				let url = "../edit-trip/edit-events.php?eventId=" + events.eventId +"&tripId="+ events.tripId
				editLink.innerHTML = "Edit Event";
				editLink.setAttribute('href', url)
				eventsContent.appendChild(editLink);

				//events Name
				createDetails('h2', 'Event Name:', eventsContent);
				createDetails('h3', events.name, eventsContent, 'event-name');

				//events Address
				createDetails('h2', 'Address:', eventsContent);
				createDetails('h3', events.address, eventsContent, 'event-address');

				//Check In Date
				createDetails('h2', 'Check In:', eventsContent);
				createDetails('h3', events.checkIn, eventsContent, 'event-checkIn');

				//events Others data
				createDetails('h2', 'Miscellaneous:', eventsContent);
				createDetails('h3', events.others, eventsContent, 'event-others');

				createDivider('hr', eventsContent, 'divider');
			}


			///////////////////////////////// TRANSPORT DETAILS //////////////////////////////////////
			let transContent = document.getElementById('transContent');
			for(let transportation of res.transportation) {

				//edit transportation link
				let editLink =  document.createElement('a')
				let url = "../edit-trip/edit-transportation.php?transId=" + transportation.transId +"&tripId="+ transportation.tripId
				editLink.innerHTML = "Edit Transportation";
				editLink.setAttribute('href', url)
				transContent.appendChild(editLink);

				//Transportation Name
				createDetails('h2', 'Transport Name:', transContent);
				createDetails('h3', transportation.name, transContent, 'trans-name');

				//Transport Booking ID
				createDetails('h2', 'Booking ID:', transContent);
				createDetails('h3', transportation.bookingId, transContent, 'trans-bookingId');

				//Check In Date
				createDetails('h2', 'Departure Date:', transContent);
				createDetails('h3', transportation.checkIn, transContent, 'trans-checkIn');

				//Check Out Date
				createDetails('h2', 'Arrival Date:', transContent);
				createDetails('h3', transportation.checkOut, transContent, 'trans-checkOut');

				//Departure From
				createDetails('h2', 'Departs From:', transContent);
				createDetails('h3', transportation.departure, transContent, 'trans-departure');

				//Arrival At
				createDetails('h2', 'Arrives At:', transContent);
				createDetails('h3', transportation.arrival, transContent, 'trans-arrival');

				//Others data
				createDetails('h2', 'Miscellaneous:', transContent);
				createDetails('h3', transportation.others, transContent, 'trans-others');

				createDivider('hr', transContent, 'divider');
			}

			///////////////////////////////// OTHERS DETAILS //////////////////////////////////////
			let othersContent = document.getElementById('othersContent');
			for(let others of res.others) {

				//edit transportation link
				let editLink =  document.createElement('a');
				let url = "../edit-trip/edit-others.php?otherId=" + others.otherId +"&tripId="+ others.tripId
				editLink.innerHTML = "Edit Miscellaneous Event";
				editLink.setAttribute('href', url);
				othersContent.appendChild(editLink);

				//Others Name
				createDetails('h2', 'Miscellaneous Event:', othersContent);
				createDetails('h3', others.name, othersContent, 'others-name');

				//Check In Date
				createDetails('h2', 'Important Date:', othersContent);
				createDetails('h3', others.checkIn, othersContent, 'others-checkIn');

				//Others data
				createDetails('h2', 'Other information:', othersContent);
				createDetails('h3', others.others, othersContent, 'others-other');

				createDivider('hr', othersContent, 'divider');
			}

			///////////////////////////////// FILES DETAILS //////////////////////////////////////
			let filesContent = document.getElementById('filesContent');
			for(let files of res.files) {
				//File Name
				// createDetails('h2', 'File Name:', filesContent);
				// createDetails('h3', files.fileName, filesContent, 'files-name');

				//File Path
				createDetails('h2', 'File:', filesContent);
				// createDetails('h3', files.path, filesContent, 'files-path');
				// createDocsLink('a',filesContent, 'uploadLink' );
				let seeLink =  document.createElement('a');
				let link = "../edit-trip/" + files.path
				seeLink.innerHTML = files.fileName;
				seeLink.setAttribute('href', link);
				filesContent.appendChild(seeLink);

				createDivider('hr', filesContent, 'divider');
			}


			/////////////////////////////// CREATING THE REAL STUFF FROM THIS FUNCTION /////////////////////////////////
			function createDetails(what, text, where, className) {
				let newWhat = document.createElement(what);
				newWhat.setAttribute('class', className);
				let newText = document.createTextNode(text);
				newWhat.appendChild(newText);
				where.appendChild(newWhat);
			}

			function createDivider(element, whereTo, classTo){
				let elementName = document.createElement(element);
				elementName.setAttribute('class', classTo);
				whereTo.appendChild(elementName);
			}

		}//if ends

	}//function(e) ends

	xhr.open("GET", "process-trip-details.php?tripId="+tripId, true); //true means it is asynchronous // Send variables through the url
	xhr.send();

	
	// showLinks();

	// function showLinks(){
	// 	var lhr = new XMLHttpRequest();
	
	// 	lhr.onreadystatechange = function(e){     
	// 		console.log(lhr.readyState);     
	// 		if(lhr.readyState === 4){ 
	// 			var links = JSON.parse(lhr.responseText);
	// 			console.log(links);
				
	// 			let editAccoLink= document.getElementById('editAcco');
	// 			for(let accoLink of links.accoLink){
	// 				createDetails('a', accoLink.accoId.tripId, editAccoLink, 'accoLink');
	// 			}

	// 			function createDetails(what, text, where, className) {
	// 				let newWhat = document.createElement(what);
	// 				newWhat.setAttribute('class', className);
	// 				let newText = document.createTextNode(text);
	// 				newWhat.appendChild(newText);
	// 				where.appendChild(newWhat);
	// 			}

	// 			lhr.open("POST", "../edit-trip/edit-transportation.php", true); 
	// 			lhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
	// 			lhr.send("accoId"+accoId.value+"&tripId="+tripId.value);

	// 			// var accoIdLink = document.getElementById('editAcco');
	// 			// // console.log(tripH);
	// 			// console.log(accoIdLink);
	// 			// tripH.appendChild(document.createElement(res[0].accoId.tripId));
	// 		}
	// 	} //function(e) ends
	// } //function showLinks ends

};
