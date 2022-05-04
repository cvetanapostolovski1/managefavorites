var user_id = document.getElementById('userId').value;

const xhttp = new XMLHttpRequest();
xhttp.onload = function() {
var response = JSON.parse(xhttp.responseText);

if(response.success != '')
{
	var countryTable = document.getElementById('allCountries');

	response.forEach(res =>
	(countryTable.innerHTML += "<tr id='row_"+res.ccn3+"'><td>"+res.name.official+"</td><td>"+res.region+"</td><td>"+res.population+"</td><td><button type='button' class='btn btn-primary' onClick='addFavourite("+user_id+","+res.ccn3+")'><span class='glyphicon glyphicon-plus-sign' aria-hidden='true'></span></button></td></tr>")
	);

}

}
xhttp.open("GET", "../server/get_countries.php");
xhttp.send();


const apiCall = new XMLHttpRequest();
apiCall.onload = function() {
var response = JSON.parse(apiCall.responseText);

if(response.success != '')
{
	var countryTable = document.getElementById('favoriteCountries');

	response.forEach(res =>
	(countryTable.innerHTML += "<tr id='row_f_"+res.id+"'><td><a href='edit.php?id="+res.id+"' type='button' class='btn btn-success' aria-label='Left Align'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td><td>"+res.name+"</td><td>"+res.region+"</td><td>"+res.population+"</td><td>"+res.created_at+"</td><td>"+res.description+"</td><td><button type='button' class='btn btn-danger' onClick='removeFavorite("+res.id+")'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></button></td></tr>")
	);

}

}

apiCall.open("GET", "../server/get_favorites.php?user_id="+user_id);
apiCall.send();			


function addFavourite(user_id,country_id) {

	var form_data = new FormData();
	
	form_data.append('user_id', user_id);
	form_data.append('country_id',country_id);
	
	var ajax_request = new XMLHttpRequest();
	
	ajax_request.open('POST', '../server/add_favorite.php');
	
	ajax_request.send(form_data);
   
	ajax_request.onreadystatechange = function()
	{
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			var response = JSON.parse(ajax_request.responseText);

			if(response.success != '')
			{
				var favoriteCountries = document.getElementById('favoriteCountries');
				if (typeof response.ccn3 !== 'undefined') {
					favoriteCountries.innerHTML += "<tr id='row_f_"+response.id+"'><td><a href='edit.php?id="+response.id+"' type='button' class='btn btn-success' aria-label='Left Align'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td><td>"+response.name+"</td><td>"+response.region+"</td><td>"+response.population+"</td><td>"+response.created_at+"</td><td></td><td><button type='button' class='btn btn-danger' onClick='removeFavorite("+response.id+")'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></button></td></tr>";
				}
				document.getElementById('message').innerHTML = response.message;
			}
		}
	}
}

function removeFavorite(row_id) {

	var form_data = new FormData();
	
	form_data.append('row_id', row_id);
	
	document.getElementById('row_f_'+row_id).remove();
	
	var ajax_request = new XMLHttpRequest();
	
	ajax_request.open('POST', '../server/remove_favorite.php');
	
	ajax_request.send(form_data);
   
	ajax_request.onreadystatechange = function()
	{
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			var response = JSON.parse(ajax_request.responseText);

			if(response.success != '')
			{
				document.getElementById('message').innerHTML = response.message;
			}
		}
	}
}		