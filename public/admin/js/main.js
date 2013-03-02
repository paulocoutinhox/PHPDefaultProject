/**
 * Redirect to another url
 */
function redirect(url)
{
	window.location.href = url;	
}

/**
 * Delete selected rows
 */
function deleteSelectedRows(url, form)
{
	if (form == '') { form = 'form'; }
    
    if ( confirm("Tem certeza que deseja apagar os registros selecionados?") )
	{
   	   obj1 = document.getElementById(form);
	   obj1.action = url;
	   obj1.submit();
	}
}

/**
 * Delete one row
 */
function deleteRow(url)
{
	if ( confirm("Tem certeza que deseja excluir este registro?") )
	{
		redirect(url);
	}
}

/**
 * Select all rows
 */
function selectAllRows(contexto)
{
	$(contexto).each( function() {
	   this.checked = !this.checked;
	});
}

/**
 * Format float to currency
 */
function float2currency(num)
{
	x = 0;

	if(num<0) 
	{
		num = Math.abs(num);
		x = 1;
	}

	if(isNaN(num)) num = "0";

	cents = Math.floor((num*100+0.5)%100);

	num = Math.floor((num*100+0.5)/100).toString();

	if (cents < 10)
	{
		cents = "0" + cents;
	}

	var total = Math.floor((num.length-(1+i))/3);

	for (var i = 0; i < total; i++)
	{
		num = num.substring(0,num.length-(4*i+3))+'.'+num.substring(num.length-(4*i+3));
	}

	ret = num + ',' + cents;
	
	if (x == 1)
	{
		ret = ' - ' + ret;
	}

	return ret;
}