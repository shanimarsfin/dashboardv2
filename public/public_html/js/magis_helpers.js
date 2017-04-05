function getMax(month)
{
	var max = new Array();
	var index = parseInt(month);
	max[1] = 31;
	max[2] = 29;
	max[3] = 31;
	max[4] = 30;
	max[5] = 31;
	max[6] = 30;
	max[7] = 31;
	max[8] = 31;
	max[9] = 30;
	max[10] = 31;
	max[11] = 30;
	max[12] = 31;
	return max[index];
}

function updateDayDd(month)
{
	var max = getMax(month);
	var jSelect = $('select[name=day]');
	jSelect.find('option').remove().end();
	for(i = 1; i <= max; ++i)
	{
		jSelect.append(new Option(i, i));
	}
}

function initUdd()
{
	$('select[name=month]').change(function(){
		updateDayDd($(this).val());
	})
}

function numOnly(selector)
{
	// Ensures that it is a number and stops the key press
	$(selector).keydown(function(event) {
		if (!(!event.shiftKey //Disallow: any Shift+digit combination
				&& !(event.keyCode < 48 || event.keyCode > 57) //Disallow: everything but digits
				|| !(event.keyCode < 96 || event.keyCode > 105) //Allow: numeric pad digits
				|| event.keyCode == 46 // Allow: delete
				|| event.keyCode == 8  // Allow: backspace
				|| event.keyCode == 9  // Allow: tab
				|| event.keyCode == 27 // Allow: escape
				|| (event.keyCode == 65 && (event.ctrlKey === true || event.metaKey === true)) // Allow: Ctrl+A
				|| (event.keyCode == 67 && (event.ctrlKey === true || event.metaKey === true)) // Allow: Ctrl+C
				//Uncommenting the next line allows Ctrl+V usage, but requires additional code from you to disallow pasting non-numeric symbols
				//|| (event.keyCode == 86 && (event.ctrlKey === true || event.metaKey === true)) // Allow: Ctrl+Vpasting 
				|| (event.keyCode >= 35 && event.keyCode <= 39) // Allow: Home, End
				)) {
			event.preventDefault();
		}
	});
}

function updateVal(element, val) {
	$("#" + element).val(val);
}