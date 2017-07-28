var app = angular.module('SessionVariables', []);


app.controller('SessionController', function ($scope) {

	$scope.profile = [
        {
            "user_id": "1",
            "user_fname": "abdul",
            "user_email": "https://apportal.ca",
            "user_image": "../walrus-baby.jpg",
        },
	];
    
    $scope.user_teams = [
        {
            "team_id": "1",
            "team_name": "development",
        },
    ]

});