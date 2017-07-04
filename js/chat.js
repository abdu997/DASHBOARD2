var app = angular.module('ChatSystem', []);

app.filter('unique', function() {
   return function(collection, keyname) {
      var output = [], 
          keys = [];

      angular.forEach(collection, function(item) {
          var key = item[keyname];
          if(keys.indexOf(key) === -1) {
              keys.push(key);
              output.push(item);
          }
      });
      return output;
   };
});

app.controller('ChatController', function ($scope) {
    
    $scope.chatrooms = [
        {
            "chatroom_id": 1,
            "chatroom_name": "Development"
        },
        {
            "chatroom_id": 2,
            "chatroom_name": "Design"
        }
    ]
 
	$scope.messages = [
        {
            "message_id": "1",
            "chatroom_id": "1",
            "class": "rmessage",
            "status": "receiver",
            "sender": "Abdul",
            "timestamp": "Mon 8:00pm",
            "message": "Hello!"
        },
         {
            "message_id": "2",
            "chatroom_id": "2",
            "class": "rmessage",
            "status": "receiver",
            "sender": "Abdul",
            "timestamp": "Mon 8:50pm",
            "message": "Ho!"
        },
        {
            "message_id": "30",
            "chatroom_id": "2",
            "class": "rmessage",
            "status": "receiver",
            "sender": "Abdul",
            "timestamp": "Mon 8:40pm",
            "message": "jerk!"
        },
	];
});