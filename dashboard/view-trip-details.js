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

			let accommodation = document.getElementById('accommodation');
			for(let acco of res.accommodations) {
				let para = document.getElementById('par');
				let paraText =  document.createTextNode(acco.name);
				para.appendChild(paraText);
				accommodation.appendChild(para);
			}

			let events = document.getElementById('events');
			for(let event of res.events) {
				let eventName = document.getElementById('eventName');
				let eventText =  document.createTextNode(event.name);
				eventName.appendChild(eventText);
				events.appendChild(eventName);
			}

			let transCont = document.getElementById('transCont');
			for(let transportation of res.transportation) {
				// TRIP NAME
				createDetails('strong', transportation.name, transCont, 'trans-name')
				// TRIP NAME
				createDetails('p', transportation.departure, transCont, 'trans-departure')

			}


			function createDetails(what, text, where, className) {
				let newWhat = document.createElement(what)
				newWhat.setAttribute('class', className)
				let newText = document.createTextNode(text)
				newWhat.appendChild(newText)
				where.appendChild(newWhat)
			}
			
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
