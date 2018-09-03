window.onload = function()
{
	var cook;
	var list_to_do = [];
	var i = 0;

	if (document.cookie)
	{
		cook = document.cookie.substr(7);
		list_to_do = JSON.parse(cook);
		i = 0;
		while (i < list_to_do.length)
		{
			document.getElementById("ft_list").innerHTML += "<div class=\"task\" onclick=\"delete_task(this)\"><p>" + list_to_do[i] + "<\/p><\/div>";
			i++;
		}
	}
}

function update_cookie()
{
	var cook;
	var list_to_do = [];
	var i = 0;
	var len = document.getElementById("ft_list").children.length;
	i = 0;
	while (i < len)
	{
		list_to_do.push(document.getElementById("ft_list").children[i].innerHTML);
		i++;
	}
	cook = JSON.stringify(list_to_do);
	return(cook);
}

function new_cookie()
{
	var cook;
	var new_task= prompt("New task");
	var save_tasks = document.getElementById("ft_list").innerHTML;
	document.getElementById("ft_list").innerHTML = "<div class=\"task\" onclick=\"return delete_task(this)\"><p>" + new_task + "<\/p><\/div>" + save_tasks;

	cook = update_cookie();
	document.cookie = "cookie=" + cook;
}

function delete_task(element)
{
	var answer = confirm("Confirm delete ?");
	if (answer == 1)
	{
		element.outerHTML = "";
		cook = update_cookie();
		document.cookie = "cookie="+ cook;
	}
}
