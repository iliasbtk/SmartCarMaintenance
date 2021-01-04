$(document).ready(function(){
	var switchStatus = true;
	$("#updateFromDVLA").hide();
	$("#switchDVLA").on('change', function() {
		if ($(this).is(':checked')) {
			switchStatus = $(this).is(':checked');
			$(".disabledForm").prop("disabled", true);
			$('.disabledForm').val('');
			$("#updateFromDVLA").show();
		}
		else {
		    switchStatus = $(this).is(":checked");
		    $(".disabledForm").prop("disabled", false);
		    $("#updateFromDVLA").hide();
		}
	});	
		
});
	
var vehicleList = {};
	
	
function clearFormInputs()
{
	$('.disabledForm').val('');
	$('.enabledForm').val('');
}
	
function validateForm(vehicleArray)
{
	for (var key in vehicleArray)
		{
			if(vehicleArray[key]==''){
				return false;
			}
		}
	return true;	
}
	
function checkExist(obj)
{
	for(var i=0; i<vehicleList.length; i++){
		if(vehicleList[i] == obj){
   		return true;
		}
	}
	return false;
}
	
function saveCar()
{	
	var vehicleData = {};
	
	var regNum = 'regNum';
	var brand = 'brad';
	var fuelType = 'fuelType';
	var model = 'model';
	var dateAquisition = 'dateAquisition';
	var manufactureYear = 'manufactureYear';
	var motExpiryDate = 'motExpiryDate';
	var taxDueDate = 'taxDueDate';
	var insuranceExpiryDate = 'insuranceExpiryDate';
	var currentMileage = ' currentMileage';
		
	vehicleData[regNum] = $('#regNum').val();
	vehicleData[brand] = $('#brand').val();
	vehicleData[fuelType] = $('#fuelType').val();
	vehicleData[model] = $('#model').val();
	vehicleData[dateAquisition] = $('#dateAquisition').val();
	vehicleData[manufactureYear] = $('#manufactureYear').val();
	vehicleData[motExpiryDate] = $('#motExpiryDate').val();
	vehicleData[taxDueDate] = $('#taxDueDate').val();
	vehicleData[insuranceExpiryDate] = $('#insuranceExpiryDate').val();
	vehicleData[currentMileage] = $('#currentMileage').val();
			
//	if(validateForm(vehicleData) == false){
//		alert('Inputs required');
	//	jQuery("#vehicleDataForm").validate({
	//		rules: {
	//			regNum: 'required',
	//			brand: 'required',
	//			fuelType: 'required',
	//			model: 'required',
	//			dateAquisition: 'required',
	//			manufactureYear: 'required',
	//			motExpiryDate: 'required',
	//			taxDueDate: 'required',
	//			insuranceExpiryDate: 'required',
	//			currentMileage: 'required',
	//		}
	//	});  
//	    return;
//	}
	var carName = vehicleData[model] + ' ' + vehicleData[regNum];
	if (checkExist(carName) == true){
		window.alert('This vehcile already exist!');
		return;
	}
	vehicleList[carName] = vehicleData;
	createCarTable(carName, vehicleData);	
}
	
function createCarTable(obj, arrayList)
{			
			
	$('#carList').append(
		$('<div>').prop({
			class: obj
		}).append(
			$('<h3>').prop({
				innerHTML: obj
			})).append(
				$('<table>').prop({
					id: obj
				}))
		);
				
	var carTable = document.getElementById(obj);
	var header = carTable.createTHead();
	var row = header.insertRow(0);    
	var head1 = row.insertCell(0);
	var head2 = row.insertCell(1);
	head1.innerHTML = "<b>Data</b>";
	head2.innerHTML = "<b>Value</b>";
			
	var body = document.createElement("TBODY");
	carTable.appendChild(body);
			
	for (var key in arrayList)
	{
		var bodyRow = body.insertRow(0);    
		var cell1 = bodyRow.insertCell(0);
		var cell2 = bodyRow.insertCell(1);
		cell1.innerHTML = key;
		cell2.innerHTML = arrayList[key];
	}
			
//	var x = '.'+obj
	alert($(arrayList).text());
//	var xx = $('#carList').html();
//	localStorage.setItem("page", xx);
			
	$.mobile.changePage("#vehicleMain");
	
}	

	
		
		//	$(document).ready(function(){
		//		document.getElementById("#carList").innerHTML = localStorage.getItem("page");		
		//	});