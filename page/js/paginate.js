$(document).ready(function(){

	new List('idlist', {
		valueNames: ['name'],
		page: 8,
		pagination: true
	});

	new List('idlistAdmin', {
		valueNames: ['nameAdmin'],
		page: 8,
		pagination: true
	});

	new List('idCom', {
		valueNames: ['nameCom'],
		page: 8,
		pagination: true
	});
});