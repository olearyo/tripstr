
//view trips-from JSON.js

// window.onload = function(){
// 	showTripDetails();
// }

showTripDetails();

function showTripDetails(){
    var tripDetails = document.getElementById("tripDetails");
    // tripDetails.innerHTML = '';
    
    var xhr = new XMLHttpRequest();
	
	xhr.onreadystatechange = function(e){     
		console.log(xhr.readyState);     
		if(xhr.readyState === 4){        
			//receive the response and convert to JavaScript Object 

			// console.log(xhr.responseText);
			var res = JSON.parse(xhr.responseText);
			console.log(res); 
			//let getParent = document.getElementById('tripDetails');
			let tripH = document.getElementById('tripName');
			// console.log(tripH);
			tripH.appendChild(document.createTextNode(res[0].tripName))
			
			// tripName.innerHTML = res[0].tripName;

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
				createDetails('p', events.name, eventsContent, 'event-name');

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


			/////////////////////////////// CREATING THE REAL STUFF FROM THIS FUNCTION /////////////////////////////////
			function createDetails(what, text, where, className) {
				let newWhat = document.createElement(what);
				newWhat.setAttribute('class', className);
				let newText = document.createTextNode(text);
				newWhat.appendChild(newText);
				where.appendChild(newWhat);
			}

			// let accommodation = document.getElementById('accommodation');
			// for(let acco of res.accommodations) {
			// 	let para = document.getElementById('par');
			// 	let paraText =  document.createTextNode(acco.name);
			// 	para.appendChild(paraText);
			// 	accommodation.appendChild(para);
			// }

			// let events = document.getElementById('events');
			// for(let event of res.events) {
			// 	let eventName = document.getElementById('eventName');
			// 	let eventText =  document.createTextNode(event.name);
			// 	eventName.appendChild(eventText);
			// 	events.appendChild(eventName);
			// }
			
			// let others = document.getElementById('others');
			// for(let others of res.others) {
			// 	let othersName = document.getElementById('othersName');
			// 	let othersText =  document.createTextNode(others.name);
			// 	othersName.appendChild(othersText);
			// 	others.appendChild(othersName);
			// }

			// for(var i=0; i<responseJSON.length; i++){
			// 	var rowDiv = document.createElement("div");
				
			// 	if(parseInt(responseJSON[i].rating) > 4){
			// 		rowDiv.setAttribute("class", "goodGame");	
			// 	}else{
			// 		rowDiv.setAttribute("class", "badGame");	
			// 	}

			// 	var rowDivText = document.createTextNode(responseJSON[i]["name"]);
			// 	rowDiv.appendChild(rowDivText);
			// 	allGames.appendChild(rowDiv);
			}
		}

	xhr.open("GET", "process-trip-details.php?tripId="+tripId, true); //true means it is asynchronous // Send variables through the url
	xhr.send();

};
