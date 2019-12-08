
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
				//accommodation Name
				createDetails('p', accommodations.name, accoContent, 'acco-name');

				//accommodation Address
				createDetails('p', accommodations.address, accoContent, 'acco-address');

				//Transport Booking ID
				createDetails('p', accommodations.bookingId, accoContent, 'acco-bookingId');

				//Check In Date
				createDetails('p', accommodations.checkIn, accoContent, 'acco-checkIn');

				//Check Out Date
				createDetails('p', accommodations.checkOut, accoContent, 'acco-checkOut');

				//accommodation Others data
				createDetails('p', accommodations.others, accoContent, 'acco-others');
			}

			///////////////////////////////// EVENTS DETAILS //////////////////////////////////////
			let eventsContent = document.getElementById('eventsContent');
			for(let events of res.events) {
				//accommodation Name
				createDetails('h1', events.name, eventsContent, 'event-name');

				//accommodation Address
				createDetails('p', events.address, eventsContent, 'event-address');

				//Check In Date
				createDetails('p', events.checkIn, eventsContent, 'event-checkIn');

				//accommodation Others data
				createDetails('p', events.others, eventsContent, 'event-others');
			}


			///////////////////////////////// TRANSPORT DETAILS //////////////////////////////////////
			let transContent = document.getElementById('transContent');
			for(let transportation of res.transportation) {
				//Transportation Name
				createDetails('p', transportation.name, transContent, 'trans-name');

				//Transport Booking ID
				createDetails('p', transportation.bookingId, transContent, 'trans-bookingId');

				//Check In Date
				createDetails('p', transportation.checkIn, transContent, 'trans-checkIn');

				//Check Out Date
				createDetails('p', transportation.checkOut, transContent, 'trans-checkOut');

				//Departure From
				createDetails('p', transportation.departure, transContent, 'trans-departure');

				//Arrival At
				createDetails('p', transportation.arrival, transContent, 'trans-arrival');

				//Others data
				createDetails('p', transportation.others, transContent, 'trans-others');
			}

			///////////////////////////////// OTHERS DETAILS //////////////////////////////////////
			let othersContent = document.getElementById('othersContent');
			for(let transportation of res.transportation) {
				//Transportation Name
				createDetails('p', transportation.name, othersContent, 'others-name');

				//Check In Date
				createDetails('p', transportation.checkIn, othersContent, 'others-checkIn');

				//Others data
				createDetails('p', transportation.others, othersContent, 'others-other');
			}

			///////////////////////////////// FILES DETAILS //////////////////////////////////////
			let filesContent = document.getElementById('filesContent');
			for(let files of res.files) {
				//Transportation Name
				createDetails('p', files.fileName, filesContent, 'files-name');

				//Check In Date
				createDetails('p', files.path, filesContent, 'files-path');
			}


			/////////////////////////////// CREATING THE REAL STUFF FROM THIS FUNCTION /////////////////////////////////
			function createDetails(what, text, where, className) {
				let newWhat = document.createElement(what);
				newWhat.setAttribute('class', className);
				let newText = document.createTextNode(text);
				newWhat.appendChild(newText);
				where.appendChild(newWhat);
			}

		}//if ends

	}//function(e) ends

	xhr.open("GET", "process-trip-details.php?tripId="+tripId, true); //true means it is asynchronous // Send variables through the url
	xhr.send();

	
	showLinks();

	function showLinks(){
		var lhr = new XMLHttpRequest();
	
		lhr.onreadystatechange = function(e){     
			console.log(lhr.readyState);     
			if(lhr.readyState === 4){ 
				var links = JSON.parse(lhr.responseText);
				console.log(links);
				
				let editAccoLink= document.getElementById('editAcco');
				for(let accoLink of links.accoLink){
					createDetails('a', accoLink.accoId.tripId, editAcco, 'accoLink');
				}

				function createDetails(what, text, where, className) {
					let newWhat = document.createElement(what);
					newWhat.setAttribute('class', className);
					let newText = document.createTextNode(text);
					newWhat.appendChild(newText);
					where.appendChild(newWhat);
				}

				lhr.open("POST", "edit-accommodation.php", true); //true means it is asynchronous // Send variables through the url
				lhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
				lhr.send("accoId"+accoId.value+"&tripId="+tripId.value);

				// var accoIdLink = document.getElementById('editAcco');
				// // console.log(tripH);
				// console.log(accoIdLink);
				// tripH.appendChild(document.createElement(res[0].accoId.tripId));
			}
		} //function(e) ends
	} //function showLinks ends

};
