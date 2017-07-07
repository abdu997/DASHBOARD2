var app = angular.module('LinkRepository', []);


app.controller('LinkController', function ($scope) {

	$scope.links = [
        {
            "link_id": "1",
            "user": "Abdul",
            "link": "https://apportal.ca",
            "notes": "an amazing university navigator!",
        },
        {
            "link_id": "2",
            "user": "Yousef",
            "link": "http://apportal.ca/abdul",
            "notes": "I would hire this guy!!",
        },
        {
            "link_id": "3",
            "user": "Swagat",
            "link": "http://uottawa.ca",
            "notes": "check this school out",
        },
	];

});